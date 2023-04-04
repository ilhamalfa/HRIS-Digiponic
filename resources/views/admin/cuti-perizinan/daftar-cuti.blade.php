@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Cuti') }}</div>

                <div class="card-body">
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
                            @foreach ($cutis as $cuti)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $cuti->user->pegawai->nama }}</td>
                                <td>{{ $cuti->tanggal_mulai }}</td>
                                <td>{{ $cuti->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($cuti->tanggal_mulai), date_create($cuti->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $cuti->status_cuti}}</td>
                                <td>
                                    @if ($cuti->status_cuti == "Menunggu Persetujuan")
                                        <a href="{{ url('admin/cuti/' . $cuti->id .'/terima') }}" class="btn btn-success">Terima</a>
                                        <a href="{{ url('admin/cuti/' . $cuti->id .'/tolak') }}" class="btn btn-danger">Tolak</a>
                                    @elseif ($cuti->status_cuti == "Diterima")
                                        <h6 class="text-success">(Diterima)</h6>
                                    @elseif ($cuti->status_cuti == "Ditolak")
                                        <h6 class="text-danger">(Ditolak)</h6>
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
