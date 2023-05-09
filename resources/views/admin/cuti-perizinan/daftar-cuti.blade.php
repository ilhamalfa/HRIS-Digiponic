@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Data Cuti Pegawai') }}</div>

                <div class="card-body">
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
                                        <a class="dropdown-item text-white" href="{{ url('admin/daftar-cuti?status=Menunggu Persetujuan') }}">
                                            <span>Waiting For Approval</span>
                                            <i class="fa-regular fa-clock ml-3"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="{{ url('admin/daftar-cuti?status=Accepted') }}">
                                            <span>Accepted</span>
                                            <i class="fa-solid fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="{{ url('admin/daftar-cuti?status=Declined') }}">
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
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Tanggal Cuti</th>
                                <th scope="col">Tanggal Berakhir</th>
                                <th scope="col">Jumlah Hari</th>
                                <th scope="col">Status Cuti</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->user1->nama }}</td>
                                <td>{{ $data->tanggal_mulai }}</td>
                                <td>{{ $data->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $data->status}}</td>
                                <td>
                                    @if ($data->status == 'Accepted')
                                        @if (isset($data->user1->digital_signature))
                                            <a href="{{url('pegawai/cetak-sk/cuti/' . $data->id)}}" class="btn btn-primary">SK Cuti</a>
                                        @else
                                            <button disabled class="btn btn-danger">SIgnature Not Found</button>
                                        @endif
                                    @elseif($data->status == 'Declined')
                                        <button disabled class="btn btn-primary">SK Cuti</button>
                                    @endif
                                </td>
                            </tr>
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