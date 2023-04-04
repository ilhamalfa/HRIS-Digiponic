@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('pegawai/izin/ajukan-izin') }}" class="btn btn-primary">Ajukan izin</a>
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar izin') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pegawai</th>
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
                                <td>{{ $izin->user->pegawai->nama }}</td>
                                <td>{{ $izin->tanggal_mulai }}</td>
                                <td>{{ $izin->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($izin->tanggal_mulai), date_create($izin->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $izin->alasan_perizinan }}</td>
                                <td><a href="{{ url('admin/izin/bukti/' . $izin->id) }}" target="_blank" class="btn btn-primary">Lihat Bukti Perizinan</a></td>
                                <td>{{ $izin->status_perizinan}}</td>
                                <td>
                                    @if ($izin->status_perizinan == "Menunggu Persetujuan")
                                        <a href="{{ url('admin/izin/' . $izin->id .'/terima') }}" class="btn btn-success">Terima</a>
                                        <a href="{{ url('admin/izin/' . $izin->id .'/tolak') }}" class="btn btn-danger">Tolak</a>
                                    @elseif ($izin->status_perizinan == "Diterima")
                                        <h6 class="text-success">(Diterima)</h6>
                                    @elseif ($izin->status_perizinan == "Ditolak")
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
