@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Pegawai') }}</div>

                <div class="card-body">
                    <a href="#" class="btn btn-primary">Tambah User Pegawai</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Department</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->pegawai->nama }}</td>
                                <td>{{ $data->pegawai->department }}</td>
                                <td>{{ $data->pegawai->golongan }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    <a href="{{ url('/data-pegawai/edit-pegawai/' . $data->id) }}" class="btn btn-warning">Edit</a>
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
