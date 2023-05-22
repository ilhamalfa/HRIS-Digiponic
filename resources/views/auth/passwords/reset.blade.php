@extends('layouts.page')

@section('title', 'Reset Password')

@section('content')
    <div class="reset-password-box">
        <div class="card">
            <div class="card-header">
                <h6 class="text-black fs-5 fw-bold">Input New Password</h6>
            </div>
            <div class="card-body d-flex flex-column align-items-center">
                <form class="d-flex flex-column justify-content-center align-content-center" method="POST"
                    action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <label for="email" class="d-none">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" placeholder="Your Email" required
                        autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password" class="d-none">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror"
                        name="password" placeholder="New Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password-confirm" class="d-none">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-input" name="password_confirmation"
                        placeholder="Confirm Password" required autocomplete="new-password">
                    <button type="submit" class="auth-button btn btn-outline-secondary rounded-0 px-5 m-3">
                        DONE
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
