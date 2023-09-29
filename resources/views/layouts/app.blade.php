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
    <link href="https://fonts.bunny.net/css?family=roboto" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="d-flex flex-column min-vh-100 w-100">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ route('portal') }}">
                    <img height="30" src="{{ Vite::asset('resources/images/logo.svg') }}"
                         alt="{{ config('app.name', 'Parently') }}">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>

        <footer class="footer bg-primary-subtle py-4">
            <div class="container">
                <div class="row py-4">
                    <a class="navbar-brand" href="{{ route('portal') }}">
                        <img height="30" src="{{ Vite::asset('resources/images/logo.svg') }}"
                             alt="{{ config('app.name', 'Parently') }}">
                    </a>
                </div>
                <div class="row py-4">
                    <div class="col-4">
                        <ul class="list-unstyled">
                            <li class="list-group-item">
                                <h3>{{ __('About') }}</h3>
                                <a class="nav-link" href="{{ route('homepage') }}">{{ __('Homepage') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="list-unstyled">
                            <li class="list-group-item">
                                <h3>{{ __('About') }}</h3>
                                <a class="nav-link" href="{{ route('homepage') }}">{{ __('Homepage') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="list-unstyled">
                            <li class="list-group-item">
                                <h3>{{ __('About') }}</h3>
                                <a class="nav-link" href="{{ route('homepage') }}">{{ __('Homepage') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container py-4 text-muted">
                &copy;2023 Parently
            </div>
        </footer>
    </div>
</body>
</html>
