@extends('layouts.page')

@section('title', 'Landing Page')

@section('content')

    {{-- Opening Start --}}
    <div class="opening" id="home">
        <div class="material">
            <img class="materialtriangle" src="{{ asset('main/opening/triangle.png') }}" alt="">
            <div class="materialred"></div>
            <div class="materialred"></div>
            <div class="materialred"></div>
            <div class="materialblack"></div>
            <div class="materialblack"></div>
        </div>
        <div class="materialstrip1"></div>
        <div class="materialstrip2"></div>
        <div class="materialstrip3"></div>
        <h1>TECH SOLUTION</h1>
        <h6>Modern Problem Need Modern Solution.</h6>
        <div class="text-scroll">
            <i class="fa-solid fa-computer-mouse"></i>
            <span>SCROLL DOWN</span>
        </div>
    </div>
    {{-- Opening End --}}

    {{-- Career Start --}}
    <div class="career" id="career">
        <div class="materialstrip1"></div>
        <div class="materialred1"></div>
        <div class="materialred2"></div>
        <div class="materialred3"></div>
        <div class="materialred4"></div>
        <h1>CAREER</h1>
        <div class="image">
            <img src="{{ asset('main/career/picture.webp') }}" alt="Office Image">
            <span>OFFICE</span>
        </div>
        <div class="description">
            <h6>START YOUR CAREER</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur iure sapiente hic totam laudantium illum
                voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam atque
                mollitia at Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit aut deserunt
                recusandae dolores nesciunt odio possimus beatae, pariatur voluptatum magnam aliquid sed eaque porro
                officiis numquam ipsum laborum quaerat.
            </p>
            <a class="{{ route('career') }}" href=""><span>START</span></a>
        </div>
    </div>
    {{-- Career End --}}

    {{-- About Us Start --}}
    <div class="about-us" id="about-us">
        <div class="materialred1"></div>
        <div class="materialred2"></div>
        <div class="materialstrip1"></div>
        <div class="materialstrip2"></div>
        <h1>ABOUT US</h1>
        <div class="image">
            <img src="{{ asset('main/about/ceo.webp') }}" alt="CEO Image">
            <span>CEO Of TECH SOLUTION</span>
        </div>
        <div class="description">
            <h6>BETTER TECHNOLOGY, BETTER FUTURE</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur iure sapiente hic totam laudantium illum
                voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam atque
                mollitia at Lorem ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit aut deserunt
                recusandae dolores nesciunt odio possimus beatae, pariatur voluptatum magnam aliquid sed eaque porro
                officiis numquam ipsum laborum quaerat.
            </p>
            <a class="" href=""><span>LEARN</span></a>
        </div>
    </div>
    {{-- About Us End --}}

    {{-- Product Start --}}
    <div class="product-introduction" id="product">
        <div class="materialstrip1"></div>
        <div class="materialstrip2"></div>
        <div class="materialred1"></div>
        <div class="materialred2"></div>
        <div class="materialred3"></div>
        <h1>OUR PRODUCTS</h1>
    </div>
    <div class="product-banner">
        <h1>SMART HOME</h1>
        <p>For Smart Owner</p>
        <a class="btn btn-dark" href="#">More</a>
    </div>
    <div class="product">
        <div class="materialstrip1"></div>
        <div class="materialblack1"></div>
        <div class="materialblack2"></div>
        <div class="model-m">
            <img src="{{ asset('main/product/model-m.webp') }}" alt="Product Smart Speak Model M">
            <div class="description">
                <h1>Smart Speak Model M</h1>
                <p>Control Your House Only With Your Mouth.</p>
                <span>$1,999</span>
                <a href="#"><span>BUY NOW</span></a>
            </div>
        </div>
        <div class="model-s">
            <img src="{{ asset('main/product/model-s.webp') }}" alt="Product Smart Speak Model M">
            <div class="description">
                <h1>Smart Speak Model S</h1>
                <p>Control Your House Only With Phone.</p>
                <span>$2,999</span>
                <a href="#"><span>BUY NOW</span></a>
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
