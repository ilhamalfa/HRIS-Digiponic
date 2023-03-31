<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('logo/brand-logo.png') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,300&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Preloader CSS --}}
    <link rel="stylesheet" href="{{ asset('preloader/style.css') }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('layout/landingpage/css/style.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Bootstrap CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    {{-- Preloader Start --}}
    {{-- <div id="cssload-loader">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div> --}}
    {{-- Preloader Start --}}

    {{-- Topbar Start --}}
    <nav class="topbar" id="topbar">
        <div class="topbar-brand">
            <a class="topbar-brand-text" href="/">
                <span>TECH.Solution</span>
            </a>
        </div>
        <div class="topbar-hamburger-menu" id="topbar-hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="topbar-account" id="topbar-account">
            <a class="topbar-account-logo" href="#">
                <i class="fa-solid fa-circle-user fa-2x"></i>
            </a>
        </div>
    </nav>
    {{-- Topbar End --}}

    {{-- Navmenu Start --}}
    <nav class="navmenu" id="navmenu">
        <a href="/">
            <span>Home</span>
        </a>
        <a href="#career">
            <span>Career</span>
        </a>
        <a href="#about">
            <span>About</span>
        </a>
        <a href="#product">
            <span>Product</span>
        </a>
        <a href="#structure">
            <span>Structure</span>
        </a>
        <a href="#">
            <span>Mail</span>
        </a>
    </nav>
    {{-- Navmenu End --}}

    {{-- Accountmenu Start --}}
    <nav class="account-menu" id="account-menu">
        @if (Auth::user())
            <a href="#">
                <span>Account</span>
            </a>
            <a href="#">
                <span>Setting</span>
            </a>
        @endif
        @guest
            <a href="#" id="login">
                <span>Login</span>
            </a>
            <div class="login-as" id="login-as">
                <form class="login-as-form" action="{{ route('rutelogin') }}" method="POST">
                    @csrf
                    <input type="submit" name="inputemployee" value="As Employee">
                    <input type="submit" name="inputcandidate" value="As Candidate">
                </form>
            </div>
            <a href="{{ route('register') }}">
                <span>Register</span>
            </a>
        @else
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </nav>
    {{-- Accountmenu End --}}

    {{-- Main Start --}}
    <main class="main"> 
        @yield('content')
    </main>
    {{-- Main End --}}

    {{-- Footer Start --}}
    <footer class="footer bg-dark text-white container-fluid">
        <div class="footer-material-strip-1"></div>
        <div class="footer-material-strip-2"></div>
        <div class="footer-material-red-1"></div>
        <div class="footer-material-red-2"></div>
        <div class="footer-material-red-3"></div>
        <div class="footer-material-red-4"></div>
        @if (Request::is('/'))
            <div class="footer-top">
                <div class="row text-center justify-content-center">
                    <div class="p-2">
                        <div class="logo m-3">
                            <img class="footer-brand-logo" src="{{ asset('logo/brand-logo.png') }}" alt="Brand Logo" id="footer-brand">
                        </div>
                        <div class="footer-web-description m-5 px-5">
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.Lorem
                                ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.Lorem
                                ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
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
                    &copy; Copyright 2023 Tech Solution | Maju Solid | Allright Reserved
                </div>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}

    {{-- Bootstrap JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- sweetAlert --}}
    @include('sweetalert::alert')

    {{-- JQuery --}}
    <script src="{{ asset('layout/landingpage/jquery/jquery-3.6.4.min.js') }}"></script>

    {{-- JS --}}
    <script src="{{ asset('layout/landingpage/js/script.js') }}"></script>
</body>

</html>
