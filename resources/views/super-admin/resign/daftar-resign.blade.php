@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Daftar Resign Pegawai') }}</div>

                <div class="card-body">
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
                                <td>{{ $data->user->nik }}</td>
                                <td>{{ $data->user->pegawai->nama }}</td>
                                <td>{{ $data->tanggal_resign }}</td>
                                <td>{{ $data->status_resign }}</td>
                                <td>
                                    @if ($data->status_resign == "Menunggu Persetujuan")
                                        <a href="{{ url('/resign/daftar-resign/' . $data->id .'/terima') }}" class="btn btn-success">Terima</a>
                                        <a href="{{ url('/resign/daftar-resign/' . $data->id .'/tolak') }}" class="btn btn-danger">Tolak</a>
                                    @elseif ($data->status_resign == "Diterima")
                                        <h6 class="text-success">(Diterima)</h6>
                                    @elseif ($data->status_resign == "Ditolak")
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

