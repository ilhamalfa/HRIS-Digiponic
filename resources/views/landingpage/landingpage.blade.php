@extends('layouts.page')

@section('title', 'Landing Page')

@section('content')

    {{-- Jib Parallax Start --}}
    <div class="jib-parallax">
        <div class="design">
            <div class="designred"></div>
            <div class="designred"></div>
            <div class="designred"></div>
            <div class="designblack"></div>
            <div class="designblack"></div>
        </div>
        <div class="designstrip1"></div>
        <div class="designstrip2"></div>
        <div class="designstrip3"></div>
        <h1>TECH SOLUTION</h1>
        <h6>Modern Problem Need Modern Solution.</h6>
        <div class="text-scroll">
            <i class="fa-solid fa-computer-mouse"></i>
            <span>SCROLL DOWN</span>
        </div>
    </div>
    {{-- Jib Parallax End --}}

    {{-- Career Start --}}
    <div class="career">
        <div class="designstrip1"></div>
        <div class="designred1"></div>
        <div class="designred2"></div>
        <div class="designred3"></div>
        <div class="designred4"></div>
        <h1>CAREER</h1>
        <div class="picture">
            <img src="{{ asset('main/career/picture.jpg') }}" alt="Office Picture">
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
            <a class="" href=""><span>START</span></a>
        </div>
    </div>
    {{-- Career End --}}

    {{-- About Us Start --}}
    <div class="about-us">
        <div class="designstrip1"></div>
        <div class="designstrip2"></div>
        <div class="designred1"></div>
        <div class="designred2"></div>
        <h1>ABOUT US</h1>
        <div class="picture">
            <img src="{{ asset('main/about/ceo.png') }}" alt="Office Picture">
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
    {{-- <div class="product-introduction">
        
    </div>
    <div class="product">

    </div> --}}
    {{-- Product End --}}

    {{-- Comment Start --}}
    <div class="comment">
        <div class="carrousel-comment">
            <div class="user">
                <div class="picture">
                    <img src="{{ asset('main/comment/profile/profile.jpg') }}" alt="User Picture">
                </div>
                <span>Kayle Runner</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit explicabo placeat accusamus soluta? Quae
                    minus id quas veniam odio asperiores quaerat veritatis. Nobis atque modi sunt molestiae enim. Assumenda,
                    facilis!</p>
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

    {{-- <section class="container-fluid p-0">
        <img src="{{ asset('background/background-jumbo-tron.jpg') }}" alt="">
    </section> --}}

    {{-- Promotion Start --}}
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="promotion">
                    <div class="p-header">
                        <i class="fa-solid fa-microchip fa-promotion shadow"></i>
                    </div>
                    <div class="p-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus reprehenderit distinctio provident consequatur velit temporibus nulla perferendis minus, nam repudiandae reiciendis veniam illo numquam tempora, eum voluptatum! Velit, ratione corporis!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="promotion">
                    <div class="p-header">
                        <i class="fa-solid fa-microchip fa-promotion shadow"></i>
                    </div>
                    <div class="p-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus reprehenderit distinctio provident consequatur velit temporibus nulla perferendis minus, nam repudiandae reiciendis veniam illo numquam tempora, eum voluptatum! Velit, ratione corporis!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="promotion">
                    <div class="p-header">
                        <i class="fa-solid fa-microchip fa-promotion shadow"></i>
                    </div>
                    <div class="p-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus reprehenderit distinctio provident consequatur velit temporibus nulla perferendis minus, nam repudiandae reiciendis veniam illo numquam tempora, eum voluptatum! Velit, ratione corporis!</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- Promotion End --}}

    {{-- structur --}}
    <div class="container-fluid">
        <div class="row">
            <h1 class="fs-1 my-5">Our Team</h1>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-lg-5 col-md-10 card border-0 card-hover p-3 shadow mb-4">
                <div class="card-body row text-center">
                    <div class="col-lg-4">
                        <img src="{{ asset('asset/entrepreneur1.jpg') }}" class="rounded-circle" width="130px"
                            height="130px" alt="">
                    </div>
                    <div class="col-lg-8 text-start">
                        <h2 class="fw-bolder text-danger mb-3">Prasada Arif Nurudin</h2>
                        <h3 class="mb-4">Chief Executive Office</h3>
                        <p class="fw-light mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-twitter text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-instagram text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-facebook text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-linkedin text-danger"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-10 card border-0 card-hover p-3 shadow mb-4">
                <div class="card-body row text-center">
                    <div class="col-lg-4">
                        <img src="{{ asset('asset/entrepreneur1.jpg') }}" class="rounded-circle" width="130px"
                            height="130px" alt="">
                    </div>
                    <div class="col-lg-8 text-start">
                        <h2 class="fw-bolder text-danger mb-3">Prasada Arif Nurudin</h2>
                        <h3 class="mb-4">Chief Executive Office</h3>
                        <p class="fw-light mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-twitter text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-instagram text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-facebook text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-linkedin text-danger"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-10 card border-0 card-hover p-3 shadow mb-4">
                <div class="card-body row text-center">
                    <div class="col-lg-4">
                        <img src="{{ asset('asset/entrepreneur1.jpg') }}" class="rounded-circle" width="130px"
                            height="130px" alt="">
                    </div>
                    <div class="col-lg-8 text-start">
                        <h2 class="fw-bolder text-danger mb-3">Prasada Arif Nurudin</h2>
                        <h3 class="mb-4">Chief Executive Office</h3>
                        <p class="fw-light mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-twitter text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-instagram text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-facebook text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-linkedin text-danger"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-10 card border-0 card-hover p-3 shadow mb-4">
                <div class="card-body row text-center">
                    <div class="col-lg-4">
                        <img src="{{ asset('asset/entrepreneur1.jpg') }}" class="rounded-circle" width="130px"
                            height="130px" alt="">
                    </div>
                    <div class="col-lg-8 text-start">
                        <h2 class="fw-bolder text-danger mb-3">Prasada Arif Nurudin</h2>
                        <h3 class="mb-4">Chief Executive Office</h3>
                        <p class="fw-light mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-twitter text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-instagram text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-facebook text-danger"></i>
                        </a>
                        <a href="" class="text-custom mx-2">
                            <i class="fa-brands p-2 fa-linkedin text-danger"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col my-5">
                <a href="{{ route('struktur') }}" class="btn btn btn-danger"><i
                        class="fa-solid fa-people-group me-2"></i>All Team</a>
            </div>
        </div>
    </div>
    {{-- end structur --}}
@endsection
