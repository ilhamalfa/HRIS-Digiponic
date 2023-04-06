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
                    {{-- <div class="row mb-3 mx-1">
                        <form class="nav-link d-none d-lg-flex search">
                        <div class="col-6">
                            <input type="text" class="form-control text-white topbar-search-input" id="topbar-search-input" placeholder="Search Anythings" name="search" autofocus>
                        </div>
                        <div class="col-2 px-3">
                            <select class="form-control text-white" aria-label="Default select example">
                                <option selected>Pilih Department</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-2 mx-1">
                            <select class="form-control text-white" aria-label="Default select example">
                                <option selected>Pilih Department</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-2 mx-1">
                            <button class="btn mt-1 w-75">Search</button>
                        </div>
                        </form>
                    </div> --}}
                    <table class="table mb-4">
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
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
