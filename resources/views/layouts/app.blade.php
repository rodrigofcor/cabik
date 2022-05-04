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
        <nav class="navbar navbar-dark main-nav">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route("home") }}">
                <img src="{{ asset('images/logo.png') }}" alt="" height="50" class="d-inline-block">
                Cabik
              </a>

              <form class="form-inline">
                <a class="btn btn-outline-light" type="button" href="#"><i class="fa fa-search"></i></a>
                <a class="btn btn-outline-light" type="button" href="#"><i class="fas fa-plus"></i></a>
                <a class="btn btn-outline-light" type="button" href="#"><i class="far fa-bell"></i></a>
                <a class="btn btn-outline-light" type="button" href="#"><i class="fas fa-user-alt"></i></a>
              </form>
        </nav>

        @yield('content')
    </div>
</body>
</html>