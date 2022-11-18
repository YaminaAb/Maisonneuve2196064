@extends('layouts.master')
@section('title', 'Acceuil')
@section('content')

<div class="container-fluid mt-3 ">
    <div class="row row-cols-1 row-cols-md-2 g-4 ">
        @foreach($articles as $article)
        <div class="col ">
            <div class="card h-100 ">
                <div class="card-body">
                    <h5 class="card-title mt-3">{{ $article->titre}}</h5>
                    <p class="card-text">{{ $article->texte}}</p>

                </div>
                <div class="card-footer d-flex justify-content-between ">
                    <div>
                        @foreach($etudiants as $etudiant)
                        @if( $etudiant->id == $article->etudiants_id )
                        <small class="text-muted">{{$etudiant->nom}}</small>
                        <small class="text-muted">{{$article->created_at}}</small>
                        @endif
                        @endforeach
                    </div>
                    <div class="d-flex">
                        @if(Auth::user()->id == $article->etudiants_users_id )
                        <a class="navbar-brand ms-3" href=" {{route('article.delete', $article->id )}}">
                            <img src="{{asset('svg/deletePost.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                        </a>
                        <a class="navbar-brand ms-3" href=" {{route('article.edit', $article->id )}}">
                            <img src="{{asset('svg/edit.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                        </a>                       
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection