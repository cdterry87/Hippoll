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
    <main>
        <div class="pb-14 bg-no-repeat md:bg-right lg:mt-5" style="background-image: url('images/bg.svg'); background-size: 700px;">
            <div class="w-full container mx-auto p-6">
                <div class="w-full flex items-center justify-between">
                    <a class="flex items-center no-underline hover:no-underline font-bold text-2xl lg:text-4xl"  href="/">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <div class="flex w-1/2 justify-end content-center">
                        <a class="button inline-block no-underline text-blue-500 hover:text-blue-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4" href="login">
                            Login
                        </a>
                        <a class="button inline-block no-underline text-blue-500 hover:text-blue-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 " href="register">
                            Register
                        </a>
                    </div>
                </div>
            </div>

            @yield('content')

            <div class="container">
                <div class="w-full pt-16 pb-6 text-sm text-center md:text-left">
                    <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; {{ config('app.name', 'Laravel') }} 2019</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
