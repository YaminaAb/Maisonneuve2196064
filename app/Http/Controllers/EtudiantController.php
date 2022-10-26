<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiant = Etudiant::Select()
        ->paginate(8);	
        return view('etudiant.index', ['etudiants' => $etudiant,]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ville = Ville::all();
        return view('etudiant.create', ['villes'=> $ville]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Etudiant::create([
            'nom'=> $request->nom,
            'adresse'=> $request->adresse,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'dateDeNaissance' => $request->dateDeNaissance,
            'villeId'=> $request->villeId            
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();    
        return view('etudiant.edit', ['villes'=> $villes, 'etudiant' => $etudiant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update([

            'nom'=> $request->nom,
            'adresse'=> $request->adresse,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'dateDeNaissance' => $request->dateDeNaissance,
            'villeId'=> $request->villeId 

        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)

    {
       $etudiant->delete();
       return redirect('/');
    }
}
