<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kottab') }}</title>
    <link rel="icon" href="{{asset('image/faviconnobg.png')}}" type="image/x-icon">

    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
    rel="stylesheet"
    />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href= "{{asset('css/StyleLogin.css')}}"  rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/StyleRegister.css')}}">
    <!-- Scripts -->

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body >

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top " >
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('image/hallo.png')}}"  alt="" style="height:50px; width:60px ; ">
                </a>
                {{-- <a class="navbar-toggler" href="{{ route('login') }}" aria-label="User Profile">
                    <i class="fa fa-user fa-lg" id="user" aria-hidden="true" style="color:rgb(13, 110, 253)"></i>
                </a> --}}
                @if (Route::currentRouteName() === "login")
                    <a class="navbar-toggler" href="{{ route('register') }}" aria-label="User Profile">
                        <i class="fa fa-user-plus " id="user-plus" aria-hidden="true"></i>
                    </a>
                @endif

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item">
                                @if (Route::currentRouteName() === "login" )
                                    <p style="display: inline; margin-right: 10px;">Vous n'avez pas encore de compte ?</p>
                                    <a class="btn btn-primary" href="{{ route('register') }}">S'inscrire</a>
                                @endif

                                @if (Str::contains(request()->url(), 'professeur/detailprof'))
                                    <a href="{{ route('login') }}" class="nav-link btn btn-primary shadow " id="btn-login-welcome">Se connecter</a>

                                @endif
                            </li>
                        @else


                            <li class="nav-item dropdown d-flex" style="align-items: center;">

                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <!--  {{ Auth::user()->name }} -->
                                  <img class="theme-item user-avatar " src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('image/default-avatar.png') }}" alt="User image">

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="{{ url('InfosProfile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('Mescours') }}">
                                        {{ __('Mes cours') }}
                                    </a> -->

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="">
            @yield('content')
        </main>
    </div>
</body>

<style>
    #user:hover{
        color:rgb(0 74 173);
    }
</style>
</html>
