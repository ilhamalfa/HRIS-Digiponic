@extends('auth.layout')

@section('title', 'Register')

@section('content')
    <div class="auth">
        <h1>Register Now</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="email">
                {{-- <label for="email">Email</label> --}}
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required
                    autocomplete="email">
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
                <button type="submit" class="btn btn-outline-secondary rounded-pill px-5 m-3">REGISTER NOW</button>
            </div>
        </form>
    </div>
@endsection
