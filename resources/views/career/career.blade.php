@extends('layouts.page')

@section('title')

@section('content')
    <div class="vacancy mt-5">
        @foreach ($datas as $data)
            <a class="vacancy-card-link" href="{{ url('career/vacancy/detail/' . $data->id) }}">
                <div class="card vacancy-card mx-3 my-2">
                    <div class="vacancy-span">
                        <span>
                            <i class="fa-solid fa-check-to-slot"></i>
                        </span>
                        <span>apply</span>
                    </div>
                    <div class="card-body vacancy-card-body">
                        <h1 class="vacancy-position-title">Job Desk :</h1>
                        <h6 class="vacancy-position-name">{{ $data->posisi }}</h6>
                        <p class="vacancy-deadline-date-title m-0">Deadline Date :</p>
                        <p class="vacancy-deadline-date mx-2 px-2">{{ date('d F Y', strtotime($data->tanggal)) }}</p>
                        <p class="vacancy-uploade-date m-0">Posted On {{ date('d F Y', strtotime($data->created_at)) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
