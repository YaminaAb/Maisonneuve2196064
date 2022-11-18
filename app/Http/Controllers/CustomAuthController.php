<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    public function authentication(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::validate($credentials)) :
            return redirect('/')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $request->get('remember'));

        return redirect()->intended('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ville = Ville::all();
        return view('auth.create', ['villes' => $ville]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:50|min:2',
            'adresse' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'dateDeNaissance' => 'required|date|before:' . now()->subYears(15)->toDateString(),
            'villeId' => 'required',
            'password' => [
                'required',
                'max:20',
                'confirmed',
                Password::min(2)
                    ->mixedCase()
                    ->letters()
                    ->numbers(),
            ],

        ]);

        // Création de l'utilisateur (user)
        $user_data = [
            'name'     => $request->nom,
            'email'    => $request->email
        ];

        $user = new User;
        $user->fill($user_data);
        $user->password = Hash::make($request->password);
        $user->save();

        // Création de l'étudiant  on ajoutant le user_id déja crée 
        $user_id = $user->id;

        $etuidant_data = [
            'nom'               => $request->nom,
            'adresse'           => $request->adresse,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'dateDeNaissance'    => $request->dateDeNaissance,
            'villeId'          => $request->villeId,
            'users_id'           => $user_id
        ];

        $etudiant = new Etudiant;
        $etudiant->fill($etuidant_data);
        $etudiant->save();

        return redirect('/')->withSuccess('Ajouter');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('');
    }


    public function forgotPassword()
    {
        return view('auth.ForgotPassword');
    }


    public function tempPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);


        $locale = session()->get('locale');
        //on chercher l'user qui a le meme email que le ¢request->email
        if (User::where('email', $request->email)->exists()) {

            $user = User::where('email', $request->email)->get();
            $user = $user[0];

            $userId = $user->id;
            $tempPass = str::random(25);
            $user->temp_password = $tempPass;
            $user->save();

            $to_name = $request->name;
            $to_email = $request->email;

            //déffinir la langue choisi pour envoyer l'email avec le meme langue

            if ($locale == 'fr') {

                $body = "<a href='http://127.0.0.1:8000/new-password/" . $userId . "/" . $tempPass .
                    "'>Cliquez ici pour réinitialiser votre mot de passe</a>";
            } else {
                $body = "<a href='http://127.0.0.1:8000/new-password/" . $userId . "/" . $tempPass .
                    "'>Click here to reset your password</a>";
            }

            //envoi d'email
            Mail::send(
                'auth.mail',
                $data = [
                    'name' => $to_name,
                    'body' => $body
                ],
                function ($message) use ($to_name, $to_email) {
                    $locale = session()->get('locale');
                    if ($locale == 'fr') {
                        $message->to($to_email, $to_name)->subject('Rénitialitation mot de passe ');
                    } else {
                        $message->to($to_email, $to_name)->subject('Password Reset');
                    }
                }
            );
            if ($locale == 'fr') {
                return redirect()->back()->withSuccess('Merci de consulter votre émail');
            } else {
                return redirect()->back()->withSuccess('Please check your email');
            }
        } else {
            if ($locale == 'fr') {

                return redirect()->back()->withErrors('l\'utilisateur n\'existe pas ');
            } else {
                return redirect()->back()->withErrors('The user does not exist ');
            }
        }
    }

    public function newPassword(User $user, $tempPassword)
    {
        if ($user->temp_password === $tempPassword) {
            return view('auth.newPassword');
        }
        return redirect('forgot-password')->withErrors(
            'Les identifiants ne correspondent pas '
        );
    }
    public function storeNewPassword(User $user, $tempPassword,  Request $request)
    {
        if ($user->temp_password === $tempPassword) {
            $request->validate([
                'password' => [
                    'required',
                    'max:20',
                    'confirmed',
                    Password::min(2)
                        ->mixedCase()
                        ->letters()
                        ->numbers(),
                ],
            ]);
            $user->password = Hash::make($request->password);
            $user->temp_password = NULL;
            $user->save();
            return redirect('/')->withSuccess(
                'Mot de passe modifié avec succès '
            );
        }
        return redirect('forgot-password')->withErrors(
            'Les identifiants ne correspondent pas'
        );
    }
}
