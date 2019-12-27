@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-half-desktop is-10-mobile is-offset-1-mobile va-center">
        <h1 class="is-size-1 has-text-info mb-1 has-text-weight-bold">Be in the know,<br>Make a poll!</h1>
        <h2 class="is-size-5">Feel like you're missing something?<br>Get to know your users with a simple poll!</h2>
    </div>
    <div class="column is-half-desktop is-10-mobile is-offset-1-mobile">
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div class="card">
                    <div class="card-content">
                        @guest
                        <div class="has-text-centered mb-1">
                            <h3 class="is-size-4">Login</h3>
                            <h4 class="is-size-6">And get polling!</h4>
                        </div>

                        <div class="container">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="field">
                                    <label for="email" class="label">Email:</label>
                                    <div class="control has-icons-left has-icons-right">
                                        <input class="input is-medium" id="email" type="email" placeholder="Email Address" value="{{ old('email') }}">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        @error('email')
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        @enderror
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="password" class="label">Password:</label>
                                    <div class="control has-icons-left has-icons-right">
                                        <input class="input is-medium" id="password" type="password" placeholder="Password">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        @error('password')
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        @enderror
                                    </div>
                                    @error('password')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label class="label font-weight-bold">
                                        <input class="mr-1 checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span>
                                            Remember Me
                                        </span>
                                    </label>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="button is-info">
                                        Sign In
                                    </button>
                                    <a class="has-text-info ml-1" href="#">
                                        Forgot Password?
                                    </a>
                                </div>
                            </form>
                        </div>
                        @endguest

                        @auth
                        <div class="container">
                            <h3 class="is-size-4">Manage Your Polls</h3>
                            <a href="/home" class="button is-primary">Get Started</a>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
