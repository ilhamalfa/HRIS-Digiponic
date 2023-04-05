@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Pegawai') }}</div>

                <div class="card-body">
                    @if (Auth::user()->role != 'Admin')
                    <a href="#" class="btn btn-primary mb-3">Add Employee User</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Department</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Role</th>
                                @if (Auth::user()->role != 'Admin')
                                <th scope="col">Action</th>
                                @endif
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
                                @if (Auth::user()->role != 'Admin')
                                <td>
                                    <a href="{{ url('/data-pegawai/edit-pegawai/' . $data->id) }}" class="btn btn-warning">Edit</a>
                                </td>
                                @endif
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
