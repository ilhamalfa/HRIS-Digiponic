@extends('layouts.page')

@section('title', 'Career')

@section('content')
    {{-- Search --}}
    <div class="row p-5 mt-5 justify-content-md-center">
        <form class="nav-link d-none d-lg-flex search" action="{{ url('/career') }}">
            <div class="col-1">
                <div class="dropdown">
                    <button class="btn dropdown-toggle filter-buton" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-filter text-white"></i>
                        <i class="fa-solid fa-sort text-white"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Lastest</a></li>
                        <li><a class="dropdown-item" href="#">Deadline Date</a></li>
                    </ul>
                </div>
            </div>
            <div class="col col-lg-6">
                <input type="text" class="search-input" id="search-input" placeholder="Search Job" name="searchjob"
                    autofocus>
            </div>
            <div class="col col-lg-2">
                <button type="submit" class="search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <div class="col-3">

            </div>
        </form>
    </div>
    {{-- Search End --}}

    {{-- Vacancy Start --}}
    <div class="career-vacancy-box">
        @foreach ($datas as $data)
            <a class="vacancy-card-link" data-bs-toggle="modal" data-bs-target="#apply">
                <div class="card vacancy-card mx-3 my-2">
                    <div class="card-body vacancy-card-body text-white">
                        <h6 class="vacancy-position-name">{{ $data->posisi }}</h6>
                        <p class="vacancy-description">{{ $data->deskripsi }}</p>
                        <p class="vacancy-kualification">{{ $data->kualifikasi }}</p>
                        <p class="vacancy-date">
                            <span class="me-5 tx-secondary-color-2">Posted On
                                {{ date('d F Y', strtotime($data->created_at)) }}</span>
                            <span class="ms-5 tx-secondary-color-3">Ended
                                {{ date('d F Y', strtotime($data->tanggal)) }}</span>
                        </p>
                        <p class="apply-text">APPLY</p>
                    </div>
                </div>
            </a>
            <div class="modal fade" id="apply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-secondary-color-1">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 tx-primary-color" id="exampleModalLabel">APPLY {{ $data->posisi }}</h1>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fa-solid fa-xmark m-auto"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-2">Information</p>
                            <p class="ms-3">Kualification :</p>
                            <p class="ms-4 mb-2">{{ $data->kualifikasi }}</p>
                            <p class="ms-3">Ended :</p>
                            <p class="ms-4 mb-2">{{ date('d F Y', strtotime($data->tanggal)) }}</p>
                            <p class="mb-5 d-flex">
                                <i class="fa-solid fa-circle-info mx-2"></i>
                                <span>Fill out the form below according to the filling form, Good Luck!</span>
                            </p>
                            <form class="vacancy-form" method="POST" action={{ url('/pelamar/input-data-pelamar/store') }}"" enctype="multipart/form-data">
                                @csrf
                                <h1 class="mb-4">PERSONAL DATA</h1>
                                <div class="name-box">
                                    <label for="name">Name :</label>
                                    <input class="vacancy-input" type="text" id="name" name="nama"
                                        placeholder="Ex: Name" required autocomplete="off" autofocus>
                                </div>
                                <div class="born-date-box">
                                    <label for="bornDate">Date Of Birth :</label>
                                    <input class="vacancy-input" type="date" id="bornDate" name="tanggal_lahir"
                                        placeholder="Date Of Birth" required autocomplete="off">
                                </div>
                                <div class="email-box">
                                    <label for="email">Your Email :</label>
                                    <input class="vacancy-input" type="email" id="email" name="email"
                                        placeholder="example@gmail.com" required autocomplete="off">
                                </div>
                                <div class="phone-number-box">
                                    <label for="phoneNumber">Phone Number :</label>
                                    <input class="vacancy-input" type="number" id="phoneNumber" name="nomor_hp"
                                        placeholder="Ex: +62....." required autocomplete="off">
                                </div>
                                <div class="cv-box">
                                    <label for="cv">Upload Your CV</label>
                                    <input class="vacancy-input" type="file" id="cv" name="cv_file"
                                        placeholder="Your CV" required autocomplete="off">
                                </div>
                                <div class="vacancy-button-box">
                                    <button type="submit" class="auth-button btn btn-outline-secondary rounded-0 px-5 m-3">
                                        SEND
                                        <i class="fa-solid fa-envelope-open-text"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- Vacancy End --}}

    </div>
@endsection
