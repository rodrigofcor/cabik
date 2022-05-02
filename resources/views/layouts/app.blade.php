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
        <div id="menu">
            <a href="{{ route("home") }}"><img id="logo" src="{{ asset('images/logo.svg') }}" alt="Home" style="image-rendering: pixelated"></a>

           
            <button type="button" class="btn btn-default">Default</button>

            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
            <button type="button" class="btn btn-primary">Primary</button>
        
            <!-- Indicates a successful or positive action -->
            <button type="button" class="btn btn-success">Success</button>
        
            <!-- Contextual button for informational alert messages -->
            <button type="button" class="btn btn-info">Info</button>
        
            <!-- Indicates caution should be taken with this action -->
            <button type="button" class="btn btn-warning">Warning</button>
        
            <!-- Indicates a dangerous or potentially negative action -->
            <button type="button" class="btn btn-danger">Danger</button>
        </div>
        @yield('content')
    </div>
</body>
</html>