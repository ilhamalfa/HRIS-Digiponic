@extends('auth.layout')

@section('title', 'Login Page')

@section('content')
    <div class="auth">
        <h1 class="auth-title">Sign In</h1>
        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="auth-email-box">
                {{-- <label for="email">Email</label> --}}
                <input type="email" id="email" name="login" value="{{ old('email') }}" placeholder="Your Email"
                    required autocomplete="email" autofocus>
            </div>
            <div class="auth-password-box">
                {{-- <label for="password">Password</label> --}}
                <input type="password" id="password" name="password" placeholder="Password" required
                    autocomplete="current-password">
            </div>
            <div class="auth-remember-box">
                <input class="auth-remember-checkbox" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                {{-- <label class="auth-remember-checkbox-label" for="remember">
                    {{ __('Remember Me') }}
                </label> --}}
                <span>Remember Me</span>
            </div>
            <div class="auth-button-box">
                <button type="submit" class="auth-button btn btn-outline-secondary rounded-0 px-5 m-3">
                    SIGN IN
                </button>
            </div>
            <div class="auth-forgot-password-box">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <div class="auth-switch-box">
                <p class="auth-switch-title">Dont Have Account?</p>
                <div class="auth-switch-sign-up-as-box">
                    <a href="{{ route('register') }}" class="auth-switch-sign-up">
                        <i class="fa-solid fa-file-lines m-2"></i>
                        <span>Sign Up</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection


