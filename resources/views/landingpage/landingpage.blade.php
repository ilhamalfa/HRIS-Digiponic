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

    <div class="content">
        <div class="designstrip1"></div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur iure sapiente hic totam laudantium illum
            voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam atque mollitia
            at.</p>
    </div>

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
            <div class="col-lg-5 col-md-10 card border-0 p-3 shadow mb-3">
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
            <div class="col-lg-5 col-md-10 card border-0 p-3 shadow mb-3">
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
            <div class="col-lg-5 col-md-10 card border-0 p-3 shadow mb-3">
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
            <div class="col-lg-5 col-md-10 card border-0 p-3 shadow mb-3">
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
                <a href="{{ route('struktur') }}" class="btn btn-sm btn-primary">All Structur -></a>
            </div>
        </div>
    </div>
    {{-- end structur --}}
@endsection
