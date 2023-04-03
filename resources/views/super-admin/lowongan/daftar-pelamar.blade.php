@extends('layouts.template')

@section('title')

@section('content')
    <a class="btn btn-primary my-2" href="{{ url('data-lowongan') }}">
        <i class="fa-solid fa-left-long"></i>
    </a>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Vacancy, ' . $data->posisi) }}</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->user->pelamar->nama }}</td>
                                <td>{{ $data->user->pelamar->jenis_kelamin }}</td>
                                <td>{{ $data->user->pelamar->umur }}</td>
                                <td>{{ $data->user->pelamar->nomor_hp }}</td>
                                <td>{{ $data->user->pelamar->email }}</td>
                                <td><a href="{{ url('data-lowongan/pelamar-detail/' . $data->id) }}"
                                        class="btn btn-primary">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
