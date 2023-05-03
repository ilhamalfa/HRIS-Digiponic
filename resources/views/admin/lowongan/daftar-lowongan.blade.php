@extends('layouts.template')

@section('title')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-header-left">
                    <h2 class="card-title">Vacancy List</h2>
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalForm">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        <span>Add</span>
                    </button>
                </div>
                <div class="table-header d-flex justify-between mb-3">
                    <div class="table-header-left w-100 ms-auto mt-2 me-5">
                        <form class="nav-link d-none d-lg-flex search" action="">
                            <div class="col-6">
                                <input type="text" class="form-control text-white topbar-search-input" id="topbar-search-input" placeholder="Enter Job Title..." name="search" autofocus>
                            </div>
                            <div class="col-2 mx-1">
                                <button class="btn mt-1 w-75">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-header-right ms-auto mt-4 me-5">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-filter"></i>
                            </button>
                            <ul class="dropdown-menu text-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span>Asc</span>
                                        <i class="fa-solid fa-arrow-down-a-z"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span>Desc</span>
                                        <i class="fa-solid fa-arrow-down-z-a"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span>Deadline</span>
                                        <i class="fa-regular fa-clock"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span>Aplicants = 0</span>
                                        <i class="fa-solid fa-user-tie"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover text-center text-white">
                        <thead>
                            <tr>
                                <th class="text-white"> # </th>
                                <th class="text-white"> Position </th>
                                <th class="text-white"> Deadline Date </th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->posisi }}</td>
                                    <td>
                                        @if (\Carbon\Carbon::now() > $data->tanggal)
                                            <span class="text-danger fw-bold">
                                                {{ date('d F Y', strtotime($data->tanggal)) }}
                                            </span>
                                        @else
                                            <span class="fw-bold">
                                                {{ date('d F Y', strtotime($data->tanggal)) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $data->pelamar->count() }}
                                        @if ($data->pelamar->count() > 0)
                                            <i class="fa-solid fa-user-tie text-success ml-2"></i>
                                        @elseif ($data->pelamar->count() > 50)
                                            <i class="fa-solid fa-user-tie text-warning ml-2"></i>
                                        @else
                                            <i class="fa-solid fa-user-tie ml-2"></i>
                                        @endif
                                    </td>
                                    <td class="table-vacancy-actions">
                                        {{-- <a href="{{ url('data-lowongan/detail-lowongan/' . $data->id) }}"
                                            class="btn btn-primary my-2">Details Vacancy</a> --}}
                                        <a href="{{ url('data-lowongan/daftar-pelamar/' . $data->id) }}"
                                            class="btn btn-link text-decoration-none text-white my-2">
                                            <span>Aplicants</span>
                                            <i class="fa-solid fa-table-list text-success"></i>
                                        </a>
                                        {{-- <a href="data-lowongan/hapus-lowongan/{{ $data->id }}">
                                            Delete
                                        </a> --}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link text-decoration-none text-white"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">
                                            <i class="fa-solid fa-sort-down text-warning"></i>
                                            <span>Details</span>
                                        </button>
                                        @isset($dd)
                                            <p>{{ $dd }}</p>
                                        @endisset
                                    </td>
                                </tr>

                                {{-- Modal Start --}}
                                {{-- Modal Details Start --}}
                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="fa-solid fa-xmark m-auto"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Position : <span class="text-white">{{ $data->posisi }}</span></p>
                                                <p>Qualification :</p>
                                                <p class="mx-2 text-white">{!! $data->kualifikasi !!}</p>
                                                <p>Description :</p>
                                                <p class="mx-2 text-white">{!! $data->deskripsi !!}</p>
                                                <p>Deadline Date :</p>
                                                <p class="mx-2 text-white">{{ date('d F Y', strtotime($data->tanggal)) }}</p>
                                                <p>Registrants :</p>
                                                <p class="mx-2 text-white">
                                                    {{ $data->pelamar->count() }}
                                                    <i class="fa-solid fa-user-tie"></i>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <p>Uploaded at {{ date('d F Y', strtotime($data->created_at)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal Details End --}}

                                {{-- Modal Form Start --}}
                                <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vacancy</h1>
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="fa-solid fa-xmark m-auto"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" method="POST"
                                                    action="{{ url('data-lowongan/store-lowongan') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="Position">Position</label>
                                                        <input id="Position" type="text"
                                                            class="form-control @error('posisi') is-invalid @enderror form-input"
                                                            name="posisi" value="{{ old('posisi') }}"
                                                            placeholder="Position" required autocomplete="posisi">
                                                        @error('posisi')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Deadline Date">Deadline Date</label>
                                                        <input id="Deadline Date" type="date"
                                                            class="form-control @error('tanggal') is-invalid @enderror form-input"
                                                            name="tanggal" value="{{ old('tanggal') }}"
                                                            placeholder="Deadline Date" required autocomplete="tanggal">
                                                        @error('tanggal')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Qualification">Qualification</label>
                                                        <input id="Qualification" type="text"
                                                            class="form-control @error('kualifikasi') is-invalid @enderror form-input"
                                                            name="kualifikasi" value="{{ old('kualifikasi') }}"
                                                            placeholder="Qualification" required
                                                            autocomplete="new-kualifikasi">
                                                        @error('kualifikasi')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Description">Description</label>
                                                        <input id="Description" type="text"
                                                            class="form-control form-input" name="deskripsi"
                                                            value="{{ old('deskripsi') }}" placeholder="Description"
                                                            required autocomplete="new-deskripsi">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary me-2">
                                                        <span>Add</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal Form End --}}
                                {{-- Modal End --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <h6 class="my-4 ms-2">
                    <i class="fa-solid fa-circle-info text-info"></i>
                    <span>Information</span>
                </h6>
                <div class="information d-flex ms-4">
                    <div class="deadline ms-2 me-5">
                        <p>Deadline Date :</p>
                        <p class="ms-3">
                            <i class="fa-sharp fa-solid fa-square text-white"></i>
                            <span>
                                < Deadline Date</span>
                        </p>
                        <p class="ms-3">
                            <i class="fa-sharp fa-solid fa-square text-danger"></i>
                            <span>= Deadline Date</span>
                        </p>
                    </div>
                    <div class="apllicants ms-5">
                        <p>Aplicants :</p>
                        <div class="d-flex">
                            <p class="ms-3">
                                <i class="fa-solid fa-user-tie"></i>
                                <span>= 0</span>
                            </p>
                            <p class="ms-3">
                                <i class="fa-solid fa-user-tie text-warning"></i>
                                <span>> 50</span>
                            </p>
                        </div>
                        <div class="d-flex">
                            <p class="ms-3">
                                <i class="fa-solid fa-user-tie text-success"></i>
                                <span>> 1</span>
                            </p>
                            <p class="ms-3">
                                <i class="fa-solid fa-user-tie text-danger"></i>
                                <span>> 100</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
