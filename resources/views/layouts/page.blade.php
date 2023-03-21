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

    {{-- Preloader CSS --}}
    <link rel="stylesheet" href="{{ asset('preloader/style.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Bootstrap CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('layout/css/style.css') }}">
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

    {{-- Modal Mobile Start --}}
    <div class="modal-mobile" id="modal-mobile">
        <div class="modal-menu">
            <a class="btn rounded-pill py-3 px-5" href="login?person=1">Login as Employee</a>
            <a class="btn rounded-pill py-3 px-5" href="login?person=2">Login as Candidate</a>
        </div>
    </div>
    {{-- Modal Mobile End --}}

    {{-- Nav Topbar Start --}}
    <nav class="topbar bg-black">
        <a href="#">
            <img src="{{ asset('logo/brand-logo.png') }}" alt="Brand Logo">
        </a>
        <a href="#" id="hamburger-menu">
            <i class="fa-solid fa-bars fa-2x"></i>
        </a>
    </nav>
    {{-- Nav Topbar End --}}

    {{-- Nav Sidebar Start --}}
    <nav class="sidebar bg-black" id="sidebar">
        <a href="#">
            <img src="{{ asset('logo/brand-logo.png') }}" alt="Brand Logo">
        </a>
        @if (Auth::user())
            <a class="text-light" href="">
                <i class="fa-solid fa-magnifying-glass m-2"></i>
                <span>Search</span>
            </a>
            <a class="text-light" href="">
                <i class="fa-solid fa-house m-2"></i>
                <span>Home</span>
            </a>
        @endif
        @guest
            @if (Route::has('login') && Route::has('register'))
                <a class="text-light" href="#" id="login-mobile">
                    <i class="fa-solid fa-right-to-bracket m-2"></i>
                    <span>Login</span>
                </a>
                <a class="text-light" href="{{ route('register') }}">
                    <i class="fa-solid fa-file-pen m-2"></i>
                    <span>Register</span>
                </a>
                <a class="text-light" href="">
                    <i class="fa-solid fa-circle-info m-2"></i>
                    <span>About</span>
                </a>
                <a class="text-light" href="">
                    <i class="fa-solid fa-people-group m-2"></i>
                    <span>Structure</span>
                </a>
                <a class="text-light" href="">
                    <i class="fa-solid fa-envelope m-2"></i>
                    <span>Mail</span>
                </a>
            @endif
        @else
            <a class="text-light" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket m-2"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </nav>
    {{-- Nav Sidebar End --}}

    {{-- Main Start --}}
    <main>
        @yield('content')
    </main>
    {{-- Main End --}}

    {{-- Footer Start --}}
    <footer class="footer bg-dark text-white p-5">
        @if (Request::is('/'))
            <div class="start-footer">
                <div class="row text-center justify-content-center">
                    <div class="p-2">
                        <div class="logo m-3">
                            <img src="{{ asset('logo/brand-logo.png') }}" alt="Brand Logo">
                        </div>
                        <div class="text-footer m-5 px-5">
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
                <div class="social-media m-5">
                    <div>
                        <a href="#">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <div class="end-footer">
            <div class="row text-center">
                <div class="col">
                    &copy; Copyright 2023 Digiponic | Maju Solid | Allright Reserved
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

    {{-- JS --}}
    <script src="{{ asset('layout/js/script.js') }}"></script>
</body>

</html>
