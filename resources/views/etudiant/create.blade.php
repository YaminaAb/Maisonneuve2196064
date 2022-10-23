@extends('layouts.master')
@section('title', 'Ajout')
@section('content')

<div class="d-flex justify-content-center ">
    <div class="w-40 mt-3 bg-light p-4 d-flex  flex-column justify-content-center">
        <h4 class=" d-flex   justify-content-center">Ajouter un Etudiant </h4>
        <form action="" method="POST" class="mt-2">
        @csrf
                <input type="text" class=" input-group " name="nom"  placeholder="Nom" aria-label=""  required>
                <input type="text" class=" input-group " name="adresse"  placeholder="Adresse" aria-label="" required>
                <input type="email" class=" input-group " name="email"  placeholder="Émail" aria-label="" required>
                <input type="text" class=" input-group " name="phone"  placeholder="Numéro de téléphone" aria-label="" required>
                <input type="date" class=" input-group " name="dateDeNaissance"  placeholder="Date de naissance" aria-label="" required>
                <select name="villeId" class=" input-group " required>
                    <option>Sélectionner une ville</option>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id}}"> {{ $ville->nom}}</option>
                @endforeach
                </select>
                <div class=" d-flex justify-content-center">

                    <button  class="button rounded-pill  mt-3 "> Ajouter</button>
                </div>
           
        </form>
        
    </div>

</div>



@endsection