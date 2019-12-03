@extends('layouts.app')

@section('content')
<div class="w-full">
    <div class="w-11/12 lg:w-1/2 mx-auto bg-white p-10 rounded border-gray-800 shadow-md">
        <h2 class="font-semibold text-center text-2xl text-gray-600">Login</h2>
        <hr class="text-gray-300 mt-2 mb-6">
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
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="md:w-2/3 block text-gray-500 font-semibold">
                        <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="text-sm">
                            Remember Me
                        </span>
                    </label>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Sign In
                </button>
                <a class="inline-block align-baseline text-sm text-blue-500 hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
