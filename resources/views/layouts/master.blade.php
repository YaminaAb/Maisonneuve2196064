<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</head>
@php $locale = session()->get('locale'); @endphp

<body class=" bg-gradient">
    <nav class="navbar bg-light ">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="@lang('lang.text_search')" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">@lang('lang.btn_search')</button>
            </form>
            <div class="d-flex">
                <a class="navbar-brand  me-5" href="{{route('article.index')}}">
                    <img src="{{asset('svg/home-svg.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                </a>
                <a class="navbar-brand ms-3 me-5" href="{{route('article.create')}}">
                    <img src="{{asset('svg/addPost.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                </a>
                <a class="navbar-brand ms-3 me-5" href="{{route('file.index')}}">
                    <img src="{{asset('svg/folder.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                </a>
                <a class="navbar-brand ms-3  me-5" href="{{route('etudiant.index')}}">
                    <img src="{{asset('svg/users.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                </a>
                <a class="navbar-brand ms-3" href="{{route('logout')}}">
                    <img src="{{asset('svg/logout.svg')}}" alt="Bootstrap" width="30" height="24" alt="">
                </a>
            </div>
            <div class="d-flex">
                @if( Auth::check() )
                <strong class="me-4"> @lang('lang.text_hello') : {{ Auth::user()->name}} </strong>
                @endif

                @if($locale=='en')
                <a class="nav-link  bg-secondary  " href="{{route('lang', 'fr')}}">Fr <i class="flag flag-france"></i></a>
                @else
                <a class="nav-link  bg-secondary  " href="{{route('lang', 'en')}}">En <i class="flag flag-united-states"></i></a>
                @endif
            </div>

        </div>
    </nav>
    <!--Content-->
    @yield('content')
</body>

</html>