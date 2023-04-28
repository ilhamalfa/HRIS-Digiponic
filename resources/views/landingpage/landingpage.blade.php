@extends('layouts.page')

@section('title', 'Landing Page')

@section('content')

    {{-- Opening Start --}}
    <div class="opening">
        <div class="video-box">
            <video class="video" src="{{ asset('main/opening/video.mp4') }}" autoplay loop muted></video>
        </div>
        <div class="text-box">
            <h1 class="title tx-secondary-color-1 mb-2">TECH Solution</h1>
            <h6 class="slogan tx-secondary-color-1 mb-5">Modern Problem Need Modern Solution</h6>
            <p class="description tx-secondary-color-1 mt-5">
                The technology companies that we offer are companies that focus on developing the latest technology solutions to
                help increase the efficiency and productivity of your business. We offer a wide range of services, including web
                and mobile application development, IT infrastructure management, web design, system integration and security
                technology.
            </p>
        </div>
        <div class="scroll-box">
            <i class="scroll fa-solid fa-computer-mouse tx-secondary-color-1"></i>
            <span class="scroll tx-secondary-color-1">SCROLL DOWN</span>
        </div>
    </div>
    {{-- Opening End --}}

    {{-- About Us Start --}}
    <div class="about">
        <div class="background-image">
            <img class="image" src="{{ asset('main/about/background.webp') }}" alt="">
        </div>
        <div class="video-box">
            <video class="video" src="{{ asset('main/about/about.mp4') }}" autoplay loop muted></video>
        </div>
        <div class="text-box">
            <h1 class="title-1">BETTER <br> TECHNOLOGY,</h1>
            <h1 class="title-2">BETTER FUTURE</h1>
            <p class="description">We also use the latest <br> technology to ensure that <br> the solutions we offer are <br> always up-to-date and can <br> face future challenges well.</p>
            <a class="button-animation-white button" href="">
                <span>WATCH VIDEO</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
    </div>
    {{-- About Us End --}}

    <div class="about-extra-space"></div>

    {{-- Product Start --}}
    <div class="product-introduction" id="product">
        <div class="background-box">
            <img class="background" src="{{ asset('main/product/background.webp') }}" alt="...">
        </div>
        <h1 class="title tx-secondary-color-1">
            <span>DISCOVER</span>
            <span>OUR PRODUCT</span>
        </h1>
        <div class="text">
            <p class="description">
                Our technology product is a software designed to help simplify work processes for companies or individuals.
            </p>
            <a class="button-animation-black" href="">
                <span>VISIT OUR SHOP</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
        <div class="image-box">
            <img class="project-image" src="{{ asset('main/product/project.webp') }}" alt="Project Image">
            <a class="project-link" href="{{ url('/') }}">Our Lastest Project</a>
        </div>
    </div>
    <div class="product">
        <div class="background-box">
            <img class="background" src="{{ asset('main/product/element.webp') }}" alt="...">
        </div>
        <div class="image-box">
            <p class="description tx-secondary-color-1">Explore endless possibilities in the Metaverse - where imagination meets reality.</p>
            <img class="image" src="{{ asset('main/product/metaverse.webp') }}" alt="Product Image">
        </div>
        <div class="button-buy-box">
            <a class="button-animation-white" href="">
                <span>BUY NOW</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
        <div class="button-watch-box">
            <a class="button-animation-white" href="">
                <span>WATCH VIDEO</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
    </div>
    {{-- Product End --}}

    {{-- Team Start --}}
    <div class="team">
        <div class="title-box">
            <span></span>
            <div class="title">OUR TEAM</div>
            <span></span>
        </div>
        <div class="background-box">
            <h1 class="bg-text-1">OUR TEAM</h1>
            <h1 class="bg-text-2">OUR TEAM</h1>
            <h1 class="bg-text-3">OUR TEAM</h1>
        </div>
        <div class="element-box">
            <img class="element" src="{{ asset('main/team/element.webp') }}" alt="...">
        </div>
        <div class="team-image-box">
            <a class="designer" href="{{ url('/') }}">Designer</a>
            <a class="itleader" href="{{ url('/') }}">IT Leader</a>
            <a class="marketingmanager" href="{{ url('/') }}">Marketing Manager</a>
            <a class="accountant" href="{{ url('/') }}">Accountant</a>
            <a class="productmanager" href="{{ url('/') }}">Product Manager</a>
            <img class="team-image" src="{{ asset('main/team/team.webp') }}" alt="Team Image">
        </div>
    </div>
    {{-- Team End --}}

    {{-- Career Start --}}
    <div class="career">
        <div class="title-box">
            <h1 class="title">Come, Join Us</h1>
        </div>
        <div class="elementbg-box section">
            <img class="elementbg" src="{{ asset('main/career/elementbg.webp') }}" alt="Element Bg">
        </div>
        <div class="description-box section">
            <p class="description">Build a career that builds your future, right now!</p>
            <a class="button-animation-white" href="{{ url('/') }}">
                <span>JOIN</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
        <div class="employee-box">
            <img class="employee-image" src="{{ asset('main/career/employee.webp') }}" alt="Employee Image">
        </div>
        <div class="element-box">
            <img class="element" src="{{ asset('main/career/element.webp') }}" alt="...">
        </div>
    </div>
    {{-- Career End --}}
@endsection
