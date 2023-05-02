<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Header Icons Start --}}
    <link rel="icon" href="{{ asset('logo/brand-logo-red.webp') }}">
    {{-- Header Icons End --}}

    {{-- Google Fonts Start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,400;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet">
    {{-- Google Fonts End --}}

    {{-- Font Awesome Start --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Font Awesome End --}}

    {{-- Bootstrap CSS CDN Start --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- Bootstrap CSS CDN End --}}

    {{-- Layout CSS Start --}}
    <link rel="stylesheet" href="{{ asset('layout/landingpage/css/style.css') }}">
    {{-- Layout CSS End --}}

</head>

<body>

    {{-- Preloader Start --}}
    {{-- <div class="preloader">
        <img class="preloader-image" src="{{ asset('preloader/landingpage.png') }}" alt="Preloader">
    </div> --}}
    {{-- Preloader End --}}

    {{--  Topbar Modal Form Start --}}
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sign In</h1>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark m-auto"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="auth-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="auth-email-box">
                            <input class="form-input" type="email" id="login" name="email"
                                value="{{ old('email') }}" placeholder="Your Email" required autocomplete="login"
                                autofocus>
                        </div>
                        <div class="auth-password-box">
                            <input class="form-input" type="password" id="password" name="password"
                                placeholder="Password" required autocomplete="current-password">
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
            </div>
        </div>
    </div>
    {{-- Topbar Modal Form End --}}

    {{-- Topbar Start --}}
    <nav class="topbar px-5">
        <div class="brand-box topbar-section">
            <img class="image" src="{{ asset('logo/brand-logo-white.webp') }}" alt="Brand Logo">
            <a class="text tx-secondary-color-1" href="{{ url('/') }}">TECH Solution</a>
        </div>
        <div class="menu-box topbar-section">
            <a class="link tx-secondary-color-1" href="{{ url('/') }}">
                <span>Home</span>
            </a>
            <a class="link tx-secondary-color-1" href="{{ url('/career') }}">
                <span>Career</span>
            </a>
            <a class="link tx-secondary-color-1" href="{{ url('/') }}">
                <span>About</span>
            </a>
            <a class="link tx-secondary-color-1" href="{{ url('/') }}">
                <span>Product</span>
            </a>
            <a class="link tx-secondary-color-1" href="{{ url('/') }}">
                <span>Team</span>
            </a>
        </div>
        <div class="account-box topbar-section">
            @guest
                <button type="button" class="button-animation-lime button-login btn rounded-0" data-bs-toggle="modal"
                    data-bs-target="#modalForm">
                    <span>Sign In</span>
                </button>
            @else
                <div class="dropdown">
                    <button class="btn dropdown-toggle tx-secondary-color-1" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if (Auth::user()->role != 'Pelamar' && isset(Auth::user()->pegawai))
                            <img class="img rounded-circle"
                                src="{{ asset('storage/' . Auth::user()->pegawai->foto) }}" alt="Profile Image">
                        @elseif (Auth::user()->role == 'Pelamar' && isset(Auth::user()->pelamar))
                            <img class="img rounded-circle"
                                src="{{ asset('storage/' . Auth::user()->pelamar->foto) }}" alt="Profile Image">
                        @else
                            <img class="img rounded-circle "
                                src="{{ asset('template/assets/images/faces/face18.jpg') }}" alt="Profile Image">
                        @endif
                        @if (isset(Auth::user()->pegawai))
                            <span>{{ Auth::user()->pegawai->nama }}</span>
                        @elseif (isset(Auth::user()->pelamar) && Auth::user()->role == 'Pelamar')
                            <span>{{ Auth::user()->pelamar->nama }}</span>
                        @else
                            <span>{{ Auth::user()->email }}</span>
                        @endif
                    </button>
                    <ul class="dropdown-menu bg-optional-color-2">
                        @if (Auth::user()->role == 'Pelamar')
                            <li>
                                <a class="dropdown-item tx-secondary-color-1"
                                    href="{{ url('/pelamar/daftar-lamaran/') }}">
                                    <i class="fa-solid fa-file-pen text-white me-2"></i>
                                    <span>Applied Vacancy</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item tx-secondary-color-1 setting" href="{{ url('/') }}">
                                <img class="gif me-2" src="{{ asset('layout/landingpage/topbar/settings.gif') }}"
                                    alt="...">
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item tx-secondary-color-1 log-out" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket text-danger me-2"></i>
                                <span class="text-danger">Log Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </nav>
    {{-- Topbar End --}}

    {{-- Main Content Start --}}
    <div class="main bg-primary-color">
        @yield('content')
    </div>
    {{-- Main Content End --}}

    {{-- Footer Start --}}
    <footer class="footer-bg container-fluid">
        @if (Request::is('/'))
            <div class="footer-top">
                <div class="row text-center justify-content-center">
                    <div class="p-2">
                        <div class="logo">
                            <img class="footer-brand-logo" src="{{ asset('logo/brand-logo-white.webp') }}"
                                alt="Brand Logo" id="footer-brand">
                        </div>
                        <div class="footer-web-description-box">
                            <p class="mb-4 footer-web-description">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.Lorem
                                ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                            <p class="mb-4 footer-web-description">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.Lorem
                                ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                            <p class="mb-4 footer-web-description">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                        </div>
                    </div>
                </div>
                <div class="footer-social-media-box m-5">
                    <div>
                        <a class="footer-social-media" href="#">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                    <div>
                        <a class="footer-social-media" href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                    <div>
                        <a class="footer-social-media" href="#">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                    <div>
                        <a class="footer-social-media" href="#">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <div class="end-footer py-4">
            <div class="row text-center">
                <div class="col">
                    &copy; Copyright 2023 Tech Solution Indonesia | Solid Solid Solid | Allright Reserved
                </div>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}

    {{-- JQuery Start --}}
    <script src="{{ asset('layout/jquery/jquery-3.6.4.min.js') }}"></script>
    {{-- JQuery End --}}

    {{-- JS Start --}}
    <script src="{{ asset('layout/landingpage/js/script.js') }}"></script>
    {{-- JS End --}}

    {{-- JS CDN Start --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    {{-- JS CDN End --}}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/alamat.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
