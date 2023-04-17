@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Data User') }}</div>

                <div class="card-body">
                    @if (Auth::user()->role != 'Admin')
                    <a href="#" class="btn btn-primary mb-3">Add Employee User</a>
                    @endif
                    <table class="table mb-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Email</th>
                                <th scope="col">Email Verified</th>
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
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection