<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Etudiant;
use App\Models\File;

//use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
                 
        $lang = session()->get('localeDB');
        $file = File::select(
            'id',
            DB::raw("(case when titre$lang is null then titre else titre$lang end) as titre"),
            'etudiants_id',
            'etudiants_users_id',
            'created_at'
        )
        
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('file.index', ['files' => $file]);
       
    }

    public function create()
    {
        $userID = Auth::user()->id;

        $etudiant = Etudiant::select()
        ->where('etudiants.users_id' , '=' , $userID )
        ->get();
        return view('file.addFile', ['etudiants' => $etudiant]);
    }
  
    public function upload(Request $request)
    {       

        $request->validate([
            'titre'=> 'required|max:45',
            'titre_en'=> 'required|max:45',
            'file' => 'required|mimes:pdf,zip,doc,docx',
        ]);
        
        $fileName = time().'.'.$request->file->extension();      
        //mettre le fichier dans un dossier uploads 
        $request->file->move(public_path('storage/uploads'), $fileName);
        $file = new File;
        //ajouter les champs a la table file
        $file->fill($request->all());  
        //ajouter le document a la table file 
        $file->file = $fileName; 
        //ajouter user_id a la table file   
        $file->etudiants_users_id = Auth::user()->id;  
        $file->save();
        return redirect('/files');
    }  
    public function edit(File $file)
    {
        if(Auth::user()->id == $file->etudiants_users_id){
            
            return view('file.fileEdit', ['file' => $file]);
        }else{
           return redirect('/files');
        }
    }

    public function update(Request $request, File $file)
    {
        $request->validate([
            'titre'=> 'required|max:45',
            'titre_en'=> 'required|max:45',
        ]);

        $file->update([
            "titre" => $request->titre,
            "titre_en"=> $request->titre_en                                     
        ]);

       return redirect('/files');

    }

    public function download( File $file){
        
        $fileName = storage_path('app/public/uploads/'.$file->file);
        return response()->download($fileName);

    }

    public function destroy(File  $file)

    {
        $file->delete();
        return redirect('/files');
     }
}
