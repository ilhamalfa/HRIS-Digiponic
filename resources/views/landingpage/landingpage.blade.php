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
    <div class="career" id="career">
        <div class="career-top">
            <div class="career-image-box">
                <img class="career-image" src="{{ asset('main/career/picture.webp') }}" alt="Office Image">
            </div>
            <div class="career-text-box">
                <h1 class="career-title">CAREER</h1>
                <h6 class="career-tagline">START YOUR CAREER</h6>
                <p class="career-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur
                    iure sapiente
                    hic totam laudantium illum
                    voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam
                    atque
                    mollitia at Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit aut deserunt
                    recusandae dolores nesciunt odio possimus beatae, pariatur voluptatum magnam aliquid sed eaque porro
                    officiis numquam ipsum laborum quaerat.
                </p>
                <a class="button-animation-red career-button-top" href="{{ route('career') }}">
                    <span>START</span>
                </a>
            </div>
        </div>
        <div class="career-bottom">
            <a class="button-animation-red career-button-bottom" href="{{ route('career') }}">
                <span>START</span>
            </a>
        </div>
    </div>
    {{-- Career End --}}

    {{-- About Us Start --}}
    <div class="about-us" id="about-us">
        <div class="about-us-box">
            <div class="about-us-image-box">
                <img class="about-us-image" src="{{ asset('main/about/ceo.webp') }}" alt="CEO Image">
                <span class="about-us-image-span">CEO Of TECH Solution</span>
            </div>
            <div class="about-us-text-box">
                <h1 class="about-us-title">ABOUT US</h1>
                <h6 class="about-us-tagline">BETTER TECHNOLOGY, BETTER FUTURE</h6>
                <p class="about-us-description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consectetur
                    iure sapiente
                    hic totam laudantium illum
                    voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam
                    atque
                    mollitia at Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit aut deserunt
                    recusandae dolores nesciunt odio possimus beatae, pariatur voluptatum magnam aliquid sed eaque porro
                    officiis numquam ipsum laborum quaerat.
                </p>
                <ul class="about-us-ul">
                    <li class="about-us-list my-2">
                        Technology equipment
                        <i class="fa-solid fa-circle-check"></i>
                    </li>
                    <li class="about-us-list my-2">
                        Smart home
                        <i class="fa-solid fa-circle-check"></i>
                    </li>
                    <li class="about-us-list my-2">
                        Smart bike
                        <i class="fa-solid fa-circle-check"></i>
                    </li>
                    <li class="about-us-list my-2">
                        Smart car
                        <i class="fa-solid fa-circle-check"></i>
                    </li>
                </ul>
                <a class="button-animation-red about-us-button-top" href="#">
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
    <div class="product">
        <div class="product-box">
            <div class="product-image-box">
                <img class="product-image" src="{{ asset('main/product/model-m.webp') }}" alt="Product Smart Speak Model M">
            </div>
            <div class="product-text-box">
                <h1 class="product-title">Smart Speak Model M</h1>
                <p class="product-description">Control Your House Only With Your Mouth.</p>
                <span class="product-price">$1,999</span>
                <a class="product-button button-animation-white" href="#">
                    <span>BUY NOW</span>
                </a>
            </div>
        </div>
        <div class="product-box">
            <div class="product-image-box">
                <img class="product-image" src="{{ asset('main/product/model-s.webp') }}" alt="Product Smart Speak Model S">
            </div>
            <div class="product-text-box">
                <h1 class="product-title">Smart Speak Model S</h1>
                <p class="product-description">Control Your House Only With Phone.</p>
                <span class="product-price">$2,999</span>
                <a class="product-button button-animation-white" href="#">
                    <span>BUY NOW</span>
                </a>
            </div>
        </div>
    </div>
    {{-- Product End --}}

    {{-- Comment Start --}}
    <div id="carouselExampleRide" class="carousel slide comment" data-bs-ride="true">
        <h1 class="comment-title">COMMENTS</h1>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="comment-carrousel-user-picture-box">
                    <img class="comment-carrousel-user-picture" src="{{ asset('main/comment/profile/profile-1.webp') }}"
                        alt="User Picture">
                </div>
                <p>Kayle Runner</p>
                <div class="comment-carrousel-user-comment-box">
                    <p class="comment-carrousel-user-comment">
                        <i class="fa-solid fa-quote-left"></i>
                        Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Fugit
                        explicabo placeat accusamus soluta? Quae
                        minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim.
                        Assumenda,
                        facilis!
                        <i class="fa-solid fa-quote-right"></i>
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="comment-carrousel-user-picture-box">
                    <img class="comment-carrousel-user-picture" src="{{ asset('main/comment/profile/profile-2.webp') }}"
                        alt="User Picture">
                </div>
                <p>Alex Kile</p>
                <div class="comment-carrousel-user-comment-box">
                    <p class="comment-carrousel-user-comment">
                        <i class="fa-solid fa-quote-left"></i>
                        Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Fugit
                        explicabo placeat accusamus soluta? Quae
                        minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim.
                        Assumenda,
                        facilis!
                        <i class="fa-solid fa-quote-right"></i>
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="comment-carrousel-user-picture-box">
                    <img class="comment-carrousel-user-picture" src="{{ asset('main/comment/profile/profile-3.webp') }}"
                        alt="User Picture">
                </div>
                <p>Mishele Joan</p>
                <div class="comment-carrousel-user-comment-box">
                    <p class="comment-carrousel-user-comment">
                        <i class="fa-solid fa-quote-left"></i>
                        Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Fugit
                        explicabo placeat accusamus soluta? Quae
                        minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim.
                        Assumenda,
                        facilis!
                        <i class="fa-solid fa-quote-right"></i>
                    </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- Comment End --}}

    {{-- Team Start --}}
    <div class="team" id="team">
        <h1 class="team-title">OUR TEAM</h1>
        <div class="team-layout">
            <div class="card team-card">
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
            <div class="card team-card">
                <img src="{{ asset('main/team/cto.webp') }}" class="card-img-top" alt="CTO Image">
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
                    <h6 class="card-title team-name">William Anderson</h6>
                    <p class="card-text">CTO</p>
                </div>
            </div>
            <div class="card team-card">
                <img src="{{ asset('main/team/accountant.webp') }}" class="card-img-top" alt="Accountant Image">
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
                    <h6 class="card-title team-name">Sarah Jhonson</h6>
                    <p class="card-text">Accountant</p>
                </div>
            </div>
            <div class="card team-card">
                <img src="{{ asset('main/team/manager.webp') }}" class="card-img-top" alt="Production Manager Image">
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
                    <h6 class="card-title team-name">Amanda Jepson</h6>
                    <p class="card-text">Production Manager</p>
                </div>
            </div>
        </div>
        <div class="m-5"></div>
        <a href="{{ route('struktur') }}" class="button-animation-white team-button">
            <span>All Structure</span>
        </a>
    </div>
    {{-- Team End --}}

@endsection
