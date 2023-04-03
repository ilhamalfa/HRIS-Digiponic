@extends('layouts.template')

@section('title')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vacancy Data</h4>
                <a href="{{ url('data-lowongan/tambah-lowongan') }}" class="btn btn-primary">Tambah Lowongan</a>
                </p>
                <div class="table-responsive text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Position </th>
                                <th> Deadline Date </th>
                                <th> Number Of Registrants </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->posisi }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->lamaran->count() . ' Registrans' }}</td>
                                <td class="table-vacancy-actions">
                                    <a href="{{ url('data-lowongan/detail-lowongan/' . $data->id) }}"
                                        class="btn btn-primary my-2">Details Vacancy</a>
                                    <a href="{{ url('data-lowongan/daftar-pelamar/' . $data->id) }}"
                                        class="btn btn-success my-2">List Of Applicants</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
