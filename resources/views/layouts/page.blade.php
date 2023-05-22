<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Header Icons Start --}}
    <link rel="icon" href="{{ asset('logo/brand-logo-white.webp') }}">
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

    {{--  Topbar Login Form Start --}}
    <div class="modal fade" id="loginForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-secondary-color-1">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 tx-primary-color" id="exampleModalLabel">Sign In</h1>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark m-auto"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="auth-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="auth-email-box">
                            <input class="form-input" type="number" id="loginEmail" name="nik"
                                value="{{ old('nik') }}" placeholder="Your Nik" required autocomplete="off"
                                autofocus>
                        </div>
                        <div class="auth-password-box">
                            <input class="form-input" type="password" id="loginPassword" name="password"
                                placeholder="Password" required autocomplete="off">
                            <i class="fa-solid fa-eye password-icon-eye" id="login-icon-eye"></i>
                            <i class="fa-solid fa-eye-slash password-icon-eye-slash" id="login-icon-eye-slash"></i>
                        </div>
                        <div class="auth-forgot-password-box">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-black" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="auth-button-box">
                            <button type="submit" class="auth-button btn btn-outline-secondary rounded-0 px-5 m-3">
                                SIGN IN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Topbar Login Form End --}}

    {{-- Topbar Start --}}
    @if (Request::is('/'))
        <nav class="topbar px-1 d-flex justify-content-center align-items-center">
        @else
            <nav class="topbar px-1 d-flex justify-content-center align-items-center bg-primary-color">
    @endif
    <div class="topbar-logo-box topbar-section d-flex justify-content-center align-items-center">
        <img class="topbar-logo topbar-logo-white" src="{{ asset('logo/brand-logo-white.webp') }}" alt="Brand Logo">
        <img class="topbar-logo topbar-logo-black" src="{{ asset('logo/brand-logo-black.webp') }}" alt="Brand Logo">
        <a class="topbar-logo-text ms-2" href="{{ url('/') }}">TECH Solution</a>
    </div>
    <div class="topbar-menu-box topbar-section">
        <a class="topbar-menu tx-secondary-color-1" href="{{ url('/') }}">
            <span>Home</span>
        </a>
        <a class="topbar-menu tx-secondary-color-1" href="{{ url('/career') }}">
            <span>Career</span>
        </a>
        <a class="topbar-menu tx-secondary-color-1" href="{{ url('/') }}">
            <span>About</span>
        </a>
        <a class="topbar-menu tx-secondary-color-1" href="{{ url('/') }}">
            <span>Product</span>
        </a>
        <a class="topbar-menu tx-secondary-color-1" href="{{ url('/') }}">
            <span>Team</span>
        </a>
    </div>
    <div class="topbar-account-box topbar-section">
        <button type="button" class="button-animation-lime topbar-button-login btn rounded-0" data-bs-toggle="modal"
            data-bs-target="#loginForm">
            <span>Sign In</span>
        </button>
    </div>
    <div class="topbar-hamburger-menu-box topbar-section justify-content-end align-items-center px-3">
        <button type="button" class="button-animation-lime topbar-button-login btn rounded-0 mx-2"
            data-bs-toggle="modal" data-bs-target="#loginForm">
            <span>Sign In</span>
        </button>
        <div class="topbar-hamburger-menu-button-box">
            <i class="fa-solid fa-bars fa-2x topbar-hamburger-menu-button tx-secondary-color-1"
                id="hamburgerMenuButton"></i>
        </div>
        <div class="topbar-hamburger-menu-mobile bg-primary-color d-flex justify-content-center align-items-end py-3"
            id="hamburgerListMenu">
            <a class="topbar-menu tx-secondary-color-1" href="{{ url('/') }}">
                <span>Home</span>
            </a>
            <a class="topbar-menu tx-secondary-color-1" href="{{ url('/career') }}">
                <span>Career</span>
            </a>
            <a class="topbar-menu tx-secondary-color-1" href="{{ url('/') }}">
                <span>About</span>
            </a>
            <a class="topbar-menu tx-secondary-color-1" href="{{ url('/') }}">
                <span>Product</span>
            </a>
            <a class="topbar-menu tx-secondary-color-1" href="{{ url('/') }}">
                <span>Team</span>
            </a>
        </div>
    </div>
    </nav>
    {{-- Topbar End --}}

    {{-- Main Content Start --}}
    <div class="main bg-primary-color">
        @yield('content')
    </div>
    {{-- Main Content End --}}

    {{-- Footer Start --}}
    @if (Request::is('/'))
        <footer class="footer bg-primary-color">
            <div class="footer-left-side">
                <div class="footer-logo-box footer-left-side-section">
                    <img class="footer-brand-logo" src="{{ asset('main/footer/brand-logo.webp') }}"
                        alt="Footer Logo">
                </div>
                <div class="footer-tagline-box">
                    <p class="footer-tagline tx-secondary-color-1">Modern Problem <br> Need Modern Solution</p>
                </div>
                <div class="footer-social-media-box footer-left-side-section">
                    <a class="footer-social-media" href="{{ url('/') }}">
                        <i class="fa-brands fa-twitter twitter"></i>
                    </a>
                    <a class="footer-social-media" href="{{ url('/') }}">
                        <i class="fa-brands fa-instagram instagram"></i>
                    </a>
                    <a class="footer-social-media" href="{{ url('/') }}">
                        <i class="fa-brands fa-facebook-f facebook"></i>
                    </a>
                    <a class="footer-social-media" href="{{ url('/') }}">
                        <i class="fa-brands fa-linkedin-in linkedin"></i>
                    </a>
                </div>
            </div>
            <div class="footer-right-side">
                <div class="footer-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.833149015558!2d112.6390140743083!3d-7.912491878754486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62b0ceafe747d%3A0xe99b9f79753df0b2!2sPT%20Digiponic%20Maju%20Jaya!5e0!3m2!1sid!2sid!4v1683252672527!5m2!1sid!2sid"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
                </div>
                <div class="footer-contact-box">
                    <h6 class="footer-contact tx-secondary-color-1 text-end my-2">Contact</h6>
                    <p class="footer-phone tx-secondary-color-1 text-end my-2 me-2">Phone +62 888-8888-8888</p>
                    <p class="footer-email tx-secondary-color-1 text-end my-2 me-2">Email techsolution@gmail.com</p>
                    <p class="footer-address tx-secondary-color-1 text-end my-2 me-2">Jl. Perusahaan Raya no. 27
                        Bodosari, <br> Tanjungtirto, Bodosari, Kabupaten,
                        <br> Kec. Singosari, Kabupaten Malang, <br> Jawa Timur 65153
                    </p>
                </div>
            </div>
        </footer>
    @endif
    <div class="footer-mini bg-primary-color">
        &copy; Copyright 2023 Tech Solution Indonesia | Solid Solid Solid | Allright Reserved
    </div>
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
