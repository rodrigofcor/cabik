<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/small-logo.png') }}">

    <!-- Scripts -->
    @stack('scripts')
    
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
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50" class="d-inline-block">
                    Cabik
                </a>

                <form class="form-inline">
                    @if (Auth::check())
                        <a href="{{ route('pet.search') }}" type="button" class="btn btn-outline-light"><i class="fa fa-search"></i></a>
                        <a class="btn btn-outline-light" type="button" href="#"><i class="fas fa-plus"></i></a>
                        <a class="btn btn-outline-light" type="button" href="#"><i class="fas fa-bell"></i></a>
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#modalUserOptions"><i class="fas fa-user-alt"></i></button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light" type="button">Login</a>
                    @endif
                </form>
            </div>
        </nav>

        @if (Auth::check())
            @include('includes.modalUserOptions')
        @endif

        @yield('content')
    </div>
</body>
</html>