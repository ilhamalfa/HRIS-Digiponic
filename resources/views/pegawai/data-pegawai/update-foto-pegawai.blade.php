@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Input User Pegawai Baru') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img class="img rounded-circle d-block" src="{{ asset('storage/' . Auth::user()->foto) }}" alt="">
                        </div>
                    
                        
                    </div>
                    <form method="POST" action="{{ url('/profile/edit-data-pegawai/update') }}" enctype="multipart/form-data">
                        @csrf

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection