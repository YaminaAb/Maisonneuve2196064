@extends('layouts.master')
@section('title', 'Acceuil')
@section('content')

<div class="d-flex justify-content-center ">
    <div class="w-40 mt-3 bg-light p-4 d-flex  flex-column justify-content-center">
        <h4 class=" d-flex   justify-content-center">Ajouter un Etudiant </h4>
        <form action="" method="POST" class="mt-2">
            @method('PUT')
            @csrf
                <input type="text" class=" input-group " name="nom"  placeholder="Nom" aria-label="" value="{{ $etudiant->nom }}" required  >
                <input type="text" class=" input-group " name="adresse"  placeholder="Adresse" aria-label="" value="{{ $etudiant->adresse }}" required  >
                <input type="email" class=" input-group " name="email"  placeholder="Émail" aria-label="" value="{{ $etudiant->email }}" required  >
                <input type="text" class=" input-group " name="phone"  placeholder="Numéro de téléphone" aria-label="" value="{{ $etudiant->phone }}" required  >
                <input type="date" class=" input-group " name="dateDeNaissance"  placeholder="Date de naissance" aria-label="" value="{{ $etudiant->dateDeNaissance }}" required>
                <select name="villeId" class=" input-group " required>
                @foreach($villeEtudiants as $villeEtudiant)                    
                    <option value="{{ $villeEtudiant->id }}" >{{$villeEtudiant->nom}}</option>
                @endforeach
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}"> {{ $ville->nom}}</option>
                @endforeach
                </select>
                <div class=" d-flex justify-content-center">

                    <button  class="button rounded-pill  mt-3 "> Mettre à jour </button>
                </div>
           
        </form>
        
    </div>

</div>

@endsection
