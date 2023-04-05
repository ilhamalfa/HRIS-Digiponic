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
                                <th scope="col">Tanggal Resign</th>
                                <th scope="col">Status Resign</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->tanggal_resign }}</td>
                                <td>{{ $data->status_resign }}</td>
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
