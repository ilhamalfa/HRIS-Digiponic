@extends('layouts.template')

@section('title', 'User Data')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">User Data</h6>
                    </div>
                    <div class="card-body overflow-scroll">
                        <form class="d-flex justify-content-center align-items-center" action="{{ url('/data-user') }}">
                            <div class="form-section pagination-top-box">
                                @isset($datas)
                                    {{ $datas->links('vendor.pagination.design') }}
                                @endisset
                                <span class="text-black">Pagination</span>
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
                        </form>
                        @if (Session::has('success'))
                            <div class="alert alert-success" id="session-alert" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <table class="table mb-4 text-black">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-black fw-bold">#</th>
                                    <th scope="col" class="text-black fw-bold">NIK</th>
                                    <th scope="col" class="text-black fw-bold">Nama</th>
                                    <th scope="col" class="text-black fw-bold">Email</th>
                                    <th scope="col" class="text-black fw-bold">Department</th>
                                    <th scope="col" class="text-black fw-bold">Golongan</th>
                                    @if (Auth::user()->role != 'Admin')
                                        <th scope="col" class="text-black fw-bold">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $index => $data)
                                    <tr>
                                        <th scope="row">{{ $index + $datas->firstItem() }}</th>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->department }}</td>
                                        <td>{{ $data->golongan }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary text-decoration-none"
                                                data-bs-toggle="modal" data-bs-target="#detailUser{{ $data->id }}">
                                                <span>Detail</span>
                                                <i class="fa-solid fa-scroll"></i>
                                            </button>
                                            @if (Auth::user()->role == 'SuperAdmin')
                                                <a class="btn btn-warning text-decoration-none"
                                                    href="{{ url('/data-user/edit-user/' . $data->id) }}">
                                                    <span>Edit</span>
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </a>
                                                @if ($data->id != Auth::user()->id)
                                                    <a href="{{ url('/data-user/delete-user/' . $data->id) }}"
                                                        class="btn btn-danger" disabled>
                                                        <span>Delete</span>
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- Modal Start --}}
                                    {{-- Modal Details Start --}}
                                    <div class="modal fade" id="detailUser{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-white text-black border-0">
                                                <div class="modal-header border-secondary">
                                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Details</h1>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa-solid fa-xmark m-auto"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body fw-bold">
                                                    <p>NIK : <span class="fw-normal">{{ $data->nik }}</span></p>
                                                    <p>Nama : <span class="fw-normal">{{ $data->nama }}</span></p>
                                                    <p>E-mail : <span class="fw-normal">{{ $data->email }}</span></p>
                                                    <p>Jumlah Cuti : <span
                                                            class="fw-normal">{{ $data->jumlah_cuti }}</span></p>
                                                    <p>Address :</p>
                                                    <p class="fw-normal">
                                                        {{ $data->alamat . ', ' . $data->kelurahan->name . ', ' . $data->kecamatan->name . ', ' . $data->kabupaten->name . ', ' . $data->provinsi->name }}
                                                    </p>
                                                    <p>Jenis Kelamin : <span
                                                            class="fw-normal">{{ $data->jenis_kelamin }}</span></p>
                                                    <p>Tanggal Lahir : <span
                                                            class="fw-normal">{{ $data->tanggal_lahir }}</span></p>
                                                    <p>Umur : <span
                                                            class="fw-normal">{{ \Carbon\Carbon::parse($data->tanggal_lahir)->age }}
                                                            Tahun</span></p>
                                                    <p>Nomor HP : <span class="fw-normal">{{ $data->nomor_hp }}</span></p>
                                                    <p>Status Pernikahan : <span
                                                            class="fw-normal">{{ $data->status_pernikahan }}</span></p>
                                                    @if ($data->status_pernikahan != 'Lajang')
                                                        <p>Jumlah Anak : <span
                                                                class="fw-normal">{{ $data->jumlah_anak }}</span></p>
                                                    @endif
                                                    <p>Department : <span class="fw-normal">{{ $data->department }}</span>
                                                    </p>
                                                    <p>Golongan : <span class="fw-normal">{{ $data->golongan }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Details End --}}
                                    {{-- Modal End --}}
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-bottom-box">
                            @isset($datas)
                                {{ $datas->links('vendor.pagination.design') }}
                            @endisset
                            <span class="text-black">Pagination</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
