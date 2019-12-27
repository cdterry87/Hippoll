<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <nav class="navbar container" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="is-size-3 has-text-info has-text-weight-bold" href="/">Hippoll</a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbar">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu" id="navbar">
                <div class="navbar-start"></div>
                <div class="navbar-end">
                    <div class="navbar-item pr-0">
                        <div class="buttons">
                            @guest
                                <a href="/register" class="button is-info">Register</a>
                            @endguest
                            @auth
                                <form action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="button is-danger">Logout</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div id="content" class="container my-3">
        @yield('content')
    </div>

    <footer id="footer" class="footer">
        <div class="content has-text-centered">
            <span class="mx-1">&copy; {{ config('app.name', 'Laravel') }} 2019</span>
            <a href="#" class="mx-1 has-text-info">About</a>
            <a href="#" class="mx-1 has-text-info">Terms and Conditions</a>
            <a href="#" class="mx-1 has-text-info">Privacy Policy</a>
        </div>
    </footer>
</body>
</html>
