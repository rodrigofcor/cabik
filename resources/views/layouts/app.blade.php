<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Bootstrap -->
    <link href="{{ asset('css/cabik.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app">
        <nav class="main_menu">
            <a href="{{ route("home") }}" class="a_logo"><img class="logo" src="{{ asset('images/logo.svg') }}" alt="Home">Cabik</a> 
           
            <div class="float-end">
                <a href="#" class="btn"><i class="fa fa-search"></i></a>
                <a href="#" class="btn"><i class="fas fa-plus"></i></a>
                <a href="#" class="btn"><i class="far fa-bell"></i></a>
                <a href="#" class="btn"><i class="fas fa-user-alt"></i></a>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>