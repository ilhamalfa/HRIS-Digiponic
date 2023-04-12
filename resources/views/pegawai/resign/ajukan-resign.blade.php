@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Ajukan Resign') }}</div>

                <div class="card-body">
                    <form action="{{ url('pegawai/resign/ajukan-resign/proses') }}" method="POST">
                    @csrf
                        {{-- Tanggal Mulai --}}
                        <div class="row mb-3">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Resign') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="date" class="form-control @error('tanggal_resign') is-invalid @enderror" name="tanggal_resign" value="{{ old('tanggal_resign') }}" required autocomplete="tanggal_resign">

                                @error('tanggal_resign')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
