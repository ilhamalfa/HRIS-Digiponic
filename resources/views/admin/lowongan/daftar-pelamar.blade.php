@extends('layouts.template')

@section('title')

@section('content')
    <a class="btn btn-primary my-2" href="{{ url('data-lowongan') }}">
        <i class="fa-solid fa-left-long"></i>
    </a>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Daftar Kandidat, ' . $data->posisi) }}</h4>
                <div class="table-header d-flex justify-between mb-3">
                    <div class="table-header-left w-100 ms-auto mt-2 me-5">
                        <form class="nav-link d-none d-lg-flex search" action="">
                            <div class="col-6">
                                <input type="text" class="form-control text-white topbar-search-input" id="topbar-search-input" placeholder="Enter Applicant's Name..."name="search" autofocus>
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
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Menunggu') }}">
                                        <span>Waiting</span>
                                        <i class="fa-regular fa-clock"></i>
                                        {{-- <i class="fa-solid fa-arrow-down-a-z"></i> --}}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Wawancara') }}"">
                                        <span>Interview</span>
                                        <i class="fa-solid fa-comments"></i>
                                        {{-- <i class="fa-solid fa-arrow-down-z-a"></i> --}}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Psikotest') }}"">
                                        <span>Psikotest</span>
                                        <i class="fa-solid fa-clipboard"></i>
                                        {{-- <i class="fa-regular fa-clock"></i> --}}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Offering') }}"">
                                        <span>Offering</span>
                                        <i class="fa-solid fa-handshake"></i>
                                        {{-- <i class="fa-solid fa-user-tie"></i> --}}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Diterima') }}"">
                                        <span>Diterima</span>
                                        <i class="fa-solid fa-user-tie"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Ditolak') }}"">
                                        <span>Ditolak</span>
                                        <i class="fa-solid fa-user-xmark"></i>
                                        {{-- <i class="fa-solid fa-user-tie"></i> --}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
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
                                <td>
                                    <a href="{{ url('pelamar-detail/cv/' . $data->id) }}" class="btn btn-primary" target="_blank">CV Detail</a>
                                    @if ($data->status == 'Menunggu')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Wawancara') }}" class="btn btn-success">Interview</a>
                                    @elseif ($data->status == 'Wawancara')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Psikotest') }}" class="btn btn-success">Psikotest</a>
                                    @elseif ($data->status == 'Psikotest')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Offering') }}" class="btn btn-success">Offering</a>
                                    @elseif ($data->status == 'Offering')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Terima') }}" class="btn btn-success">Accept</a>
                                    @endif
                                    @if ($data->status != 'Diterima' && $data->status != 'Ditolak')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Tolak') }}" class="btn btn-danger">Decline</a>
                                    @endif
                                </td>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
