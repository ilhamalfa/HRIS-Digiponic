@extends('auth.layout')

@section('title', 'Login Page')

@section('content')
    <div class="auth">
        @isset($_GET['person'])
            @if ($_GET['person'] == 1)
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="email">
                        {{-- <label for="email">Email</label> --}}
                        <input type="nik" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Your NIK"
                            required autocomplete="nik">
                    </div>
                    <div class="password">
                        {{-- <label for="password">Password</label> --}}
                        <input type="password" id="password" name="password" placeholder="Password" required
                            autocomplete="current-password">
                    </div>
                    <div class="button">
                        <button type="submit">LOGIN</button>
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
                    <div class="button">
                        <button type="submit">LOGIN</button>
                    </div>
                </form>
            @endif
        @endisset
    </div>
@endsection
