@extends('auth.layout')

@section('title', 'Login Page')

@section('content')
    <div class="auth">
        <h1>Have an account?</h1>
        @isset($_GET['person'])
            @if ($_GET['person'] == 1)
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="nik">
                        {{-- <label for="email">Email</label> --}}
                        <input type="number" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Your NIK"
                            required autocomplete="nik">
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
                </form>
            @endif
        @endisset
    </div>
@endsection
