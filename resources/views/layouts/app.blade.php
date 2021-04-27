<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.jpg') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gyankosh') }}</title>

    <script src="{{ asset('js/quizapp.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">




    <style type="text/css">
        .cursor {
            cursor: pointer;
        }

        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .brand-text {
            color: #00A988;
        }

    </style>
    @yield('css')
</head>

<body>
    <div id="app">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.jpg') }}" style="width: 50px;">
                    <small class="brand-text">{{ __('msg.slogan') }}</small>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://flagcdn.com/40x30/{{ session('locale', config('app.locale')) }}.png" >
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('setLanguage/gb') }}">
                                    <img src="https://flagcdn.com/40x30/gb.png" >
                                    {{ __('english') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('setLanguage/bd') }}">
                                    <img src="https://flagcdn.com/40x30/bd.png">
                                    {{ __('bangla') }}
                                </a>
                            </div>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('msg.login') }}</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('msg.register') }}</a>
                        </li>
                        @endif



                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('auth.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            @if(Auth::user()->avatar)
                            <img src="{{ asset(Auth::user()->avatar) }}" alt="Avatar" class="avatar">
                            @endif
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-md-4 main">
            @yield('content')
        </main>
    </div>
    <script src="{{url('lang-'. app()->getLocale().'.js')}}"></script>
    <script >
        document.addEventListener('DOMContentLoaded', function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
    @yield('js')
</body>

</html>
