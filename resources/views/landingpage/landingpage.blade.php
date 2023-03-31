@extends('layouts.page')

@section('title', 'Landing Page')

@section('content')

    {{-- Opening Start --}}
    <div class="opening" id="home">
        <div class="opening-material">
            <img class="opening-material-triangle" src="{{ asset('main/opening/triangle.png') }}" alt="">
            <div class="opening-material-red"></div>
            <div class="opening-material-red"></div>
            <div class="opening-material-red"></div>
            <div class="opening-material-black"></div>
            <div class="opening-material-black"></div>
        </div>
        <div class="opening-material-strip-1"></div>
        <div class="opening-material-strip-2"></div>
        <div class="opening-material-strip-3"></div>
        <h1 class="opening-title" id="opening-title">TECH SOLUTION</h1>
        <h6 class="opening-slogan" id="opening-slogan">Modern Problem Need Modern Solution.</h6>
        <div class="opening-text-scroll">
            <i class="fa-solid fa-computer-mouse"></i>
            <span>SCROLL DOWN</span>
        </div>
    </div>
    {{-- Opening End --}}

    {{-- Career Start --}}
    <div class="career">
        <div class="career-material-strip-1"></div>
        <div class="career-material-red-1"></div>
        <div class="career-material-red-2"></div>
        <div class="career-material-red-3"></div>
        <div class="career-material-red-4"></div>
        <h1 class="career-title">CAREER</h1>
        <div class="career-image-box">
            <img class="career-image" src="{{ asset('main/career/picture.webp') }}" alt="Office Image">
            <span class="career-image-span">OFFICE</span>
        </div>
        <div class="career-description-box">
            <h6 class="career-description-title">START YOUR CAREER</h6>
            <p class="career-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur iure sapiente hic totam laudantium illum
                voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam atque
                mollitia at Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit aut deserunt
                recusandae dolores nesciunt odio possimus beatae, pariatur voluptatum magnam aliquid sed eaque porro
                officiis numquam ipsum laborum quaerat.
            </p>
            <a class="career-description-button" href="{{ route('career') }}"><span class="career-button-span">START</span></a>
        </div>
    </div>
    {{-- Career End --}}

    {{-- About Us Start --}}
    <div class="about-us" id="about-us">
        <div class="about-us-material-red-1"></div>
        <div class="about-us-material-red-2"></div>
        <div class="about-us-material-strip-1"></div>
        <div class="about-us-material-strip-2"></div>
        <h1 class="about-us-title">ABOUT US</h1>
        <div class="about-us-image-box">
            <img class="about-us-image" src="{{ asset('main/about/ceo.webp') }}" alt="CEO Image">
            <span class="about-us-image-span">CEO Of TECH SOLUTION</span>
        </div>
        <div class="about-us-description-box">
            <h6 class="about-us-description-title">BETTER TECHNOLOGY, BETTER FUTURE</h6>
            <p class="about-us-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur iure sapiente hic totam laudantium illum
                voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam atque
                mollitia at Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit aut deserunt
                recusandae dolores nesciunt odio possimus beatae, pariatur voluptatum magnam aliquid sed eaque porro
                officiis numquam ipsum laborum quaerat.
            </p>
            <a class="about-us-description-button" href="#"><span class="about-us-description-button-span">LEARN</span></a>
        </div>
    </div>
    {{-- About Us End --}}

    {{-- Product Start --}}
    <div class="product-introduction" id="product">
        <div class="product-introduction-material-strip-1"></div>
        <div class="product-introduction-material-strip-2"></div>
        <div class="product-introduction-material-red-1"></div>
        <div class="product-introduction-material-red-2"></div>
        <div class="product-introduction-material-red-3"></div>
        <h1 class="product-introduction-title">OUR PRODUCTS</h1>
    </div>
    <div class="product-banner">
        <h1 class="product-banner-title">SMART HOME</h1>
        <p class="product-banner-description">For Smart Owner</p>
        <a class="btn btn-dark product-banner-button" href="#">More</a>
    </div>
    <div class="product">
        <div class="product-material-strip-1"></div>
        <div class="product-material-black-1"></div>
        <div class="product-material-black-2"></div>
        <div class="product-model-m">
            <img class="product-model-m-image" src="{{ asset('main/product/model-m.webp') }}" alt="Product Smart Speak Model M">
            <div class="product-model-m-description-box">
                <h1 class="product-model-m-title">Smart Speak Model M</h1>
                <p class="product-model-m-description">Control Your House Only With Your Mouth.</p>
                <span class="product-model-m-price">$1,999</span>
                <a class="product-model-m-button" href="#"><span class="product-model-m-button-span">BUY NOW</span></a>
            </div>
        </div>
        <div class="product-model-s">
            <img class="product-model-s-image" src="{{ asset('main/product/model-s.webp') }}" alt="Product Smart Speak Model S">
            <div class="product-model-s-description-box">
                <h1 class="product-model-s-title">Smart Speak Model S</h1>
                <p class="product-model-s-description">Control Your House Only With Phone.</p>
                <span class="product-model-s-price">$2,999</span>
                <a class="product-model-s-button" href="#"><span>BUY NOW</span></a>
            </div>
        </div>
    </div>
    {{-- Product End --}}

    {{-- Comment Start --}}
    <div class="comment">
        <div class="designstrip1"></div>
        <div class="designstrip2"></div>
        <div class="designred1"></div>
        <div class="designred2"></div>
        <div class="animations1">
            <div class="designwhite1"></div>
            <div class="designwhite2"></div>
            <div class="designwhite3"></div>
        </div>
        <div class="animations2">
            <div class="designwhite4"></div>
            <div class="designwhite5"></div>
            <div class="designwhite6"></div>
        </div>
        <span class="title">COMMENTS</span>
        <div class="carrousel-comment">
            <div class="user">
                <div class="picture">
                    <img src="{{ asset('main/comment/profile/profile.webp') }}" alt="User Picture">
                </div>
                <span>Kayle Runner</span>
                <p><i class="fa-solid fa-quote-left"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit
                    explicabo placeat accusamus soluta? Quae
                    minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim. Assumenda,
                    facilis! <i class="fa-solid fa-quote-right"></i></p>
            </div>
            {{-- <div class="user">
                <img src="" alt="">
                <span>Kayle Runner</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit explicabo placeat accusamus soluta? Quae
                    minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim. Assumenda,
                    facilis!</p>
            </div> --}}
        </div>
        <div class="dots">
            <span></span>
            <span></span>
        </div>
    </div>
    {{-- Comment End --}}

    {{-- Team Start --}}
    <div class="team" id="structure">
        <div class="materialstrip1"></div>
        <div class="materialstrip2"></div>
        <div class="materialred1"></div>
        <div class="materialred2"></div>
        <h1>OUR TEAM</h1>
        <div class="layout-team">
            <div class="card">
                <img src="{{ asset('main/team/ceo.webp') }}" class="card-img-top" alt="CEO Image">
                <div class="social-media">
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
                <div class="card-body">
                    <h6 class="card-title">Walter White</h6>
                    <p class="card-text">Chief Executive Officer</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('main/team/cto.webp') }}" class="card-img-top" alt="CEO Image">
                <div class="social-media">
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
                <div class="card-body">
                    <h6 class="card-title">William Anderson</h6>
                    <p class="card-text">CTO</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('main/team/accountant.webp') }}" class="card-img-top" alt="CEO Image">
                <div class="social-media">
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
                <div class="card-body">
                    <h6 class="card-title">Amanda Jepson</h6>
                    <p class="card-text">Accountant</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('main/team/manager.webp') }}" class="card-img-top" alt="CEO Image">
                <div class="social-media">
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
                <div class="card-body">
                    <h6 class="card-title">Sarah Jhonson</h6>
                    <p class="card-text">Product Manager</p>
                </div>
            </div>
        </div>
        <a href="{{ route('struktur') }}" class="btn btn-danger mt-4">All Structur</a>
    </div>
    {{-- Team End --}}

@endsection
