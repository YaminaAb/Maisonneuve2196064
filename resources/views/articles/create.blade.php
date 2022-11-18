@extends('layouts.master')
@section('title', 'Acceuil')
@section('content')
<div class="d-flex justify-content-center ">
    <div class="w-40 mt-3 bg-light p-4 d-flex  flex-column justify-content-center">
        <h4 class=" d-flex   justify-content-center"></h4>
        
        <form action="{{route('article.store')}}" method="POST" class="mt-2">
            @csrf
            <h3>@lang('lang.form_title_addPost')</h3>
            <input type="text" class=" input-group " name="titre" placeholder="@lang('lang.placeHolder_title_fr')" aria-label="">
                @if ($errors->has('titre'))
                <span class="text-danger">{{ $errors->first('titre') }}</span>
                @endif
            <textarea  class=" input-group " name="texte" placeholder="@lang('lang.placeHolder_text_fr')" aria-label=""></textarea>
                @if ($errors->has('texte'))
                <span class="text-danger">{{ $errors->first('texte') }}</span>
                @endif
            <input type="text" class=" input-group " name="titre_en" placeholder="@lang('lang.placeHolder_title_en')" aria-label="">
                @if ($errors->has('titre_en'))
                <span class="text-danger">{{ $errors->first('titre_en') }}</span>
                @endif
                <textarea  class=" input-group " name="texte_en" placeholder="@lang('lang.placeHolder_text_en')" aria-label=""></textarea>
                @if ($errors->has('texte_en'))
                <span class="text-danger">{{ $errors->first('texte_en') }}</span>
                @endif 
            @foreach($etudiants as $etudiant )
                <input type="hidden" class=" input-group " name="etudiants_id" aria-label="" value="{{$etudiant->id}}">                             
            @endforeach
           
            <div class=" d-flex justify-content-center">
                <button class="button rounded-pill  mt-3 "> @lang('lang.btn_addPost')</button>
            </div>
            <div class=" d-flex justify-content-center">
                <a href="{{route('login')}}"> </a>
            </div>

        </form>

    </div>

</div>
@endsection