@extends('layouts.page')

@section('title')

@section('content')
    @isset($datas)
        <p>{{ $datas->posisi }}</p>
        @guest
        <form method="POST" action="{{ url('/pelamar/lowongan/apply/' . $datas->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                <div class="col-md-6">
                    <input id="nama" type="text" class="form-control text-white @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control text-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal lahir') }}</label>

                <div class="col-md-6">
                    <input id="tanggal_lahir" type="date" class="form-control text-white @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">

                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="nomor_hp" class="col-md-4 col-form-label text-md-end">{{ __('Nomor HP') }}</label>

                <div class="col-md-6">
                    <input id="nomor_hp" type="number" class="form-control text-white @error('nomor_hp') is-invalid @enderror" name="nomor_hp" value="{{ old('nomor_hp') }}">

                    @error('nomor_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="cv" class="col-md-4 col-form-label text-md-end">{{ __('CV') }}</label>

                <div class="col-md-6">
                    <input id="cv" type="file" class="form-control text-white @error('cv_file') is-invalid @enderror" name="cv_file" value="{{ old('cv_file') }}">

                    @error('cv_file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Selesai') }}
                    </button>
                </div>
            </div>
        </form>
        @endguest
    @endisset
@endsection