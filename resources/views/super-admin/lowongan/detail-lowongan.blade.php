@extends('layouts.template')

@section('title')

@section('content')
    <a class="btn btn-primary my-2" href="{{ url('data-lowongan') }}">
        <i class="fa-solid fa-left-long"></i>
    </a>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card p-4">
            @isset($data)
                <p>Position : <span class="text-white-50">{{ $data->posisi }}</span></p>
                <p>Qualification :</p>
                <p class="mx-2 text-white-50">{{ $data->kualifikasi }}</p>
                <p>Description :</p>
                <p class="mx-2 text-white-50">{{ $data->deskripsi }}</p>
                <p>Deadline Date :</p>
                <p class="mx-2 text-white-50">{{ $data->tanggal }}</p>
                <p>Number Of Registrants :</p>
                <p class="mx-2 text-white-50">{{ $data->lamaran->count() . ' Registrants' }}</p>
            @endisset
        </div>
    </div>
@endsection