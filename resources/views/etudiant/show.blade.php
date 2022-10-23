@extends('layouts.master')
@section('title', 'Acceuil')
@section('content')

<div class="d-flex justify-content-center ">
    
        
        <div class="card mb-3 mt-5 p-3" style="max-width: 700px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{asset('img/profil.jpg')}}" class="img-fluid rounded-start"  alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{$etudiant->nom}}</h5>
                        <p class="card-text"><small class="text-muted">{{$etudiant->dateDeNaissance}}</small></p>
                        <div class="d-flex mt-2 ">
                            <img src="{{asset('svg/position.svg')}}"  width="30" height="24" alt="" srcset="">
                            <p class="card-text ms-3">{{$etudiant->adresse}}</p>
                        </div>
                        <div class="d-flex  mt-3">
                            <img src="{{asset('svg/email.svg')}}"  width="35" height="35" alt="" srcset="">
                            <p class="card-text ms-3">{{$etudiant->email}}</p>
                        </div>
                        <div class="d-flex mt-3 ">
                            <img src="{{asset('svg/phone.svg')}}"  width="30" height="24" alt="" srcset="">
                            <p class="card-text ms-3"><small class="text-muted">{{$etudiant->phone}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>

@endsection