@extends('layouts.template')

@section('title', 'Employee Leave List')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">Employee Leave List</h6>
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
                                    <th scope="col" class="text-black fw-bold">Employee Name</th>
                                    <th scope="col" class="text-black fw-bold">Leave Date</th>
                                    <th scope="col" class="text-black fw-bold">Leave Date Ends</th>
                                    <th scope="col" class="text-black fw-bold">Total Days</th>
                                    <th scope="col" class="text-black fw-bold">Status</th>
                                    <th scope="col" class="text-black fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $index => $data)
                                    <tr>
                                        <th scope="row">{{ $index + $datas->firstItem() }}</th>
                                        <td>{{ $data->user1->nama }}</td>
                                        <td>{{ $data->tanggal_mulai }}</td>
                                        <td>{{ $data->tanggal_berakhir }}</td>
                                        <td>{{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . ' Hari' }}
                                        </td>
                                        <td>{{ $data->status }}</td>
                                        <td>
                                            @if ($data->status == 'Accepted')
                                                @if (isset($data->user1->digital_signature))
                                                    <a href="{{ url('pegawai/cetak-sk/cuti/' . $data->id) }}"
                                                        class="btn btn-primary">
                                                        <span>Letter</span>
                                                        <i class="fa-solid fa-download"></i>
                                                    </a>
                                                @else
                                                    <button disabled class="btn btn-danger">
                                                        <span>Signature Not Found</span>
                                                        <i class="fa-solid fa-circle-exclamation"></i>
                                                    </button>
                                                @endif
                                            @elseif($data->status == 'Declined')
                                                <button disabled class="btn btn-primary">
                                                    <span>Letter</span>
                                                    <i class="fa-solid fa-download"></i>
                                                </button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
