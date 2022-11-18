@extends('layouts.master')
@section('title', 'Acceuil')
@section('content')

    <div class="d-flex justify-content-center mt-5">

        <div class="w-40 mt-3 bg-light p-4 d-flex  flex-column justify-content-center">
            <div class="d-flex justify-content-end">
               
            </div>
            <h3 class="">@lang('lang.form_title_file')</h3>
            
            @if ($errors)
            @foreach($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
            @endforeach
            @endif

            <form action="{{route('file.store')}}" method="POST" class="mt-2" enctype="multipart/form-data">
                @csrf                
                <input type="text" class=" input-group " name="titre" placeholder="@lang('lang.placeHolder_file_fr')" aria-label="" >
                <input type="text" class=" input-group " name="titre_en" placeholder="@lang('lang.placeHolder_file_en')" aria-label="" >            
                <input type="file" class=" input-group " name="file"  aria-label="" >                
                @foreach($etudiants as $etudiant )
                <input type="hidden" class=" input-group " name="etudiants_id" aria-label="" value="{{$etudiant->id}}">                             
                @endforeach
                <div class=" d-flex justify-content-center">
                    <button class="button rounded-pill  mt-3 "> @lang('lang.button_addFile')</button>
                </div>
                <div class=" d-flex justify-content-center">
                </div>
            </form>
            
        </div>

    </div>
    
@endsection
