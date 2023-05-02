@extends('layouts.template')

@section('title')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Enter New Job Vacancy</h4>
                <form class="forms-sample" method="POST" action="{{ url('data-lowongan/store-lowongan') }}">
                    @csrf
                    <div class="form-group">
                        <label for="Position">Position</label>
                        <input id="Position" type="text" class="form-control @error('posisi') is-invalid @enderror form-input"
                            name="posisi" value="{{ old('posisi') }}" placeholder="Position" required
                            autocomplete="posisi">

                        @error('posisi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Deadline Date">Deadline Date</label>
                        <input id="Deadline Date" type="date" class="form-control @error('tanggal') is-invalid @enderror form-input"
                            name="tanggal" value="{{ old('tanggal') }}" placeholder="Deadline Date" required autocomplete="tanggal">

                        @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Qualification">Qualification</label>
                        <input id="Qualification" type="text"
                            class="form-control @error('kualifikasi') is-invalid @enderror form-input" name="kualifikasi"
                            value="{{ old('kualifikasi') }}" placeholder="Qualification" required autocomplete="new-kualifikasi">

                        @error('kualifikasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input id="Description" type="text" class="form-control form-input" name="deskripsi"
                            value="{{ old('deskripsi') }}" placeholder="Description" required autocomplete="new-deskripsi">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Create New</button>
                    <a class="btn btn-dark" href="{{ url('data-lowongan') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
