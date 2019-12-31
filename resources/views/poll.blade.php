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
        <nav class="container has-text-centered">
            <a class="is-size-3 has-text-primary has-text-weight-bold has-text-centered" href="/">Hippoll</a>
        </nav>
    </header>

    <div id="content" class="container mt-1 mb-3">
        <div id="app" class="mx-1">
            <app></app>
        </div>
    </div>

    <footer id="footer" class="footer">
        <div class="content has-text-centered">
            <span class="mx-1">&copy; {{ config('app.name', 'Laravel') }} 2019</span>
        </div>
    </footer>
</body>
</html>
