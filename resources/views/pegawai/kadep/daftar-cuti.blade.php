@extends('layouts.template')

@section('title', 'Leave List')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">Department Leave List {{ Auth::user()->department }}</h6>
                    </div>
                    <div class="card-body overflow-scroll">
                        <form class="d-flex justify-content-center align-items-center" action="">
                            <div class="form-section pagination-top-box">
                                @isset($datas)
                                    {{ $datas->links('vendor.pagination.design') }}
                                @endisset
                            </div>
                            <div class="form-section search-top-box">
                                <input type="text" class="form-control search-input" id="search-input"
                                    placeholder="Enter Position" name="search" autofocus>
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
                                <ul class="dropdown-menu text-end">
                                    <li>
                                        <a class="dropdown-item text-white"
                                            href="{{ url('/kadep/daftar-cuti?status=Menunggu Persetujuan') }}">
                                            <span>Waiting For Approval</span>
                                            <i class="fa-regular fa-clock ml-3"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white"
                                            href="{{ url('/kadep/daftar-cuti?status=Accepted') }}">
                                            <span>Accepted</span>
                                            <i class="fa-solid fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white"
                                            href="{{ url('/kadep/daftar-cuti?status=Declined') }}">
                                            <span>Declined</span>
                                            <i class="fa-solid fa-x"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLeave">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            <span>Add</span>
                        </button>
                        <table class="table mb-4 text-black">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-black fw-bold">#</th>
                                    <th scope="col" class="text-black fw-bold">NIK</th>
                                    <th scope="col" class="text-black fw-bold">Name</th>
                                    <th scope="col" class="text-black fw-bold">Leave Date</th>
                                    <th scope="col" class="text-black fw-bold">End Date</th>
                                    <th scope="col" class="text-black fw-bold">Total Days</th>
                                    <th scope="col" class="text-black fw-bold">Reason</th>
                                    <th scope="col" class="text-black fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $index => $data)
                                    <tr>
                                        <th scope="row">{{ $index + $datas->firstItem() }}</th>
                                        <td>{{ $data->user1->nik }}</td>
                                        <td>{{ $data->user1->nama }}</td>
                                        <td>{{ $data->tanggal_mulai }}</td>
                                        <td>{{ $data->tanggal_berakhir }}</td>
                                        <td>{{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . ' Hari' }}
                                        </td>
                                        <td>{{ $data->alasan }}</td>
                                        <td>
                                            @if ($data->status == 'Accepted')
                                                @if (isset($data->user1->digital_signature) && isset($data->user2->digital_signature))
                                                    <a href="{{ url('pegawai/cetak-sk/cuti/' . $data->id) }}"
                                                        class="btn btn-primary">SK Cuti</a>
                                                @else
                                                    <button disabled class="btn btn-danger">Signature Not Found</button>
                                                @endif
                                            @elseif($data->status == 'Declined')
                                                <button disabled class="btn btn-danger">Declined</button>
                                            @else
                                                <a href="{{ url('kadep/daftar-cuti/' . $data->id . '/Accept') }}"
                                                    class="btn btn-success">Accept</a>
                                                <a href="{{ url('kadep/daftar-cuti/' . $data->id . '/Decline') }}"
                                                    class="btn btn-danger">Decline</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @isset($datas)
                            {{ $datas->links('vendor.pagination.design') }}
                        @endisset

                        {{-- Modal Form Start --}}
                        <div class="modal fade" id="addLeave" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-white border-0">
                                    <div class="modal-header">
                                        <h1 class="text-black fw-bold fs-3" id="exampleModalLabel">Licensing Form
                                        </h1>
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="fa-solid fa-xmark m-auto"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('pegawai/izin/ajukan-izin/proses') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" id="checkBox"
                                                    name="check" class="form-control" onclick="checkboxFunction()">
                                                <label class="form-check-label mt-2 ml-3 text-black" for="checkbox">
                                                    More Than a Day
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="mulai" class="text-black fw-bold">Start Date</label>
                                                <input id="mulai" type="date"
                                                    class="form-input @error('tanggal_mulai') is-invalid @enderror"
                                                    name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required
                                                    autocomplete="tanggal_mulai">
                                                @error('tanggal_mulai')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="berakhir" class="text-black fw-bold">End Date</label>
                                                <input id="berakhir" type="date"
                                                    class="form-input @error('tanggal_berakhir') is-invalid @enderror"
                                                    name="tanggal_berakhir" required autocomplete="tanggal_berakhir"
                                                    disabled>
                                                @error('tanggal_berakhir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alasan" class="text-black fw-bold">Reason</label>
                                                <input id="alasan" type="text"
                                                    class="form-input @error('alasan') is-invalid @enderror"
                                                    name="alasan" required autocomplete="alasan"
                                                    value="{{ old('alasan') }}" placeholder="Input Reason">
                                                @error('alasan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="bukti" class="text-black fw-bold">Proof of
                                                    Licensing</label>
                                                <input id="bukti" type="file"
                                                    class="form-input @error('bukti') is-invalid @enderror" name="bukti"
                                                    required autocomplete="bukti">
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
    @endsection
