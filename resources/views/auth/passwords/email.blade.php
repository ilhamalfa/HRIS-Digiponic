@extends('layouts.page')

@section('title', 'Reset Password')

@section('content')
    <div class="reset-password-box">
        <div class="card">
            <div class="card-header">
                <h6 class="reset-password-title fw-bold fs-5 tx-primary-color">Reset Password</h6>
            </div>
            <div class="card-body d-flex flex-column align-items-center">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="d-flex flex-column align-items-center">
                    <i class="fa-solid fa-lock fs-1"></i>
                    <p class="fw-bold my-3">Trouble logging in?</p>
                    <p class="text-center my-2">Enter your email and we'll send you a <br> link to get back into
                        your account.</p>
                </div>
                <form class="d-flex flex-column justify-content-center align-content-center" method="POST"
                    action="{{ route('password.email') }}">
                    @csrf
                    <label for="email" class="d-none">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Your Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="auth-button btn btn-outline-secondary rounded-0 px-5 m-3">
                        SEND RESET LINK
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
