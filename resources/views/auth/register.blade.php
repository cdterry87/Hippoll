@extends('layouts.app')

@section('content')
<div class="w-full mt-4">
    <div class="w-11/12 lg:w-1/2 mx-auto bg-white p-10 rounded border-gray-800 shadow-md">
        <h2 class="font-semibold text-center text-2xl text-gray-600">Register</h2>
        <hr class="text-gray-300 mt-2 mb-6">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="mb-2 inline-block font-semibold text-gray-700">Full Name</label>
                <input class="bg-white border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" name="name" id="name" type="text" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>
                @error('name')
                    <span class="inline-block text-red-500 mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="mb-2 inline-block font-semibold text-gray-700">Email Address</label>
                <input class="bg-white border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" name="email" id="email" type="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                @error('email')
                    <span class="inline-block text-red-500 mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="mb-2 inline-block font-semibold text-gray-700">Password</label>
                <input class="bg-white border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" name="password" id="password" type="password" placeholder="Password" required autocomplete="off">
                @error('password')
                    <span class="inline-block text-red-500 mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="mb-2 inline-block font-semibold text-gray-700">Confirm Password</label>
                <input class="bg-white border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password" required autocomplete="off">
                @error('password_confirmation')
                    <span class="inline-block text-red-500 mt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex items-center justify-between flex-wrap md:flex-no-wrap mt-4">
                <div class="flex flex-col">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Sign Up
                    </button>
                </div>
                <div class="flex flex-row">
                    <a class="inline-block mt-4 md:mt-2 align-baseline text-sm text-blue-500 hover:text-blue-700" href="/login">
                        Already have an account? Login!
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
