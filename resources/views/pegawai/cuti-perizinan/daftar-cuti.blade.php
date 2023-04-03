@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('pegawai/cuti/ajukan-cuti') }}" class="btn btn-primary">Ajukan Cuti</a>
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Cuti') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
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
                                <td>{{ $cuti->tanggal_mulai }}</td>
                                <td>{{ $cuti->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($cuti->tanggal_mulai), date_create($cuti->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $cuti->status_cuti}}</td>
                                <td>
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
