@extends('layouts.master')
@section('title', 'Acceuil')
@section('content')

<div class="d-flex justify-content-center mt-5">

    <div class="w-40 mt-3 bg-light p-4 d-flex  flex-column justify-content-center">
        
        <h3 class="">@lang('lang.form_title_file')</h3>

        @if ($errors)
        @foreach($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
        @endforeach
        @endif

        <form action="" method="POST" class="mt-2" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="text" class=" input-group " name="titre" placeholder="@lang('lang.placeHolder_file_fr')"  value=" {{$file->titre}}" >
            <input type="text" class=" input-group " name="titre_en" placeholder="@lang('lang.placeHolder_file_en')"  value=" {{$file->titre_en}}" >
           
            <div class=" d-flex justify-content-center">
                <button class="button rounded-pill  mt-3 ">@lang('lang.button_addFile')</button>
            </div>
            <div class=" d-flex justify-content-center">
            </div>
        </form>

    </div>

</div>

@endsection