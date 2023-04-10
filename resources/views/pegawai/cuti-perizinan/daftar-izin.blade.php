@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Daftar Izin') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal izin</th>
                                <th scope="col">Tanggal Berakhir</th>
                                <th scope="col">Jumlah Hari</th>
                                <th scope="col">Alasan Izin</th>
                                <th scope="col">Bukti Perizinan</th>
                                <th scope="col">Status izin</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($izins as $izin)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $izin->tanggal_mulai }}</td>
                                <td>{{ $izin->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($izin->tanggal_mulai), date_create($izin->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $izin->alasan_perizinan }}</td>
                                <td><a href="{{ url('pegawai/izin/bukti/' . $izin->id) }}" target="_blank" class="btn btn-primary">Lihat Bukti Perizinan</a></td>
                                <td>{{ $izin->status_perizinan}}</td>
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

