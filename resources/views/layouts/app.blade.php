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
<body class="bg-gray-100">
    <main>
        <div class="pb-14 bg-no-repeat md:bg-right" style="background-image: url('images/bg.svg'); background-size: 700px;">
            <div class="w-full mx-auto px-6 pt-2">
                <div class="w-full flex items-center justify-between">
                    <a class="flex items-center no-underline hover:no-underline font-bold text-2xl lg:text-4xl"  href="/">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <div class="flex w-1/2 justify-end content-center">
                        @guest
                            <a class="text-blue-500 hover:text-blue-700 inline-block h-10 py-2 px-4 ml-2" href="register">
                                Register
                            </a>
                        @endguest
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="text-blue-500 hover:text-blue-700 inline-block h-10 py-2 px-4 ml-2">Logout</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>

            @yield('content')

            <div class="w-full pt-16 pb-6 text-sm text-center bg-no-repeat bg-left bg-left-top mt-32" style="background-image: url('images/bg.svg'); background-size: 300px;">
                <span class="mr-4 text-gray-500 no-underline hover:no-underline">&copy; {{ config('app.name', 'Laravel') }} 2019</span>
                <a class="mr-4 text-blue-500 hover:text-blue-700 font-semibold" href="#">About</a>
                <a class="mr-4 text-blue-500 hover:text-blue-700 font-semibold" href="#">Terms and Conditions</a>
                <a class="mr-4 text-blue-500 hover:text-blue-700 font-semibold" href="#">Privacy Policy</a>
            </div>
        </div>
    </main>
</body>
</html>
