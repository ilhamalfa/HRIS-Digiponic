<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('preloader/style.css') }}">
    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- Bootstrap CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('layout/css/style.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div id="cssload-loader">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    {{-- Modal Mobile Start --}}
    <div class="modal-mobile" id="modal-mobile">
        <div class="modal-menu">
            <a class="btn btn-outline-secondary rounded-pill px-5 m-3" href="login?person=1">Login as Employee</a>
            <a class="btn btn-outline-secondary rounded-pill px-5 m-3" href="login?person=2">Login as Candidate</a>
        </div>
    </div>
    {{-- Modal Mobile End --}}

    {{-- Nav Topbar Start --}}
    <nav class="topbar">
        <a href="#">
            {{-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top">
            Bootstrap --}}
            <i data-feather="activity">1</i>
        </a>
        <a href="#" id="hamburger-menu">
            <i data-feather="menu">1</i>
        </a>
        @if (Auth::user())
            <a href="">
                <i data-feather="search">1</i>
                <span>Search</span>
            </a>
            <a href="">
                <i data-feather="home">1</i>
                <span>Home</span>
            </a>
            <a href="">
                <i data-feather="mail">1</i>
                <span>Mail</span>
            </a>
        @endif
        @guest
            @if (Route::has('login') && Route::has('register'))
                <a class="text-light" href="#" data-bs-toggle="modal" data-bs-target="#login">
                    <i class="fa-solid fa-house"></i>
                    <span>Login</span>
                </a>
                <a class="text-light" href="{{ route('register') }}">
                    <i class="fa-regular fa-house"></i>
                    <span>Register</span>
                </a>
                <a href="">
                    <i data-feather="mail">1</i>
                    <span>Carrier</span>
                </a>
                <a href="">
                    <i data-feather="mail">1</i>
                    <span>About</span>
                </a>
                <a href="">
                    <i data-feather="mail">1</i>
                    <span>Structure</span>
                </a>
                <a href="">
                    <i data-feather="mail">1</i>
                    <span>Mail</span>
                </a>
            @endif
        @else
            <a class="text-light m-3" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i data-feather="log-out">1</i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </nav>
    {{-- Nav Topbar End --}}

    {{-- Nav Sidebar Start --}}
    <nav class="sidebar bg-black py-5 bg-opacity-80" id="sidebar">
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

    <footer class="footer">
        @if (Request::is('/'))
            <div class="start-footer mb-3">
                <div class="row text-center justify-content-center">
                    <div class="col-lg-8">
                        <div class="logo">
                            <img src="" alt="">
                        </div>
                        <div class="text-footer">
                            <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                            <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                            <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, quam
                                exercitationem neque adipisci, sint deserunt reprehenderit illum, aut doloremque aliquid
                                corporis repellat ducimus at quisquam molestiae commodi tempore assumenda atque.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-2 col-sm-4">
                        <i class="fs-1 fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <i class="fs-1 fa-brands fa-instagram"></i>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <i class="fs-1 fa-brands fa-twitter"></i>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <i class="fs-1 fa-brands fa-tiktok"></i>
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

    {{-- Modal Login --}}
    <div class="modal fade" id="login" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div><a href="login?person=1" class="btn btn-primary py-2 px-4">Login as Employee</a>
                    </div>
                    <div><a href="login?person=2" class="btn btn-danger py-2 px-4">Login as Candidate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- sweetAlert --}}
    @include('sweetalert::alert')
    {{-- JS --}}
    <script src="{{ asset('layout/js/script.js') }}"></script>

    {{-- Feather Icons --}}
    <script>
        feather.replace()
    </script>
</body>

</html>
