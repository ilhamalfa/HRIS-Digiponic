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
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur iure sapiente hic totam laudantium illum voluptates explicabo itaque dolorem, adipisci dolores officia fuga odio dignissimos odit! Aliquam atque mollitia at.</p>
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
    {{-- <div class="container-fluid">
        <div class="row">
            
        </div>
    </div> --}}
    {{-- end structur --}}
@endsection
