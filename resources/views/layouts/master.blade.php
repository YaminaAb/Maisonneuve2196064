<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body class=" bg-gradient">


    <nav class="navbar bg-light ">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div>
                <a class="navbar-brand" href="{{route('index')}}">
                    <img src="{{asset('svg/home-svg.svg')}}" alt="Bootstrap" width="30" height="24">
                </a>
                <a class="navbar-brand" href="{{route('create.post')}}">
                    <img src="{{asset('svg/add.svg')}}" alt="Bootstrap" width="30" height="24">
                </a>
            </div>
        </div>

    </nav>

    <!--Content-->
    @yield('content')


</body>

</html>