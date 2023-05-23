@extends('layouts.template')

@section('title', 'Candidate Table')

@section('content')
    <a class="btn btn-primary my-2" href="{{ url('data-lowongan') }}">
        <i class="fa-solid fa-left-long"></i>
    </a>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ __('Candidate List, ' . $data->posisi) }}</h3>

                {{-- Candiate Search Start --}}
                <div class="table-header d-flex justify-between mb-3">
                    <div class="table-header-left w-100 ms-auto mt-2 me-5">
                        <form class="nav-link d-none d-lg-flex search" action="">
                            <div class="col-6">
                                <input type="text" class="form-control text-white topbar-search-input" id="topbar-search-input" placeholder="Enter Applicant's Name..."name="search" autofocus>
                            </div>
                            <div class="col-2 mx-1">
                                <button class="btn mt-1 w-85">
                                    <span>Search</span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="table-header-right ms-auto mt-4 me-5">
                        <div class="dropdown me-5">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-filter"></i>
                            </button>
                            <ul class="dropdown-menu text-start">
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Menunggu') }}">
                                        <span>Waiting</span>
                                        <i class="fa-regular fa-clock"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Wawancara') }}"">
                                        <span>Interview</span>
                                        <i class="fa-solid fa-comments"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Psikotest') }}"">
                                        <span>Psychotest</span>
                                        <i class="fa-solid fa-clipboard"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Offering') }}"">
                                        <span>Offering</span>
                                        <i class="fa-solid fa-handshake"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Diterima') }}"">
                                        <span>Accepted</span>
                                        <i class="fa-solid fa-user-tie"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('data-lowongan/daftar-pelamar/'.$data->id.'?status=Ditolak') }}"">
                                        <span>Rejected</span>
                                        <i class="fa-solid fa-user-xmark"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="pagination">
                            @isset($datas)
                                {{ $datas->links('vendor.pagination.design') }}
                            @endisset
                        </div>
                    </div>
                </div>
                {{-- Candiate Search End --}}

                {{-- Candidate Table Start --}}
                <table class="table text-center text-white">
                    <thead>
                        <tr>
                            <th scope="col" class="text-white">#</th>
                            <th scope="col" class="text-white">Name</th>
                            <th scope="col" class="text-white">Age</th>
                            <th scope="col" class="text-white">Phone Number</th>
                            <th scope="col" class="text-white">Email</th>
                            <th scope="col" class="text-white">Status</th>
                            <th scope="col" class="text-white">Action</th>
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
                                        <a href="{{ url('pelamar-detail/cv/' . $data->id) }}" class="btn btn-primary" target="_blank">CV Detail</a>
                                    </div>
                                    <div class="m-1">
                                        @if ($data->status == 'Menunggu')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Wawancara') }}" class="btn btn-success">Interview</a>
                                        @elseif ($data->status == 'Wawancara')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Psikotest') }}" class="btn btn-success">Psychotest</a>
                                        @elseif ($data->status == 'Psikotest')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Offering') }}" class="btn btn-success">Offering</a>
                                        @elseif ($data->status == 'Offering')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Terima') }}" class="btn btn-success">Accept</a>
                                        @endif
                                        @if ($data->status != 'Diterima' && $data->status != 'Ditolak')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Tolak') }}" class="btn btn-danger mx-1">Decline</a>
                                        @endif
                                    </div>
                                </td>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Candidate Table End --}}

            </div>
        </div>
    </div>
@endsection
