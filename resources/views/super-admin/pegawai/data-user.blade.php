@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Pegawai') }}</div>

                <div class="card-body">
                    <a href="{{ url('/data-user/input-user') }}" class="btn btn-primary">Tambah User Pegawai</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Email</th>
                                <th scope="col">Email Verified</th>
                                <th scope="col">Role</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    @if ($data->email_verified_at == Null)
                                    <h6 class="text-danger">Verify the email</h6>
                                    @else
                                        <h6 class="text-success">Verified</h6>
                                    @endif
                                </td>
                                <td>{{ $data->role }}</td>
                                {{-- <td>
                                    @if(isset($data->pegawai))
                                        <a href="#" class="btn btn-warning" disabled>Lihat Data User</a>
                                    @else
                                        <a href="{{ url('/data-pegawai/edit-pegawai/' . $data->id) }}" class="btn btn-warning">Tambah Data</a>
                                    @endif
                                </td> --}}
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
