<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="d-flex flex-column min-vh-100 w-100 justify-content-center align-items-center">
    <a class="navbar-brand" href="/">
        <img height="80" class="mb-5" src="/images/logo.svg"
             alt="Parently">
    </a>
    <main class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
        @yield('content')
            </div>
        </div>

    </main>
</div>
</body>
</html>
