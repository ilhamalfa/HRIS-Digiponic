@extends('layouts.page')

@section('title', 'Landing Page')

@section('content')

    {{-- Opening Start --}}
    <div class="opening" id="home">
        <h1 class="opening-title" id="opening-title">TECH SOLUTION</h1>
        <h6 class="opening-slogan" id="opening-slogan">Modern Problem Need Modern Solution.</h6>
        <div class="opening-text-scroll">
            <i class="fa-solid fa-computer-mouse"></i>
            <span>SCROLL DOWN</span>
        </div>
    </div>
    {{-- Opening End --}}

    {{-- Career Start --}}
    <div class="career col-lg-12 grid-margin stretch-card" id="career">
        <div class="card">
            <div class="card-body row">
                <div class="career-image-box col-6">
                    <img class="career-image" src="{{ asset('main/career/picture.webp') }}" alt="Office Image">
                </div>
                <div class="career-text-box col-6 text-end">
                    <h1 class="card-title career-card-title">CAREER</h1>
                    <h6 class="career-card-tagline">START YOUR CAREER</h6>
                    <p class="career-card-description ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur
                        iure sapiente
                        hic totam laudantium illum
                        voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam
                        atque
                        mollitia at Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit aut deserunt
                        recusandae dolores nesciunt odio possimus beatae, pariatur voluptatum magnam aliquid sed eaque porro
                        officiis numquam ipsum laborum quaerat.
                    </p>
                </div>
                <div class="col-7"></div>
                <a class="button-animation-red col-4" href="{{ route('career') }}">
                    <span>START</span>
                </a>
            </div>
        </div>
    </div>
    {{-- Career End --}}

    {{-- About Us Start --}}
    <div class="about-us col-lg-12 grid-margin stretch-card" id="about-us">
        <div class="card">
            <div class="card-body row flex-row-reverse">
                <div class="about-us-image-box col-5 text-end">
                    <img class="about-us-image" src="{{ asset('main/about/ceo.webp') }}" alt="CEO Image">
                    <span class="about-us-image-span">CEO Of TECH Solution</span>
                </div>
                <div class="about-us-text-box col-7 text-start">
                    <h1 class="card-title about-us-card-title">ABOUT US</h1>
                    <h6 class="about-us-card-tagline">BETTER TECHNOLOGY, BETTER FUTURE</h6>
                    <p class="about-us-card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Consectetur
                        iure sapiente
                        hic totam laudantium illum
                        voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam
                        atque
                        mollitia at Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit aut deserunt
                        recusandae dolores nesciunt odio possimus beatae, pariatur voluptatum magnam aliquid sed eaque porro
                        officiis numquam ipsum laborum quaerat.
                    </p>
                    <ul>
                        <li class="about-us-list">
                            Technology equipment
                            <i class="fa-solid fa-circle-check"></i>
                        </li>
                        <li class="about-us-list">
                            Smart home
                            <i class="fa-solid fa-circle-check"></i>
                        </li>
                        <li class="about-us-list">
                            Smart bike
                            <i class="fa-solid fa-circle-check"></i>
                        </li>
                        <li class="about-us-list">
                            Smart car
                            <i class="fa-solid fa-circle-check"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-7"></div>
                <a class="button-animation-red col-4" href="#">
                    <span>LEARN</span>
                </a>
            </div>
        </div>
    </div>
    {{-- About Us End --}}

    {{-- Product Start --}}
    <div class="product-introduction" id="product">
        <h1 class="product-introduction-title">OUR PRODUCTS</h1>
    </div>
    <div class="product-banner">
        <h1 class="product-banner-title">SMART HOME</h1>
        <p class="product-banner-description">For Smart Owner</p>
        <a class="btn btn-dark product-banner-button" href="#">More</a>
    </div>
    <div class="product col-lg-12 grid-margin">
        <div class="card bg-black">
            <div class="card-body row">
                <div class="col-5 product-image-box">
                    <img class="product-image" src="{{ asset('main/product/model-m.webp') }}"
                        alt="Product Smart Speak Model M">
                </div>
                <div class="col-7 product-text-box">
                    <h1 class="product-title">Smart Speak Model M</h1>
                    <p class="product-description">Control Your House Only With Your Mouth.</p>
                    <span class="product-price">$1,999</span>
                    <a class="product-button button-animation-white" href="#">
                        <span>BUY NOW</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card bg-black">
            <div class="card-body row">
                <div class="col-5 product-image-box">
                    <img class="product-image" src="{{ asset('main/product/model-s.webp') }}"
                        alt="Product Smart Speak Model S">
                </div>
                <div class="col-7 product-text-box">
                    <h1 class="product-title">Smart Speak Model S</h1>
                    <p class="product-description">Control Your House Only With Phone.</p>
                    <span class="product-price">$2,999</span>
                    <a class="product-button button-animation-white" href="#">
                        <span>BUY NOW</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Product End --}}

    {{-- Comment Start --}}
    <div class="comment carousel slide" id="carouselExampleAutoplaying" data-bs-ride="carousel">
        <span class="comment-title">COMMENTS</span>
        <div class="carousel-inner">
            <div class="carousel-item active comment-carrousel-user">
                <div class="comment-carrousel-user-picture-box">
                    <img class="comment-carrousel-user-picture" src="{{ asset('main/comment/profile/profile-1.webp') }}"
                        alt="User Picture">
                </div>
                <span class="comment-carrousel-user-name">Kayle Runner</span>
                <p class="comment-carrousel-user-comment"><i class="fa-solid fa-quote-left"></i> Lorem ipsum dolor sit
                    amet consectetur adipisicing elit. Fugit
                    explicabo placeat accusamus soluta? Quae
                    minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim.
                    Assumenda,
                    facilis! <i class="fa-solid fa-quote-right"></i></p>
            </div>
            <div class="carousel-item comment-carrousel-user">
                <div class="comment-carrousel-user-picture-box">
                    <img class="comment-carrousel-user-picture" src="{{ asset('main/comment/profile/profile-2.webp') }}"
                        alt="User Picture">
                </div>
                <span class="comment-carrousel-user-name">Alex Kile</span>
                <p class="comment-carrousel-user-comment"><i class="fa-solid fa-quote-left"></i> Lorem ipsum dolor sit
                    amet consectetur adipisicing elit. Fugit
                    explicabo placeat accusamus soluta? Quae
                    minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim.
                    Assumenda,
                    facilis! <i class="fa-solid fa-quote-right"></i></p>
            </div>
            <div class="carousel-item comment-carrousel-user">
                <div class="comment-carrousel-user-picture-box">
                    <img class="comment-carrousel-user-picture" src="{{ asset('main/comment/profile/profile-3.webp') }}"
                        alt="User Picture">
                </div>
                <span class="comment-carrousel-user-name">Mishele Joan</span>
                <p class="comment-carrousel-user-comment"><i class="fa-solid fa-quote-left"></i> Lorem ipsum dolor sit
                    amet consectetur adipisicing elit. Fugit
                    explicabo placeat accusamus soluta? Quae
                    minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim.
                    Assumenda,
                    facilis! <i class="fa-solid fa-quote-right"></i></p>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon opacity-0" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon opacity-0" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- Comment End --}}

    {{-- Team Start --}}
    <div class="team col-lg-12 grid-margin" id="team">
        <h1 class="team-title">OUR TEAM</h1>
        <div class="team-layout row justify-content-center">
            <div class="card team-card col-2 m-2 p-2">
                <img src="{{ asset('main/team/ceo.webp') }}" class="card-img-top" alt="CEO Image">
                <div class="team-social-media">
                    <span>
                        <i class="fa-brands fa-square-twitter m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-square-facebook m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-square-instagram m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-linkedin m-2"></i>
                    </span>
                </div>
                <div class="card-body team-card-body">
                    <h6 class="card-title team-name">Walter White</h6>
                    <p class="card-text">Chief Executive Officer</p>
                </div>
            </div>
            <div class="card team-card col-2 m-2 p-2">
                <img src="{{ asset('main/team/cto.webp') }}" class="card-img-top" alt="CEO Image">
                <div class="team-social-media">
                    <span>
                        <i class="fa-brands fa-square-twitter m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-square-facebook m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-square-instagram m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-linkedin m-2"></i>
                    </span>
                </div>
                <div class="card-body team-card-body">
                    <h6 class="card-title team-name">Walter White</h6>
                    <p class="card-text">Chief Executive Officer</p>
                </div>
            </div>
            <div class="card team-card col-2 m-2 p-2">
                <img src="{{ asset('main/team/accountant.webp') }}" class="card-img-top" alt="CEO Image">
                <div class="team-social-media">
                    <span>
                        <i class="fa-brands fa-square-twitter m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-square-facebook m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-square-instagram m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-linkedin m-2"></i>
                    </span>
                </div>
                <div class="card-body team-card-body">
                    <h6 class="card-title team-name">Walter White</h6>
                    <p class="card-text">Chief Executive Officer</p>
                </div>
            </div>
            <div class="card team-card col-2 m-2 p-2">
                <img src="{{ asset('main/team/manager.webp') }}" class="card-img-top" alt="CEO Image">
                <div class="team-social-media">
                    <span>
                        <i class="fa-brands fa-square-twitter m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-square-facebook m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-square-instagram m-2"></i>
                    </span>
                    <span>
                        <i class="fa-brands fa-linkedin m-2"></i>
                    </span>
                </div>
                <div class="card-body team-card-body">
                    <h6 class="card-title team-name">Walter White</h6>
                    <p class="card-text">Chief Executive Officer</p>
                </div>
            </div>
        </div>
        <div class="m-5"></div>
        <a href="{{ route('struktur') }}" class="button-animation-red team-button">
            <span>All Structure</span>
        </a>
    </div>
    {{-- Team End --}}

@endsection
