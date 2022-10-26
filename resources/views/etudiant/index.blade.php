@extends('layouts.master')
@section('title', 'Acceuil')
@section('content')

<div class="container">
    <img src="{{asset('img/hero1.jpg')}}" class="  w-100 " alt="">
</div>
<div class="container mt-2 bg-light px-3  ">
    <div class="row row-cols-2 ">
        @foreach($etudiants as $etudiant)
        <div class=" d-flex  mt-3 border rounded ">
            <div class="d-flex my-3">          
            
                <img src="{{asset('img/profil.jpg')}}" class=" rounded-3 w-25  "  alt="">
                <div class="ms-3 d-flex flex-column align-content-end ">
                    <strong class="">{{ $etudiant->nom}}</strong>
                    <!-- <p> Adresse : {{ $etudiant->adresse}}</p> -->
                    <p class="fw-light">{{ $etudiant->email}}</p>
                    <p class="fw-light">{{$etudiant->phone}}</p>
                </div>
            </div>   
                
            <div class="dropdown mt-3">
                <a class="justify-content-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('img/menu.png')}}" alt="">
                </a>

                <ul class="dropdown-menu">
                    <li  class="d-flex">
                        <img src="{{asset('svg/show.svg')}}"  width="24" height="24" alt="" srcset="" class="ms-2">
                        <a class="dropdown-item " href=" {{route('etudiant.show', $etudiant->id)}}">
                            Afficher 
                        </a>
                    </li>
                    <li class="d-flex">
                        <img src="{{asset('svg/update.svg')}}"  width="30" height="24" alt="" srcset="" class="ms-2">
                        <a class="dropdown-item "  href="{{route('etudiant.edit', $etudiant->id)}}"  >
                        Modifier
                        </a>
                    </li>
                    <li class="d-flex">
                        <img src="{{asset('svg/delete.svg')}}"  width="30" height="24"alt="" srcset="" class="ms-2">
                        <a class="dropdown-item" href="{{route('etudiant.delete', $etudiant->id)}}">
                        Supprimer
                        </a>
                    </li>
                </ul>
            </div>           

        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $etudiants }}
        
    </div>
</div>


@endsection