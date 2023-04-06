@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Data Izin Pegawai') }}</div>

                <div class="card-body overflow-auto">
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
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->user->pegawai->nama }}</td>
                                <td>{{ $data->tanggal_mulai }}</td>
                                <td>{{ $data->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $data->alasan_perizinan }}</td>
                                <td><a href="{{ url('admin/izin/bukti/' . $data->id) }}" target="_blank" class="btn btn-primary">Lihat Bukti Perizinan</a></td>
                                <td>{{ $data->status_perizinan}}</td>
                                <td>
                                    @if ($data->status_perizinan == "Menunggu Persetujuan")
                                        <a href="{{ url('admin/izin/' . $data->id .'/terima') }}" class="btn btn-success">Terima</a>
                                        <a href="{{ url('admin/izin/' . $data->id .'/tolak') }}" class="btn btn-danger">Tolak</a>
                                    @elseif ($data->status_perizinan == "Diterima")
                                        <h6 class="text-success">(Diterima)</h6>
                                    @elseif ($data->status_perizinan == "Ditolak")
                                        <h6 class="text-danger">(Ditolak)</h6>
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