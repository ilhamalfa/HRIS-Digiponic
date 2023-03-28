@extends('auth.layout')

@section('title', 'Login Page')

@section('content')
<<<<<<< HEAD
    <div class="auth">
        <h1>Have an account?</h1>
        @if ($person == 1)
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="nik">
                    {{-- <label for="email">Email</label> --}}
                    <input type="number" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Your NIK"
                        required autocomplete="nik">
=======
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="login" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="login" value="{{ old('email') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

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
>>>>>>> f8ab25b510e1d9f2f208030b5ec9678e8a9c7a80
                </div>
                <div class="password">
                    {{-- <label for="password">Password</label> --}}
                    <input type="password" id="password" name="password" placeholder="Password" required
                        autocomplete="current-password">
                </div>
                <div class="extra">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me!</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-outline-secondary rounded-pill px-5 m-3">LOGIN</button>
                </div>
                <div class="switch">
                    <p>OR</p>
                    <a href="{{ route('register') }}" class="">Create Account</a>
                </div>
            </form>
        @else
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="email">
                    {{-- <label for="email">Email</label> --}}
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email"
                        required autocomplete="email">
                </div>
                <div class="password">
                    {{-- <label for="password">Password</label> --}}
                    <input type="password" id="password" name="password" placeholder="Password" required
                        autocomplete="current-password">
                </div>
                <div class="extra">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me!</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-outline-secondary rounded-pill px-5 m-3">LOGIN</button>
                </div>
                <div class="switch">
                    <p>OR</p>
                    <a href="{{ route('register') }}" class="">Create Account</a>
                </div>
            </form>
        @endif
    </div>
@endsection
