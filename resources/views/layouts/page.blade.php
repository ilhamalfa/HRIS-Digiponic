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
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,300&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    {{-- Google Fonts End --}}

    {{-- Font Awesome Start --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Font Awesome End --}}

    {{-- Bootstrap CSS CDN Start --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- Bootstrap CSS CDN End --}}

    {{-- Plugin CSS Start --}}
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    {{-- Plugin CSS End --}}

    {{-- Layout CSS Start --}}
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/landingpage/css/style.css') }}">
    {{-- Layout CSS End --}}

    {{-- Animations CSS Start --}}
    <link rel="stylesheet" href="{{ asset('template/assets/css/animations/style.css') }}">
    {{-- Animations CSS End --}}

</head>

<body>

    {{-- Preloader Start --}}
    <div class="preloader">
        <img class="preloader-image" src="{{ asset('preloader/landingpage.png') }}" alt="Preloader">
    </div>
    {{-- Preloader End --}}

    {{-- Topbar Phone Start --}}
    <div class="container-scroller navbar-phone">

        {{-- Sidebar For Phone Start --}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">

            {{-- Sidebar Brand Logo Start --}}
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo text-decoration-none text-white font-weight-500" href="/">
                    TECH.Solution
                </a>
                <a class="sidebar-brand brand-logo-mini" href="#">
                    <img src="{{ asset('logo/brand-logo-white.webp') }}" alt="Brand Logo" />
                </a>
            </div>
            {{-- Sidebar Brand Logo End --}}

            {{-- Sidebar Navigation Start --}}
            <ul class="nav">

                {{-- Sidebar Profile Box Start --}}
                <li class="nav-item profile">
                    @guest
                        <div class="profile-des">
                            <a class="nav-link" href="{{ route('login') }}">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                </span>
                                <span class="menu-title">Login</span>
                            </a>
                        </div>
                    @else
                        <div class="profile-desc">

                            {{-- Sidebar Profile Image & Name Start --}}
                            <div class="profile-pic">
                                <div class="count-indicator">
                                    <img class="img-xs rounded-circle"
                                    src="{{ asset('storage/' . Auth::user()->foto) }}" alt="">
                                </div>
                                <div class="profile-name">
                                    <h5 class="mb-0 font-weight-normal">
                                        {{ Auth::user()->nama }}
                                    </h5>
                                    <span class="overflow-auto">
                                        {{ Auth::user()->golongan }}
                                        <br>
                                        {{ Auth::user()->department }}
                                    </span>
                                </div>
                            </div>
                            {{-- Sidebar Profile Image & Name End --}}

                            {{-- Sidebar Profile 3 Dots Vertical Start --}}
                            <a href="#" id="profile-dropdown" data-bs-toggle="dropdown">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            {{-- Sidebar Profile 3 Dots Vertical End --}}

                            {{-- Sidebar Profile 3 Dots Vertical Menu Start --}}
                            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                                <a href="{{ url('/Account/account-setting') }}" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                    <a href="{{ url('/profile/edit-data-pegawai') }}" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-clipboard-account  text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Change User Data</p>
                                    </div>
                                </a>    
                            </div>
                            {{-- Sidebar Profile 3 Dots Vertical Menu End --}}

                        </div>
                    @endguest
                </li>
                {{-- Sidebar Profile Box End --}}

                {{-- Sidebar Title Navigation Start --}}
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                {{-- Sidebar Title Navigation End --}}

                {{-- Sidebar Dashboard Start --}}
                <li class="nav-item menu-items">
                    <a class="nav-link" href="/">
                        <span class="menu-icon">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('/pelamar/lowongan') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-square-pen"></i>
                        </span>
                        <span class="menu-title">Career</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="#about-us">
                        <span class="menu-icon">
                            <i class="fa-solid fa-circle-info"></i>
                        </span>
                        <span class="menu-title">About</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="#product">
                        <span class="menu-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <span class="menu-title">Product</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="#team">
                        <span class="menu-icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="menu-title">Team</span>
                    </a>
                </li>
                {{-- Sidebar Dashboard End --}}

            </ul>
            {{-- Sidebar Navigation  End --}}

        </nav>
        {{-- Sidebar For Phone End --}}

        {{-- Topbar Start --}}
        <nav class="navbar p-0 fixed-top d-flex flex-row justify-between">

            {{-- Topbar Brand Logo Start --}}
            <div class="navbar-brand d-flex d-lg-none align-items-center justify-content-center ms-2">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('logo/brand-logo-red.webp') }}" alt="Brand Logo" width="50" />
                </a>
            </div>
            {{-- Topbar Brand Logo End --}}

            {{-- Topbar Hamburger Menu Start --}}
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch justify-content-end p-0 m-0">

                {{-- Topbar Hamburger Menu Start --}}
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
                {{-- Topbar Hamburger Menu End --}}

            </div>
            {{-- Topbar Hamburger Menu End --}}

            {{-- Topbar Profile Start --}}
            <div class="d-flex">
                <a class="nav-link" id="profile-mobile" href="#" data-bs-toggle="dropdown">
                    <div class="d-flex justify-center align-items-center">
                        @guest
                            <p class="mb-0 ms-2 d-none d-sm-block navbar-profile-name text-white">Login</p>
                        @else
                            <img class="img-xs rounded-circle"
                            src="{{ asset('storage/' . Auth::user()->foto) }}" alt="">
                            <p class="mb-0 ms-2 d-none d-sm-block navbar-profile-name text-white">
                                    {{ Auth::user()->nama }}
                            </p>
                        @endguest
                        <i class="mdi mdi-menu-down d-none d-sm-block text-warning"></i>
                    </div>
                </a>
                <div class="dropdown-menu-right navbar-dropdown preview-list nav-menu-mobile" id="profile-menu"
                    aria-labelledby="profileMenu">
                    <div class="dropdown-divider"></div>
                    @guest
                        <a class="dropdown-item preview-item flex align-items-center py-1 my-1 px-2"
                            href="{{ url('login') }}">
                            <div class="preview-thumbnail ps-1">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="fa-solid fa-right-to-bracket text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1 profile-login">Log In</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item flex align-items-center py-1 my-1 px-2"
                            href="{{ url('register') }}">
                            <div class="preview-thumbnail ps-1">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="fa-solid fa-file-pen text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1 profile-register">Register</p>
                            </div>
                        </a>
                    @else
                        <a class="dropdown-item preview-item flex align-items-center py-1 my-1 px-2">
                            <div class="preview-thumbnail ps-1">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1 profile-settings">Settings</p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item flex align-items-center py-1 my-1 px-2"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <div class="preview-thumbnail ps-1">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="fa-solid fa-right-from-bracket text-danger profile-logout"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1 profile-logout">Log Out</p>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                    <div class="dropdown-divider"></div>
                </div>
            </div>
            {{-- Topbar Profile End --}}

        </nav>
        {{-- Topbar End --}}

    </div>
    {{-- Topbar Phone End --}}

    {{-- Topbar Start --}}
    <nav class="topbar">
        <div class="topbar-brand-box topbar-section">
            <img class="topbar-image" src="{{ asset('logo/brand-logo-red.webp') }}" alt="Topbar Logo">
            <a class="topbar-brand" href="{{ url('/') }}">TECH Solution</a>
        </div>
        <div class="topbar-menu-box topbar-section">
            <a class="topbar-menu" href="{{ url('/') }}">
                <i class="fa-solid fa-house topbar-menu-icon text-primary"></i>
                <span>Home</span>
            </a>
            <a class="topbar-menu" href="{{ url('/career') }}">
                <i class="fa-solid fa-square-pen topbar-menu-icon text-success"></i>
                <span>Career</span>
            </a>
            <a class="topbar-menu" href="{{ url('/') }}">
                <i class="fa-solid fa-circle-info topbar-menu-icon text-info"></i>
                <span>About</span>
            </a>
            <a class="topbar-menu" href="{{ url('/') }}">
                <i class="fa-solid fa-cart-shopping topbar-menu-icon text-warning"></i>
                <span>Product</span>
            </a>
            <a class="topbar-menu" href="{{ url('/') }}">
                <i class="fa-solid fa-users topbar-menu-icon text-danger"></i>
                <span>Team</span>
            </a>
        </div>
        <div class="topbar-account-box topbar-section">
            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                <div class="navbar-profile">
                    @guest
                        <p class="mb-0 ms-2 d-none d-sm-block navbar-profile-name text-white">Login</p>
                    @else
                        <img class="img-xs rounded-circle"
                        src="{{ asset('storage/' . Auth::user()->foto) }}" alt="">
                        <p class="mb-0 ms-2 d-none d-sm-block navbar-profile-name text-white">
                            {{ Auth::user()->nama }}
                        </p>
                    @endguest
                    <i class="mdi mdi-menu-down d-none d-sm-block text-warning"></i>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                @guest
                    <a class="dropdown-item preview-item flex align-items-center py-1 my-1" href="{{ url('login') }}">
                        <div class="preview-thumbnail ps-1">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="fa-solid fa-right-to-bracket text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1 account-menu-text">Log In</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item flex align-items-center py-1 my-1" href="{{ url('register') }}">
                        <div class="preview-thumbnail ps-1">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="fa-solid fa-file-pen text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1 account-menu-text">Register</p>
                        </div>
                    </a>
                @else
                    <a class="dropdown-item preview-item flex align-items-center py-1 my-1">
                        <div class="preview-thumbnail ps-1">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1 account-menu-text">Settings</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item flex align-items-center py-1 my-1" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <div class="preview-thumbnail ps-1">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="fa-solid fa-right-from-bracket text-danger"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1 account-menu-text">Log Out</p>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
                <div class="dropdown-divider"></div>
            </div>
        </div>
    </nav>
    {{-- Topbar End --}}

    {{-- Main Content Start --}}
    <div class="main-panel m-0 p-0">
        <div class="content-wrapper text-center">
            <div class="container m-5">
                @yield('content')
            </div>
        </div>
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
                            <p class="mb-4 footer-web-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.Lorem
                                ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                            <p class="mb-4 footer-web-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.Lorem
                                ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                            <p class="mb-4 footer-web-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
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
    <script src="{{ asset('template/assets/js/dashboard.js') }}"></script>
    {{-- JS End --}}

    {{-- Plugins JS Start --}}
    <script src="{{ asset('template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/assets/js/misc.js') }}"></script>
    <script src="{{ asset('template/assets/js/settings.js') }}"></script>
    <script src="{{ asset('template/assets/js/todolist.js') }}"></script>
    {{-- Plugins JS End --}}
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/alamat.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
