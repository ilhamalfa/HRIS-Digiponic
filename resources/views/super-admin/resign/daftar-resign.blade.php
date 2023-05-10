@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Daftar Resign Pegawai') }}</div>

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
                                        <a class="dropdown-item text-white" href="{{ url('resign/daftar-resign?status=Menunggu Persetujuan') }}">
                                            <span>Waiting For Approval</span>
                                            <i class="fa-regular fa-clock ml-3"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="{{ url('resign/daftar-resign?status=Accepted') }}">
                                            <span>Accepted</span>
                                            <i class="fa-solid fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="{{ url('resign/daftar-resign?status=Declined') }}">
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
                                <th scope="col">Tanggal Resign</th>
                                <th scope="col">Status Resign</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->user1->nik }}</td>
                                <td>{{ $data->user1->nama }}</td>
                                <td>{{ $data->tanggal_resign }}</td>
                                <td>{{ $data->status_resign }}</td>
                                <td>
                                    @if ($data->status_resign == 'Accepted')
                                        @if (isset($data->user1->digital_signature))
                                            <a href="{{url('pegawai/cetak-sk/resign/' . $data->id)}}" class="btn btn-primary">SK Izin</a>
                                        @else
                                            <button disabled class="btn btn-danger">SIgnature Not Found</button>
                                        @endif
                                    @elseif($data->status_resign == 'Declined')
                                        <button disabled class="btn btn-danger">Declined</button>
                                    @else
                                        <a href="{{ url('kadep/daftar-resign/'. $data->id .'/Accept') }}" class="btn btn-success">Accept</a>
                                        <a href="{{ url('kadep/daftar-resign/'. $data->id .'/Decline') }}" class="btn btn-danger">Decline</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

