@extends('layouts.template')

@section('title', 'Candidate Table')

@section('content')
    <a class="btn btn-primary my-2" href="{{ url('data-lowongan') }}">
        <i class="fa-solid fa-left-long"></i>
    </a>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card bg-white">
            <div class="card-header">
                <h6 class="text-black fw-bold fs-3">{{ __('Candidate List, ' . $data->posisi) }}</h6>
            </div>
            <div class="card-body overflow-scroll">
                <form class="d-flex justify-content-center align-items-center" action="{{ url('/data-user') }}">
                    <div class="form-section pagination-top-box">
                        @isset($datas)
                            {{ $datas->links('vendor.pagination.design') }}
                        @endisset
                    </div>
                    <div class="form-section search-top-box">
                        <input type="text" class="form-control search-input" id="search-input"
                            placeholder="Enter NIK or Name" name="search" autofocus>
                    </div>
                    <div class="form-section d-flex search-button-top-box">
                        <button class="btn search-button">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span class="search-button-text">Search</span>
                        </button>
                    </div>
                    <div class="form-section filter-top-box">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-filter"></i>
                        </button>
                        <ul class="dropdown-menu text-start">
                            <li>
                                <a class="dropdown-item"
                                    href="{{ url('data-lowongan/daftar-pelamar/' . $data->id . '?status=Menunggu') }}">
                                    <span>Waiting</span>
                                    <i class="fa-regular fa-clock"></i>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ url('data-lowongan/daftar-pelamar/' . $data->id . '?status=Wawancara') }}"">
                                    <span>Interview</span>
                                    <i class="fa-solid fa-comments"></i>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ url('data-lowongan/daftar-pelamar/' . $data->id . '?status=Psikotest') }}"">
                                    <span>Psychotest</span>
                                    <i class="fa-solid fa-clipboard"></i>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ url('data-lowongan/daftar-pelamar/' . $data->id . '?status=Offering') }}"">
                                    <span>Offering</span>
                                    <i class="fa-solid fa-handshake"></i>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ url('data-lowongan/daftar-pelamar/' . $data->id . '?status=Diterima') }}"">
                                    <span>Accepted</span>
                                    <i class="fa-solid fa-user-tie"></i>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ url('data-lowongan/daftar-pelamar/' . $data->id . '?status=Ditolak') }}"">
                                    <span>Rejected</span>
                                    <i class="fa-solid fa-user-xmark"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </form>
                <table class="table text-center text-white">
                    <thead>
                        <tr>
                            <th scope="col" class="text-black fw-bold">#</th>
                            <th scope="col" class="text-black fw-bold">Name</th>
                            <th scope="col" class="text-black fw-bold">Age</th>
                            <th scope="col" class="text-black fw-bold">Phone Number</th>
                            <th scope="col" class="text-black fw-bold">Email</th>
                            <th scope="col" class="text-black fw-bold">Status</th>
                            <th scope="col" class="text-black fw-bold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->age }}</td>
                                <td>{{ $data->nomor_hp }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->status }}</td>
                                <td class="d-flex flex-collumn flex-wrap justify-content-center align-items-center">
                                    <div class="m-1">
                                        <a href="{{ url('pelamar-detail/cv/' . $data->id) }}" class="btn btn-primary"
                                            target="_blank">CV Detail</a>
                                    </div>
                                    <div class="m-1">
                                        @if ($data->status == 'Menunggu')
                                            <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id . '/Wawancara') }}"
                                                class="btn btn-success">Interview</a>
                                        @elseif ($data->status == 'Wawancara')
                                            <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id . '/Psikotest') }}"
                                                class="btn btn-success">Psychotest</a>
                                        @elseif ($data->status == 'Psikotest')
                                            <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id . '/Offering') }}"
                                                class="btn btn-success">Offering</a>
                                        @elseif ($data->status == 'Offering')
                                            <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id . '/Terima') }}"
                                                class="btn btn-success">Accept</a>
                                        @endif
                                        @if ($data->status != 'Diterima' && $data->status != 'Ditolak')
                                            <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id . '/Tolak') }}"
                                                class="btn btn-danger mx-1">Decline</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-bottom-box">
                    @isset($datas)
                        {{ $datas->links('vendor.pagination.design') }}
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
