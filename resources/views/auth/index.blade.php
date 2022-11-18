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

<body class=" bg-gradient ">
    <div class="d-flex justify-content-center mt-5  ">

        <div class="w-40 mt-3 bg-light p-4 d-flex  flex-column justify-content-center rounded-5">
            <div class="d-flex justify-content-end">
                @if($locale=='en')
                <a class="nav-link  bg-secondary  " href="{{route('lang', 'fr')}}">Fr <i class="flag flag-france"></i></a>
                @else
                <a class="nav-link  bg-secondary  " href="{{route('lang', 'en')}}">En <i class="flag flag-united-states"></i></a>
                @endif
            </div>
            <h3 class="">@lang('lang.form_title_login')</h3>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if ($errors)
            @foreach($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
            @endforeach
            @endif


            <form action="{{route('login.authentication')}}" method="POST" class="mt-2">
                @csrf
                <!-- Émail-->
                <input type="email" class=" input-group " name="email" placeholder="@lang('lang.placeHolder_email')" aria-label="" required>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif

                <!-- Mot de passe -->
                <input type="password" class=" input-group " name="password" placeholder="@lang('lang.placeHolder_password')" aria-label="" required>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span>
                    <a class="list-group-item list-group-item-action" href="{{route('forgot.Password')}}"> @lang('lang.text_forgotpass') ? </a>
                </span>

                <div class=" d-flex justify-content-center">
                    <button class="button rounded-pill  mt-3 "> @lang('lang.button_login')</button>
                </div>
                <div class=" d-flex justify-content-center">
                </div>
            </form>
            <div class=" d-flex justify-content-center mt-2">
                <strong class="list-group">
                    <a class="list-group-item list-group-item-action" href="{{route('user.registration')}}"> @lang('lang.text_registration')</a>
                </strong>
            </div>


        </div>

    </div>
</body>

</html>