@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-header-left">
                        <h2 class="card-title">Daftar Perizinan Department {{ Auth::user()->department }}</h2>
                    </div>
                    <div class="table-header d-flex justify-between mb-3">
                        <div class="table-header-left w-100 ms-auto mt-2 me-5">
                            <form class="nav-link d-none d-lg-flex search" action="">
                                <div class="col-6">
                                    <input type="text" class="form-control text-white topbar-search-input" id="topbar-search-input" placeholder="Enter Employee's NIK or Name..."name="search" autofocus>
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
                                        <a class="dropdown-item text-white" href="{{ url('/kadep/daftar-perizinan?status=Menunggu Persetujuan') }}">
                                            <span>Waiting For Approval</span>
                                            <i class="fa-regular fa-clock ml-3"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="{{ url('/kadep/daftar-perizinan?status=Accepted') }}">
                                            <span>Accepted</span>
                                            <i class="fa-solid fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="{{ url('/kadep/daftar-perizinan?status=Declined') }}">
                                            <span>Declined</span>
                                            <i class="fa-solid fa-x"></i>
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
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal izin</th>
                                <th scope="col">Tanggal Berakhir</th>
                                <th scope="col">Jumlah Hari</th>
                                <th scope="col">Alasan Izin</th>
                                <th scope="col">Bukti Perizinan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->user->nik }}</td>
                                <td>{{ $data->user->nama}}</td>
                                <td>{{ $data->tanggal_mulai }}</td>
                                <td>{{ $data->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $data->alasan }}</td>
                                <td><a href="{{ url('pegawai/izin/bukti/' . $data->id) }}" target="_blank" class="btn btn-primary">Bukti Perizinan</a></td>
                                <td>
                                    @if ($data->status == 'Accepted')
                                        <a href="" class="btn btn-primary">SK Izin</a>
                                    @elseif($data->status == 'Declined')
                                        <button disabled class="btn btn-danger">Declined</button>
                                    @else
                                        <a href="{{ url('kadep/daftar-perizinan/'. $data->id .'/Accept') }}" class="btn btn-success">Accept</a>
                                        <a href="{{ url('kadep/daftar-perizinan/'. $data->id .'/Decline') }}" class="btn btn-danger">Decline</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Modal Form Start --}}
                    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Perizinan</h1>
                                <button type="button" class="btn btn-outline-danger"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-xmark m-auto"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('pegawai/izin/ajukan-izin/proses') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" id="checkBox" name="check" class="form-control text-white" onclick="checkboxFunction()">
                                        <label class="form-check-label mt-2 ml-3" for="checkbox">
                                            Lebih dari sehari
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="mulai">Start Date</label>
                                        <input id="mulai" type="date" class="form-control text-white @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required autocomplete="tanggal_mulai">

                                        @error('tanggal_mulai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="berakhir">End Date</label>
                                        <input id="berakhir" type="date" class="form-control text-white @error('tanggal_berakhir') is-invalid @enderror" name="tanggal_berakhir" required autocomplete="tanggal_berakhir" disabled>

                                        @error('tanggal_berakhir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="alasan">Alasan</label>
                                        <input id="alasan" type="text" class="form-control text-white @error('alasan') is-invalid @enderror" name="alasan" required autocomplete="alasan" value="{{ old('alasan') }}">

                                        @error('alasan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bukti">Bukti Perizinan</label>
                                        <input id="bukti" type="file" class="form-control text-white @error('bukti') is-invalid @enderror" name="bukti" required autocomplete="bukti">

                                        @error('bukti')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
