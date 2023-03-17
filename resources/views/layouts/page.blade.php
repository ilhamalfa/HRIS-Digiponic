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
            <a class="text-light m-3" href="">
                <i data-feather="search">1</i>
                <span>Search</span>
            </a>
            <a class="text-light m-3" href="">
                <i data-feather="home">1</i>
                <span>Home</span>
            </a>
            <a class="text-light m-3" href="">
                <i data-feather="mail">1</i>
                <span>Mail</span>
            </a>
        @endif
        @guest
            @if (Route::has('login') && Route::has('register'))
                <a class="text-light m-3" href="{{ route('login') }}">
                    <i class="fa-solid fa-house m-2"></i>
                    <span>Login</span>
                </a>
                <a class="text-light m-3" href="{{ route('register') }}">
                    <i data-feather="file-text">1</i>
                    <span>Register</span>
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
    {{-- Nav Sidebar End --}}

    {{-- Main Start --}}
    <main>
        @yield('content')
    </main>
    {{-- Main End --}}

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
