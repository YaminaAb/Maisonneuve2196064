<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // Selctionner tout les arrticles et les afficher par rapport a la langue choisi 
        $lang = session()->get('localeDB');
        $article = Article::select(
            'id',
            DB::raw("(case when titre$lang is null then titre else titre$lang end) as titre ,
                    (case when texte$lang is null then texte else texte$lang end) as texte"),
            'etudiants_id',
            'etudiants_users_id',
            'created_at'
        )
            ->orderBy('created_at', 'DESC')
            ->get();
            
        //Afficher l'etudiat qui a écrit l'article 
        $etudiant =  Etudiant::all();
       
        return view('articles.index', ['articles' => $article, 'etudiants' => $etudiant]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userID = Auth::user()->id;
        
        $etudiant = Etudiant::select()
        ->where('etudiants.users_id' , '=' , $userID )
        ->get();
       return view('articles.create', ['etudiants' => $etudiant]);
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
            'titre' => 'required|max:80|min:5',
            'texte' => 'required',
            'titre_en' => 'required|max:80|min:5',
            'texte_en' => 'required'          

        ]);

        Article::create([
            "titre" => $request->titre,
            "texte"=> $request->texte,
            "titre_en"=> $request->titre_en,
            "texte_en"=> $request->texte_en,
            "etudiants_id"=> $request->etudiants_id,
            "etudiants_users_id"=> Auth::user()->id
        ]);
        return redirect('/index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (Auth::user()->id == $article->etudiants_users_id){

            return view('articles.edit', ['article' => $article]);
        }else{
            return redirect('/index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre' => 'required|max:80|min:5',
            'texte' => 'required',
            'titre_en' => 'required|max:80|min:5',
            'texte_en' => 'required'          

        ]);

        $article->update([
            "titre" => $request->titre,
            "texte"=> $request->texte,
            "titre_en"=> $request->titre_en,
            "texte_en"=> $request->texte_en,                          
        ]);

        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article  $article)

    {
        $article->delete();
        return redirect('/index');
     }
    
}
