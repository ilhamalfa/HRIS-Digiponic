@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Form Izin') }}</div>

                <div class="card-body">
                    <form action="{{ url('pegawai/izin/ajukan-izin/proses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        {{-- Checkbox --}}
                        <div class="row mb-3">
                            <input class="form-check-input" type="checkbox" id="checkBox" name="check" class="form-control" onclick="checkboxFunction()">
                            <label class="form-check-label" for="checkbox">
                                Lebih dari sehari
                            </label>
                        </div>
                        {{-- Tanggal Mulai --}}
                        <div class="row mb-3">
                            <label for="mulai" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Mulai Izin') }}</label>

                            <div class="col-md-6">
                                <input id="mulai" type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required autocomplete="tanggal_mulai">

                                @error('tanggal_mulai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Tanggal Berakhir --}}
                        <div class="row mb-3">
                            <label for="berakhir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Berakhir Izin') }}</label>

                            <div class="col-md-6">
                                <input id="berakhir" type="date" class="form-control @error('tanggal_berakhir') is-invalid @enderror" name="tanggal_berakhir" required autocomplete="tanggal_berakhir" disabled>

                                @error('tanggal_berakhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Tanggal Berakhir --}}
                        <div class="row mb-3">
                            <label for="alasan" class="col-md-4 col-form-label text-md-end">{{ __('Alasan Perizinan') }}</label>

                            <div class="col-md-6">
                                <input id="alasan" type="text" class="form-control @error('alasan_perizinan') is-invalid @enderror" name="alasan_perizinan" required autocomplete="alasan_perizinan" value="{{ old('alasan_perizinan') }}">

                                @error('alasan_perizinan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Bukti Perizinan --}}
                        <div class="row mb-3">
                            <label for="bukti" class="col-md-4 col-form-label text-md-end">{{ __('Bukti Perizinan') }}</label>

                            <div class="col-md-6">
                                <input id="bukti" type="file" class="form-control @error('bukti_perizinan') is-invalid @enderror" name="bukti_perizinan" required autocomplete="bukti_perizinan">

                                @error('bukti_perizinan')
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
