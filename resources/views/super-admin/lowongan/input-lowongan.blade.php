@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input Lowongan Kerja Baru') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('data-lowongan/store-lowongan') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="Posisi" class="col-md-4 col-form-label text-md-end">{{ __('Posisi') }}</label>

                            <div class="col-md-6">
                                <input id="posisi" type="text" class="form-control @error('posisi') is-invalid @enderror" name="posisi" value="{{ old('posisi') }}" required autocomplete="posisi">

                                @error('posisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ ('Tanggal Deadline') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" required autocomplete="tanggal">

                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kualifikasi" class="col-md-4 col-form-label text-md-end">{{ __('Kualifikasi') }}</label>

                            <div class="col-md-6">
                                <input id="kualifikasi" type="text" class="form-control @error('kualifikasi') is-invalid @enderror" name="kualifikasi" required autocomplete="new-kualifikasi">

                                @error('kualifikasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Lowongan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
