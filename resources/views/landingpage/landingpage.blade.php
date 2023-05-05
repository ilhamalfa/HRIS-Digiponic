@extends('layouts.page')

@section('title', 'Landing Page')

@section('content')

    {{-- Opening Start --}}
    <div class="opening">
        <div class="opening-video-box">
            <video class="opening-video" src="{{ asset('main/opening/video.mp4') }}" autoplay loop muted></video>
        </div>
        <div class="opening-text-box">
            <h1 class="opening-title tx-secondary-color-1 mb-2">TECH Solution</h1>
            <h6 class="opening-slogan tx-secondary-color-1 mb-5">Modern Problem Need Modern Solution</h6>
            <p class="opening-description tx-secondary-color-1 mt-5">
                The technology companies that we offer are companies that focus on developing the latest technology
                solutions to
                help increase the efficiency and productivity of your business. We offer a wide range of services, including
                web
                and mobile application development, IT infrastructure management, web design, system integration and
                security
                technology.
            </p>
        </div>
        <div class="opening-scroll-box">
            <i class="opening-scroll fa-solid fa-computer-mouse tx-secondary-color-1"></i>
            <span class="opening-scroll tx-secondary-color-1">SCROLL DOWN</span>
        </div>
    </div>
    {{-- Opening End --}}

    {{-- About Us Start --}}
    <div class="about">
        <div class="about-background-color"></div>
        <div class="about-video-box">
            <video class="about-video" src="{{ asset('main/about/about.mp4') }}" autoplay loop muted></video>
        </div>
        <div class="about-text-box">
            <h1 class="about-title-1">BETTER <br> TECHNOLOGY,</h1>
            <h1 class="about-title-2">BETTER FUTURE</h1>
            <p class="about-description">We also use the latest <br> technology to ensure that <br> the solutions we offer
                are <br> always up-to-date and can <br> face future challenges well.</p>
            <a class="about-button button-animation-white" href="{{ url('/') }}">
                <span>WATCH VIDEO</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
    </div>
    <div class="about-extra-space"></div>
    {{-- About Us End --}}

    {{-- Product Start --}}
    <div class="product-introduction" id="product">
        <div class="product-introduction-background-color"></div>
        <div class="product-introduction-left-side">
            <h1 class="product-introduction-title tx-secondary-color-1">DISCOVER <br> OUR PRODUCT</h1>
            <img class="product-introduction-project-image" src="{{ asset('main/product/project.webp') }}"
                alt="Project Image">
            <a class="product-introduction-project-link" href="{{ url('/') }}">Our Lastest Project</a>
        </div>
        <div class="product-introduction-text-box">
            <p class="product-introduction-description">
                Our technology product is a software designed to help simplify work processes for companies or individuals.
            </p>
            <a class="product-introduction-button button-animation-black" href="{{ url('/') }}">
                <span>VISIT OUR SHOP</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
        <div class="product-introduction-bg-fade"></div>
    </div>
    <div class="product">
        <div class="product-element-box">
            <img class="product-element-left" src="{{ asset('main/product/element-left.webp') }}" alt="Element Left">
            <img class="product-element-right" src="{{ asset('main/product/element-right.webp') }}" alt="Element Right">
        </div>
        <div class="product-image-box">
            <p class="product-description tx-secondary-color-1">Explore endless possibilities in the Metaverse - where
                imagination meets reality.</p>
            <img class="product-image" src="{{ asset('main/product/metaverse.webp') }}" alt="Product Image">
        </div>
        <div class="product-button-buy-box">
            <a class="product-button button-animation-white" href="{{ url('/') }}">
                <span>BUY NOW</span>
                <i class="icon fa-brands fa-opencart icon"></i>
            </a>
        </div>
        <div class="product-button-watch-box">
            <a class="product-button button-animation-white" href="{{ url('/') }}">
                <span>WATCH VIDEO</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
        <div class="product-bg-fade"></div>
    </div>
    {{-- Product End --}}

    {{-- Team Start --}}
    <div class="team">
        <div class="team-title-box">
            <span class="team-span-1"></span>
            <div class="team-title">OUR TEAM</div>
            <span class="team-span-2"></span>
        </div>
        <div class="team-background-box">
            <h1 class="team-bg-text-1">OUR TEAM</h1>
            <h1 class="team-bg-text-2">OUR TEAM</h1>
            <h1 class="team-bg-text-3">OUR TEAM</h1>
        </div>
        <div class="team-element-box">
            <img class="team-element" src="{{ asset('main/team/element.webp') }}" alt="Team Element">
        </div>
        <div class="team-image-box">
            <a class="team-designer" href="{{ url('/') }}">Designer</a>
            <a class="team-itleader" href="{{ url('/') }}">IT Leader</a>
            <a class="team-marketingmanager" href="{{ url('/') }}">Marketing Manager</a>
            <a class="team-accountant" href="{{ url('/') }}">Accountant</a>
            <a class="team-productmanager" href="{{ url('/') }}">Product Manager</a>
            <img class="team-image" src="{{ asset('main/team/team.webp') }}" alt="Team Image">
        </div>
        <div class="team-bg-fade"></div>
    </div>
    {{-- Team End --}}

    {{-- Career Start --}}
    <div class="career">
        <div class="career-title-box">
            <h1 class="career-title">Come, Join Us</h1>
        </div>
        <div class="career-elementbg-box career-section">
            <img class="career-elementbg" src="{{ asset('main/career/elementbg.webp') }}" alt="Element Bg">
        </div>
        <div class="career-description-box career-section">
            <p class="career-description">Build a career that builds your future, right now!</p>
            <a class="career-button button-animation-white" href="{{ url('/') }}">
                <span>JOIN</span>
                <i class="icon fa-solid fa-arrow-up-right-from-square icon"></i>
            </a>
        </div>
        <div class="career-employee-box">
            <img class="career-employee-image" src="{{ asset('main/career/employee.webp') }}" alt="Employee Image">
        </div>
        <div class="career-element-box">
            <img class="career-element" src="{{ asset('main/career/element.webp') }}" alt="Element">
        </div>
    </div>
    {{-- Career End --}}
@endsection
