@extends('layouts.page')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header m-2">{{ __('Daftar Lamaran') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Posisi</th>
                                <th scope="col">Tanggal Mendaftar</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->lowongan->posisi }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>
                                    @if ($data->status == 'Menunggu')
                                        <p class="text-warning">{{ $data->status}}</p>
                                    @elseif ($data->status != 'Menunggu' || $data->status != 'Ditolak')
                                        <p class="text-success">{{ $data->status}}</p>
                                    @else
                                        <p class="text-danger">{{ $data->status}}</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary">Detail</a>
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
