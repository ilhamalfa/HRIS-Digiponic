@extends('auth.layout')

{{-- @section('title', 'Register') --}}

@section('content')
    <div class="auth">
        <h1>Create Account</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="email">
                {{-- <label for="email">Email</label> --}}
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required
                    autocomplete="email">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Register') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="password">
                                {{-- <label for="password">Password</label> --}}
                                <input type="password" id="password" name="password" placeholder="Password" required
                                    autocomplete="new-password">
                            </div>
                            <div class="password-confirm">
                                {{-- <label for="password">Password</label> --}}
                                <input type="password" id="password-confirm" name="password_confirmation"
                                    placeholder="Password Confirmation" required autocomplete="new-password">
                            </div>
                            <div class="button">
                                <button type="submit" class="btn btn-outline-secondary rounded-pill px-5 m-3">REGISTER
                                    NOW</button>
                            </div>
                            <div class="switch">
                                <p>Already Have Account?</p>
                                <a href="login?person=1" class="">
                                    <i class="fa-solid fa-user-check m-2"></i>
                                    Login as Employee
                                </a>
                                <p>OR</p>
                                <a href="login?person=2" class="">
                                    <i class="fa-solid fa-user-tie m-2"></i>
                                    Login as Candidate
                                </a>
                            </div>
        </form>
    </div>
@endsection
