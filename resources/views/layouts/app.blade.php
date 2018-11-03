<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EAD_IFMS') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/disciplina.css') }}" rel="stylesheet">

        <!-- Estilo para o menu lateral -->
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @yield('sidebar')

            <div id="main">

                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div class="container">
                        @yield('sidebarMenuButton')
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'EAD_IFMS') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <div class="navbar-nav mr-auto">
                                @auth
                                <a class="nav-item nav-link" href="{{ url('/disciplinas') }}">
                                    Minhas Disciplinas
                                </a>
                                @endauth
                            </div>


                            <!-- Right Side Of Navbar -->
                            <div class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                <a class="nav-item nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <a class="nav-item nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </div>
                        </div>
                    </div>
                </nav>

                <main class="py-4">
                    @if (session('status'))
                    <div class="container">
                        <div class="alert alert-{{ session('status')[0] }} alert-dismissible fade show">
                            {{ session('status')[1] }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    @yield('content')
                </main>

            </div>
        </div>

        @yield('script')
    </body>
</html>
