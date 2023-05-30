@extends('layouts.template')

@section('title', 'Resign List')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-header">
                    <h6 class="text-black fw-bold fs-3">Resign List</h6>
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
                        <div class="form-section filter-top-box">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-filter"></i>
                            </button>
                            <ul class="dropdown-menu text-end">
                                <li>
                                    <a class="dropdown-item text-white"
                                        href="{{ url('admin/daftar-cuti?status=Menunggu Persetujuan') }}">
                                        <span>Waiting For Approval</span>
                                        <i class="fa-regular fa-clock"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-white"
                                        href="{{ url('admin/daftar-cuti?status=Accepted') }}">
                                        <span>Accepted</span>
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-white"
                                        href="{{ url('admin/daftar-cuti?status=Declined') }}">
                                        <span>Declined</span>
                                        <i class="fa-solid fa-x"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <table class="table mb-4 text-black">
                        <thead>
                            <tr>
                                <th scope="col" class="text-black fw-bold">#</th>
                                <th scope="col" class="text-black fw-bold">NIK</th>
                                <th scope="col" class="text-black fw-bold">Nama</th>
                                <th scope="col" class="text-black fw-bold">Tanggal Resign</th>
                                <th scope="col" class="text-black fw-bold">Status Resign</th>
                                <th scope="col" class="text-black fw-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $index => $data)
                            <tr>
                                <th scope="row">{{ $index + $datas->firstItem() }}</th>
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

