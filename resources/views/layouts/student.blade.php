<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/23930251c8.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
</head>

<body>
    @auth

    <div id="app">
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Etudiant</h3>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="{{ route('formulaire.index')}}">
                            <i class="fa fa-home"></i>Home
                        </a>
                        <a href="{{ route('formulaire.create')}}">
                            <i class="fa fa-clipboard"></i>Formulaire
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            Se Déconnecter </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li>
                    </li>
                    <li> </li>
                </ul>
            </nav>


            <!-- Page Content  -->
            <div id="content">
                <main class="py-4 mr-4 ml-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
    @endauth
    @include('sweetalert::alert')
</body>

</html>
