@extends('layouts.page')

@section('title')

@section('content')
    <div class="career">

        {{-- Search Start --}}
        <div class="career-search-box">
            <form class="career-search" action="{{ url('/career') }}">
                <div class="career-input-box">
                    <input type="text" class="form-control career-input" placeholder="Enter the job" name="search" id="career-input" required
                        autofocus>
                </div>
                <div class="career-search-button">
                    <button class="btn">
                        <span>Search</span>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                </div>
            </form>
        </div>
        {{-- Search End --}}

        {{-- Vacancy Start --}}
        <div class="career-vacancy-box">
            @foreach ($datas as $data)
                <a class="vacancy-card-link" href="{{ url('career/vacancy/detail/' . $data->id) }}">
                    <div class="card vacancy-card mx-3 my-2">
                        <div class="vacancy-span">
                            <span>
                                <i class="fa-solid fa-check-to-slot"></i>
                            </span>
                            <span>Detail</span>
                        </div>
                        <img src="" alt="">
                        <div class="card-body vacancy-card-body text-white">
                            <div class="vacancy-logo-box">
                                <i class="fa-solid fa-suitcase vacancy-logo"></i>
                            </div>
                            <h1 class="vacancy-position-title">Job Desk :</h1>
                            <h6 class="vacancy-position-name">{{ $data->posisi }}</h6>
                            <p class="vacancy-deadline-date-title">Deadline Date :</p>
                            <p class="vacancy-deadline-date">{{ date('d F Y', strtotime($data->tanggal)) }}</p>
                            <p class="vacancy-uploaded-date">Posted On {{ date('d F Y', strtotime($data->created_at)) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{-- Vacancy End --}}

    </div>
@endsection
