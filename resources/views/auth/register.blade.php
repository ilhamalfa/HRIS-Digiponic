@extends('auth.layout')

@section('title', 'Register Page')

@section('content')
    <div class="auth">
        <a class="auth-back" href="{{ url('/') }}">
            <i class="fa-solid fa-hand-point-left"></i>
        </a>
        <h1 class="auth-title">Create Account</h1>
        <form class="auth-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="auth-email-box">
                <input class="form-input" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required
                    autocomplete="email">
            </div>
            <div class="auth-password-box">
                <input class="form-input" type="password" id="password" name="password" placeholder="Password" required
                    autocomplete="new-password">
                <i class="fa-solid fa-eye password-icon-eye" id="password-icon-eye"></i>
                <i class="fa-solid fa-eye-slash password-icon-eye-slash" id="password-icon-eye-slash"></i>
            </div>
            <div class="auth-password-confirm-box">
                <input class="form-input" type="password" id="password-confirm" name="password_confirmation"
                    placeholder="Password Confirmation" required autocomplete="new-password">
                <i class="fa-solid fa-eye password-icon-eye" id="password-confirm-icon-eye"></i>
                <i class="fa-solid fa-eye-slash password-icon-eye-slash" id="password-confirm-icon-eye-slash"></i>
            </div>
            <div class="auth-button-box">
                <button type="submit" class="auth-button btn btn-outline-secondary rounded-0 px-5 m-3">REGISTER NOW</button>
            </div>
            <div class="auth-switch-box">
                <p class="auth-switch-title">Already Have Account?</p>
                <div class="auth-switch">
                    <a href="{{ url('/login-pegawai') }}" class="auth-switch-login-as-employee">
                        <i class="fa-solid fa-user-check m-2"></i>
                        <span>Login as Employee</span>
                    </a>
                    <a href="{{ url('/login') }}" class="auth-switch-login-as-candidate">
                        <i class="fa-solid fa-user-tie m-2"></i>
                        <span>Login as Candidate</span>
                    </a>
                </div>
            </div>
            <div class="auth-extra-box">
                <p class="auth-extra-text">By creating an account you are accepting our</p>
                <a class="btn btn-link text-white auth-extra-link" href="/">Terms & Conditions</a>
            </div>
        </form>
    </div>
@endsection
