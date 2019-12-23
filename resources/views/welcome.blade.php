@extends('layouts.app')

@section('content')
<div class="pt-10 px-6 mx-auto flex flex-wrap md:flex-no-wrap">
    <div class="flex flex-col w-full xl:w-2/5 justify-center overflow-y-hidden">
        <h1 class="my-4 text-3xl md:text-5xl text-blue-500 font-semibold leading-tight text-center md:text-left slide-in-bottom-h1">Be in the Know,<br>Make a Poll!</h1>
        <p class="leading-normal font-hairline text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">Feel like you're missing something?<br>Get to know your users with a simple poll!</p>
    </div>
    <div class="flex flex-col w-full xl:w-3/5 py-6 overflow-y-hidden justify-center object-center text-center items-center bg-center">
        {{-- <img src="images/logo.png" id="logo" class="h-64 mx-auto" alt="Hippoll Logo"> --}}
        <div class="w-11/12 lg:w-3/4 mx-auto bg-white p-10 rounded border-gray-800 shadow-md">
            <h2 class="font-semibold text-center text-2xl text-gray-600 mb-2">Login</h2>
            <h3 class="text-center text-sm text-gray-600 mb-6">And start making your polls!</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <input class="bg-white border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal @error('email') border-red-500 @enderror" name="email" id="email" type="email" value="{{ old('email') }}" placeholder="Email Address" required>
                    @error('email')
                        <span class="inline-block text-red-500 mt-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input class="bg-white border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal @error('password') border-red-500 @enderror" name="password" id="password" type="password" placeholder="Password" required>
                    @error('password')
                        <span class="inline-block text-red-500 mt-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md:flex text-left mb-6">
                    <label class="w-full block text-gray-500 font-semibold">
                        <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="text-sm">
                            Remember Me
                        </span>
                    </label>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline text-sm text-blue-500 hover:text-blue-700" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
