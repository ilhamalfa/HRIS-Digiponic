@extends('auth.layout')

@section('title', 'Login Page')

@section('content')
    <div class="auth">
        <a class="auth-back" href="{{ url('/') }}">
            <i class="fa-solid fa-hand-point-left"></i>
        </a>
        <h1 class="auth-title">Sign In</h1>
        <h6 class="auth-slogan">Good To See You Again..</h6>
        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="auth-email-box">
                <input class="form-input" type="email" id="login" name="login" value="{{ old('login') }}"
                    placeholder="Your Email" required autocomplete="login" autofocus>
            </div>
            <div class="auth-password-box">
                <input class="form-input" type="password" id="password" name="password" placeholder="Password" required
                    autocomplete="current-password">
                <i class="fa-solid fa-eye password-icon-eye" id="password-icon-eye"></i>
                <i class="fa-solid fa-eye-slash password-icon-eye-slash" id="password-icon-eye-slash"></i>
            </div>
            <div class="auth-remember-box">
                <input class="auth-remember-checkbox" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <span class="auth-remember-checkbox-label">Remember Me</span>
            </div>
            <div class="auth-button-box">
                <button type="submit" class="auth-button btn btn-outline-secondary rounded-0 px-5 m-3">
                    SIGN IN
                </button>
            </div>
            <div class="auth-forgot-password-box">
                @if (Route::has('password.request'))
                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <div class="auth-switch-box">
                <p class="auth-switch-title">Don't Have Account?</p>
                <div class="auth-switch">
                    <a href="{{ route('register') }}" class="auth-switch-sign-up">
                        <i class="fa-solid fa-file-lines m-2"></i>
                        <span>Sign Up</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
