{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nik" class="col-md-4 col-form-label text-md-end">{{ __('Nomor Induk Karyawan') }}</label>

                            <div class="col-md-6">
                                <input id="login" type="number"
                                class="form-control{{ $errors->has('nik') || $errors->has('email') ? ' is-invalid' : '' }}"
                                name="login" value="{{ old('nik') ?: old('email') }}" required autofocus>

                                @if ($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('auth.layout')

@section('title', 'Employee Login Page')

@section('content')
    <div class="auth">
        <a class="auth-back" href="{{ url('/') }}">
            <i class="fa-solid fa-hand-point-left"></i>
        </a>
        <h1 class="auth-title">Sign In</h1>
        <h6 class="auth-slogan">Work Hard Stay Humble.</h6>
        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="auth-nik-box">
                <input class="form-input" type="number" id="nik" name="nik" value="{{ old('nik') ?: old('email') }}" placeholder="Your Nik"
                    required autofocus>
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
                {{-- <label class="auth-remember-checkbox-label" for="remember">
                    {{ __('Remember Me') }}
                </label> --}}
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

