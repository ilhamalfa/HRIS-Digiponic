@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Ajukan Cuti') }}</div>

                <div class="card-body">
                    <form action="{{ url('pegawai/cuti/ajukan-cuti/proses') }}" method="POST">
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
                            <label for="mulai" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Mulai Cuti') }}</label>

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
                            <label for="berakhir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Berakhir Cuti') }}</label>

                            <div class="col-md-6">
                                <input id="berakhir" type="date" class="form-control @error('tanggal_berakhir') is-invalid @enderror" name="tanggal_berakhir" required autocomplete="tanggal_berakhir" disabled>

                                @error('tanggal_berakhir')
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
