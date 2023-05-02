@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Your DIgital Signature') }}</div>

                <div class="card-body">
                    <div class="row">
                        @if (isset(Auth::user()->digital_signature))
                        <div class="col">
                            <img class="img bg-white mt-3" src="{{ asset('storage/' . Auth::user()->digital_signature) }}" alt="">
                        </div>
                        @else
                        <div class="col">
                            <h6 class="text-white">(Empty)</h6>
                        </div>
                        @endif
                        <div class="col">
                            <h6>
                                Draw Your Signature
                            </h6>
                            <img src="{{ asset('signature.png') }}" alt="">
                            <div class="wrapper mb-3">
                                <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                            </div>
                            <div>
                                <button id="save">Save</button>
                                <button id="clear">Clear</button>
                            </div>
                            <form action="{{ url('profile/save-signature') }}" method="POST" id="myForm">
                                @csrf
                                <input type="text" name="signature" id="signature" value="" class="form-control" hidden>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection