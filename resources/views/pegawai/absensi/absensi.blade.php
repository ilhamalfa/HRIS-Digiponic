@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Data User') }}</div>

                <div class="card-body">
                    @if (Auth::user()->role == 'SuperAdmin')
                    <a href="{{ url('/data-user/input-user') }}" class="btn btn-primary mb-3">Add User</a>
                    @endif
                    <div class="row mb-3 mx-1">
                        <form class="nav-link d-none d-lg-flex search" action="{{ url('/data-user') }}">
                            <div class="col-6">
                                <input type="text" class="form-control text-white topbar-search-input" id="topbar-search-input" placeholder="Enter NIK or Name" name="search" autofocus>
                            </div>
                            <div class="col-2 mx-1">
                                <button class="btn mt-1 w-75">Search</button>
                            </div>
                        </form>
                    </div>
                    <table class="table mb-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Department</th>
                                <th scope="col">Golongan</th>
                                @if (Auth::user()->role != 'Admin')
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->department }}</td>
                                <td>{{ $data->golongan }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary text-decoration-none"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">
                                            <span>Detail</span>
                                    </button>
                                    {{-- <a href="{{ url('/data-user/detail-user/' . $data->id) }}" class="btn btn-primary" disabled>Detail</a> --}}
                                    @if (Auth::user()->role == 'SuperAdmin')
                                        <a href="{{ url('/data-user/edit-user/' . $data->id) }}" class="btn btn-warning" disabled>Edit</a>
                                        @if ($data->id != Auth::user()->id)
                                            <a href="{{ url('/data-user/delete-user/' . $data->id) }}" class="btn btn-danger" disabled>Delete</a>
                                        @endif
                                    @endif
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
                                            <p>NIK : <span class="text-white">{{ $data->nik }}</span></p>
                                            <p>Nama : <span class="text-white">{{ $data->nama }}</span></p>
                                            <p>E-mail : <span class="text-white">{{ $data->email }}</span></p>
                                            <p>Jumlah Cuti : <span class="text-white">{{ $data->jumlah_cuti }}</span></p>
                                            <p>Address :</p>
                                            <p class="text-white">{{ $data->alamat . ', ' . $data->kelurahan->name . ', '. $data->kecamatan->name . ', ' . $data->kabupaten->name . ', ' . $data->provinsi->name }}</p>
                                            <p>Jenis Kelamin : <span class="text-white">{{ $data->jenis_kelamin }}</span></p>
                                            <p>Tanggal Lahir : <span class="text-white">{{ $data->tanggal_lahir }}</span></p>
                                            <p>Umur : <span class="text-white">{{ \Carbon\Carbon::parse($data->tanggal_lahir)->age }} Tahun</span></p>
                                            <p>Nomor HP : <span class="text-white">{{ $data->nomor_hp }}</span></p>
                                            <p>Status Pernikahan : <span class="text-white">{{ $data->status_pernikahan }}</span></p>
                                            @if ($data->status_pernikahan != 'Lajang')
                                            <p>Jumlah Anak : <span class="text-white">{{ $data->jumlah_anak }}</span></p>
                                            @endif
                                            <p>Department : <span class="text-white">{{ $data->department }}</span></p>
                                            <p>Golongan : <span class="text-white">{{ $data->golongan }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Details End --}}
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection