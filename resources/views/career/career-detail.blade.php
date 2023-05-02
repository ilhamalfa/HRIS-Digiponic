@extends('layouts.page')

@section('title', 'Career Detail')

@section('content')
    <div class="carrer-detail">
        <a class="career-back" href="{{ url('/career') }}">
            <i class="fa-solid fa-hand-point-left"></i>
        </a>
        @isset($datas)
            <p class="career-position my-2">
                <span>Job Name : </span>
                <span class="career-span">{{ $datas->posisi }}</span>
            </p>
            <p class="career-deadline-date my-2">
                <span>Deadline Date : </span>
                <span class="career-span">{{ date('d F Y', strtotime($datas->tanggal)) }}</span>
            </p>
            <p class="career-qualification my-2">Qualification : </p>
            <div class="career-qualification-value-box d-flex ms-2">
                <p class="my-2">></p>
                <p class="career-qualification-value my-2 ms-2 text-start">
                    <span>{{ $datas->kualifikasi }}</span>
                </p>
            </div>
            <p class="career-vacancy-description my-2">Description : </p>
            <div class="career-vacancy-value-box d-flex ms-2">
                <p class="my-2">></p>
                <p class="career-description-value my-2 ms-2 text-start">
                    <span>{{ $datas->deskripsi }}</span>
                </p>
            </div>
            @guest
                <div class="career-detail-info-box">
                    <i class="fa-solid fa-circle-info topbar-menu-icon text-info"></i>
                    <p class="career-detail-login-info">You must login to apply job...</p>
                </div>
            @else
                @if (Auth::user()->role == 'Pelamar')
                    <div class="career-detail-info-box">
                        @if ($datas->lamaran()->where('user_id', auth()->user()->id)->exists())
                            <i class="fa-solid fa-circle-check text-success m-2"></i>
                            <p class="career-detail-login-info">You have applied</p>
                        @else
                            <a href="{{ url('/pelamar/lowongan/apply/' . $datas->id) }}" class="btn btn-outline-success">
                                <i class="fa-solid fa-file-circle-plus"></i>
                                <span>Apply</span>
                            </a>
                        @endif
                    </div>
                @endif
            @endguest
        @endisset
    </div>
    @isset($datas)
        <p>{{ $datas->posisi }}</p>
        @guest
            <form method="POST" action="{{ url('/pelamar/lowongan/apply/' . $datas->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                    <div class="col-md-6">
                        <input id="nama" type="text" class="form-control text-white @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama') }}">

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
                        <input id="email" type="email" class="form-control text-white @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}">

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
                        <input id="tanggal_lahir" type="date"
                            class="form-control text-white @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}">

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
                        <input id="nomor_hp" type="number" class="form-control text-white @error('nomor_hp') is-invalid @enderror"
                            name="nomor_hp" value="{{ old('nomor_hp') }}">

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
                        <input id="cv" type="file" class="form-control text-white @error('cv_file') is-invalid @enderror"
                            name="cv_file" value="{{ old('cv_file') }}">

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
