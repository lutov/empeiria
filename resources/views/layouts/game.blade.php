<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="/vendor/bootstrap/bootstrap-icons/bootstrap-icons.min.css" rel="stylesheet">
        <link href="/vendor/fonts/rowdies/Rowdies-Regular.ttf" rel="stylesheet">

        <!-- Scripts -->
        <script src="/vendor/jquery/jquery-3.7.1.min.js"></script>

        <script src="/vendor/bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
        <link href="/vendor/bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="/vendor/chart-js/chart.umd.min.js"></script>

        <link href="/css/game.css" rel="stylesheet">
    </head>
    <body class="min-vh-100 pt-5 pb-5">
        <header class="w-50 text-center m-auto mb-3">
            <a href="/games" class="logo rowdies-regular">Empeiria</a>
        </header>

        @section('sidebar')

        @show

        <div class="container bg-white p-5 rounded">
            @yield('content')
        </div>
    </body>
</html>
