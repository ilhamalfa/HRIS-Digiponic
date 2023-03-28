@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lowongan, '. $data->posisi ) }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Nomor Hp</th>
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
                                <td><a href="{{ url('data-lowongan/pelamar-detail/' . $data->id) }}" class="btn btn-primary">Detail</a></td>
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
