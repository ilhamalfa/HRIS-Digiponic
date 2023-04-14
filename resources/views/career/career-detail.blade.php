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
@endsection
