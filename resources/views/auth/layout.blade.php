<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Icon Head Start --}}
    <link rel="icon" href="{{ asset('logo/brand-logo-red.webp') }}">
    {{-- Icon Head End --}}

    {{-- Google Fonts Start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,300&display=swap"
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

    {{-- Layout CSS Start --}}
    <link rel="stylesheet" href="{{ asset('layout/auth/css/style.css') }}">
    {{-- Layout CSS End --}}
    
</head>

<body>

    {{-- Preloader Start --}}
    <div class="preloader">
        <img class="preloader-image" src="{{ asset('preloader/loadpage.gif') }}" alt="Loader">
    </div>
    {{-- Preloader End --}}

    {{-- Image Background Start --}}
    <div class="container-fluid p-0 background-image-box">
        <img class="background-image" src="{{ asset('auth/background/background-auth.jpg') }}" alt="Background Image">
    </div>
    {{-- Image Background End --}}

    {{-- Main Start --}}
    <main class="main">
        @yield('content')
    </main>
    {{-- Main End --}}

    {{-- Bootstrap JS CDN Start --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    {{-- Bootstrap JS CDN End --}}

    {{-- JQuery Start --}}
    <script src="{{ asset('layout/jquery/jquery-3.6.4.min.js') }}"></script>
    {{-- JQuery End --}}

    {{-- JS Start --}}
    <script src="{{ asset('layout/auth/js/script.js') }}"></script>
    {{-- JS End --}}

</body>

</html>
