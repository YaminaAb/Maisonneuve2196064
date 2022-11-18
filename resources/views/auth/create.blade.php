<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
@php $locale = session()->get('locale'); @endphp
<body class=" bg-gradient">

    <div class="d-flex justify-content-center ">
        <div class="w-40 mt-3 bg-light p-4 d-flex  flex-column justify-content-center  rounded-5">
        <div class="d-flex justify-content-end">
        @if($locale=='en')
                <a class="nav-link  bg-secondary  " href="{{route('lang', 'fr')}}">Fr <i class="flag flag-france"></i></a>
       @else
                <a class="nav-link  bg-secondary  " href="{{route('lang', 'en')}}">En <i class="flag flag-united-states"></i></a>
        @endif
        </div>
            <h4 class=" d-flex   justify-content-center">@lang('lang.form_title_registration')</h4>
        
            <form action="{{route('user.store')}}" method="POST" class="mt-2">
                @csrf
                <input type="text" class=" input-group " name="nom" placeholder="@lang('lang.placeHolder_name')" aria-label="" value="{{old('nom')}}">
                @if ($errors->has('nom'))
                <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
                <input type="text" class=" input-group " name="adresse" placeholder="@lang('lang.placeHolder_adress')" aria-label="" value="{{old('adresse')}}">
                @if ($errors->has('adresse'))
                <span class="text-danger">{{ $errors->first('adresse') }}</span>
                @endif
                <input type="email" class=" input-group " name="email" placeholder="@lang('lang.placeHolder_email')" aria-label="" value="{{old('email')}}">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <input type="text" class=" input-group " name="phone" placeholder="@lang('lang.placeHolder_phone')" aria-label="" value="{{old('phone')}}">
                @if ($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <input type="date" class=" input-group " name="dateDeNaissance" aria-label="" value="{{old('dateDeNaissance')}}">
                @if ($errors->has('dateDeNaissance'))
                <span class="text-danger">{{ $errors->first('dateDeNaissance') }}</span>
                @endif
                <select name="villeId" class=" input-group ">
                    <option value="" disabled selected>@lang('lang.placeHolder_city')</option>
                    @foreach($villes as $ville)
                    <option value="{{$ville->id}}" @if (old('villeId') ==  $ville->id) selected @endif > {{ $ville->nom}}</option>
                    @endforeach
                </select>
                @if ($errors->has('villeId'))
                <span class="text-danger">{{ $errors->first('villeId') }}</span>
                @endif
                <input type="password" class=" input-group " name="password" placeholder="@lang('lang.placeHolder_password')" aria-label="">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <input type="password" class=" input-group " name="password_confirmation" placeholder="@lang('lang.placeHolder_password_confirm')" aria-label="">
               
                <div class=" d-flex justify-content-center">
                    <button class="button rounded-pill  mt-3 "> @lang('lang.form_title_registration')</button>
                </div>
                <div class=" d-flex justify-content-center mt-2">
                    <strong class="list-group">
                        <a class="list-group-item list-group-item-action" href="{{route('login')}}"> @lang('lang.form_title_login')</a>
                    </strong>
                </div>

            </form>

        </div>

    </div>
</body>

</html>