@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-half-desktop is-offset-3-desktop is-10-mobile is-offset-1-mobile">
        <div class="card">
            <div class="card-content">
                <div class="has-text-centered mb-1">
                    <h3 class="is-size-4">Register</h3>
                    <h4 class="is-size-6">And create your first interactive poll!</h4>
                </div>

                <div class="container">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <label for="name" class="label">Full Name:</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-medium" name="name" id="name" type="text" placeholder="Full Name" value="{{ old('name') }}">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                                @error('name')
                                <span class="icon is-small is-right">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                @enderror
                            </div>
                            @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="email" class="label">Email:</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-medium" name="email" id="email" type="email" placeholder="Email Address" value="{{ old('email') }}">
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
                                <input class="input is-medium" name="password" id="password" type="password" placeholder="Password">
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
                            <label for="password_confirmation" class="label">Confirm Password:</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-medium" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                                @error('password_confirmation')
                                <span class="icon is-small is-right">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                @enderror
                            </div>
                            @error('password_confirmation')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between mt-2">
                            <button type="submit" class="button is-info">
                                Register
                            </button>
                            <a class="has-text-info ml-1" href="/">
                                Already have an account? Login!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
