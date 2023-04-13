@extends('layouts.page')

@section('title')

@section('content')
    {{-- Search --}}
    <div class="row p-5 mt-5 justify-content-md-center">
        <form class="nav-link d-none d-lg-flex search" action="{{ url('/career') }}">
            <div class="col-2"></div>
            <div class="col col-lg-6">
                <input type="text" class="form-control text-white topbar-search-input" id="topbar-search-input" placeholder="Enter the job" name="search" autofocus>
            </div>
            <div class="col col-lg-2">
                <button class="btn mt-1 w-75">Search</button>
            </div>
            <div class="col-2"></div>
        </form>
    </div>
    <div class="vacancy">
        @foreach ($datas as $data)
            <a class="vacancy-card-link" href="{{ url('career/vacancy/detail/' . $data->id) }}">
                <div class="card vacancy-card mx-3 my-2">
                    <div class="vacancy-span">
                        <span>
                            <i class="fa-solid fa-check-to-slot"></i>
                        </span>
                        <span>Detail</span>
                    </div>
                    <div class="card-body vacancy-card-body text-white">
                        <h1 class="vacancy-position-title">Job Desk :</h1>
                        <h6 class="vacancy-position-name">{{ $data->posisi }}</h6>
                        <p class="vacancy-deadline-date-title my-3">Deadline Date :</p>
                        <p class="vacancy-deadline-date mx-2 px-2">{{ date('d F Y', strtotime($data->tanggal)) }}</p>
                        <p class="vacancy-uploade-date m-0">Posted On {{ date('d F Y', strtotime($data->created_at)) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
