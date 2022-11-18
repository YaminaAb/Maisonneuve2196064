@extends('layouts.master')
@section('title', 'Acceuil')
@section('content')

<div class="d-flex justify-content-center mt-5">

    <div class="w-40 mt-3 bg-light p-4 d-flex  flex-column justify-content-center">
    <div>
        <h3 class=" pb-4 ">@lang('lang.title_list_files')</h3>
        <a href="{{route('file.add')}}" class=" text-end align-self-end ">                         
            <img src="{{asset('svg/addDoc.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
        </a>
    </div>

        <ul class="list-group list-group-flush ">
 
            @foreach($files as $file)
            <li class="list-group-item d-flex flex-row justify-content-between ">
                <strong class=" border-0 "> {{$file->titre}}</strong>
                <div class="d-flex">
                    @if(Auth::user()->id == $file->etudiants_users_id )
                    <a class=" ms-3" href="{{route('file.delete', $file->id)}} ">
                        <img src="{{asset('svg/deletePost.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                    </a>
                    <a class=" ms-3" href="{{route('file.edit', $file->id)}}  ">
                        <img src="{{asset('svg/edit.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                    </a>
                @endif
                    <a class=" ms-3" href="{{route('file.download', $file->id)}}  ">
                        <img src="{{asset('svg/pdf-svg.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                    </a>
                </div>

            </li>
            @endforeach

        </ul>
        {{$files }}



    </div>

</div>





@endsection