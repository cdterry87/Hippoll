<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar container is-transparent" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="is-size-3 has-text-primary has-text-weight-bold" href="/">Hippoll</a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbar">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div class="navbar-menu" id="navbar">
                <div class="navbar-start"></div>
                <div class="navbar-end">
                    @guest
                    <a href="/register" class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-user-circle"></i>
                        </span>
                        <span>
                            Register
                        </span>
                    </a>
                    @endguest

                    @auth
                    <a href="/account" class="navbar-item">
                        <span class="icon">
                            <i class="fas fa-user-circle"></i>
                        </span>
                        <span>
                            {{ auth()->user()->name }}
                        </span>
                    </a>
                    <div class="navbar-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="button is-danger is-fullwidth">
                                <span class="icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <div id="content" class="container mt-1 mb-3">
        @yield('content')
    </div>

    <footer id="footer" class="footer">
        <div class="content has-text-centered">
            <span class="mx-1">&copy; {{ config('app.name', 'Laravel') }} 2019</span>
            <a href="#" class="mx-1 has-text-primary">About</a>
            <a href="#" class="mx-1 has-text-primary">Terms and Conditions</a>
            <a href="#" class="mx-1 has-text-primary">Privacy Policy</a>
        </div>
    </footer>
</body>
</html>
