<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet'
        media='print' />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/23930251c8.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/supervisor.css') }}" rel="stylesheet">
</head>

<body>
    @auth
    <div id="app">
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Encadrant</h3>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                    <a href="{{ route('Soutenance.index')}}">
                            <i class="fa fa-home"></i>Home
                        </a>
                        <a href="{{ route('Soutenance.create')}}">
                            <i class="fa fa-clipboard"></i>Valider les soutenances
                        </a>
                    </li>
                    <li>
                    <a href="{{ route('acceptedDefense') }}">
                        <i class="fas fa-check"></i>
                        Soutenances acceptées
                    </a>
                </li>
                <li>
                    <a href="{{ route('refusedDefense')}} ">

                        <i class="fas fa-times"></i>
                            Soutenances refusées

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
