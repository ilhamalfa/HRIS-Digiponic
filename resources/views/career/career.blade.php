@extends('layouts.page')

@section('title', 'Career')

@section('content')
    {{-- Search --}}
    <div class="row p-5 mt-5 justify-content-md-center">
        <div class="col-lg-1">
            <div class="dropdown">
                <button class="btn dropdown-toggle filter-buton" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-filter text-white"></i>
                    <i class="fa-solid fa-sort text-white"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ url('career?orderBy=desc') }}">
                            Deadline &nbsp
                            <i class="fa-solid fa-arrow-down"></i>
                        </a>
                        <a class="dropdown-item" href="{{ url('career?orderBy=asc') }}">
                            Deadline &nbsp
                            <i class="fa-solid fa-arrow-up"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('career?closed=true') }}">
                            Closed
                        </a>
                </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <form class="nav-link d-none d-lg-flex search" action="" method="get">
                <input type="text" class="search-input" id="search-input" placeholder="Search Job" name="search"
                    autofocus>
                <button type="submit" class="search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-1">
            @isset($datas)
                {{ $datas->links('vendor.pagination.design') }}
            @endisset
        </div>
    </div>
    {{-- Search End --}}

    {{-- Vacancy Start --}}
    <div class="row">
        <h1 class="vacancy-title">AVAILABLE JOBS</h1>

        <div class="career-vacancy-box">
            @foreach ($datas as $data)
                @if ($data->tanggal > now()->toDateString())
                <div class="vacancy-card-link-box">
                    <a class="vacancy-card-link" data-bs-toggle="modal" data-bs-target="#apply{{ $loop->iteration }}">
                        <div class="card vacancy-card mx-3 my-2">
                            <div class="card-body vacancy-card-body text-white">
                                <h6 class="vacancy-position-name">{{ $data->posisi }}</h6>
                                <p class="vacancy-kualification">{!! substr(strip_tags($data->deskripsi), 0, 30) . '...' !!}</p>
                                <p class="vacancy-date">
                                    <span class="my-2 tx-secondary-color-2">Posted On
                                        {{ date('d F Y', strtotime($data->created_at)) }}</span>
                                    <span class="my-2 tx-secondary-color-3">Ended
                                        {{ date('d F Y', strtotime($data->tanggal)) }}</span>
                                </p>
                                <p class="apply-text">APPLY</p>
                            </div>
                        </div>
                    </a>
                </div>
                @else
                <div class="vacancy-card-link-box">
                    <a class="vacancy-card-link">
                        <div class="card vacancy-card mx-3 my-2">
                            <div class="card-body vacancy-card-body text-white">
                                <h6 class="vacancy-position-name">{{ $data->posisi }}</h6>
                                <p class="vacancy-kualification">{!! substr(strip_tags($data->deskripsi), 0, 30) . '...' !!}</p>
                                <p class="vacancy-date">
                                    <span class="my-2 tx-secondary-color-2">Posted On
                                        {{ date('d F Y', strtotime($data->created_at)) }}</span>
                                    <span class="my-2 tx-secondary-color-3">Ended
                                        {{ date('d F Y', strtotime($data->tanggal)) }}</span>
                                </p>
                                <p class="apply-text bg-danger">Ended</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                
                {{-- Modal --}}
                <div class="modal fade" id="apply{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content bg-secondary-color-1 vacancy-modal-box ">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 tx-primary-color" id="exampleModalLabel">APPLY {{ $data->posisi }}
                                </h1>
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa-solid fa-xmark m-auto"></i>
                                </button>
                            </div>
                            <div class="modal-body vacancy-modal-body-box">
                                <div class="detail-box">
                                    <p class="ms-3 fw-bold">Job Description :</p>
                                    <p class="ms-4 mb-2">{!! $data->deskripsi !!}</p>
                                    <p class="ms-3 mt-3 fw-bold">Qualification :</p>
                                    <p class="ms-4 mb-2">{!! $data->kualifikasi !!}
                                    <p class="ms-3 mt-3 fw-bold">Posted :</p>
                                    <p class="ms-4 mb-2">{{ date('d F Y', strtotime($data->created_at)) }}</p>
                                    <p class="ms-3 mt-3 fw-bold">Ended :</p>
                                    <p class="ms-4 mb-2">{{ date('d F Y', strtotime($data->tanggal)) }}</p>
                                </div>
                                <div class="vacancy-form-box">
                                    <form class="vacancy-form" method="POST"
                                        action={{ url('/pelamar/input-data-pelamar/store') }}"" enctype="multipart/form-data">
                                        @csrf
                                        <p class="mb-5 d-flex">
                                            <i class="fa-solid fa-circle-info mx-2"></i>
                                            <span>Fill out the form below according to the filling form, Good Luck!</span>
                                        </p>
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
                                                placeholder="Ex: 08...." required autocomplete="off">
                                        </div>
                                        <div class="cv-box">
                                            <label for="cv">Upload Your CV</label>
                                            <input class="vacancy-input" type="file" id="cv" name="cv_file"
                                                placeholder="Your CV" required autocomplete="off">
                                        </div>
                                        <div class="vacancy-button-box">
                                            <button type="submit"
                                                class="auth-button btn btn-outline-secondary rounded-0 px-5 m-3">
                                                SEND
                                                <i class="fa-solid fa-envelope-open-text"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    
    
    <div class="vision-mission-box w-50 mx-auto">
        <h6 class="vision-title">Our Vision :</h6>
        <p class="vision">To be a leading technology company that changes the world with innovative solutions, <br> empowering people in a
            meaningful way
            digital, <br> and create a sustainable future.</p>
    </div>
    {{-- Vacancy End --}}

@endsection
