@extends('layouts.page')

@section('title', 'Vacancy List')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card text-start">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Vacancy List</h1>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Position</th>
                                <th>Dateline Date</th>
                                <th>Number Of Registrants</th>
                                <th>Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->posisi }}</td>
                                    @if ($data->tanggal == date("Y-m-d"))
                                        <td class="bg-danger text-white m-2">{{ date('d F Y', strtotime($data->tanggal)) }}</td>
                                    @else
                                        <td>{{ date('d F Y', strtotime($data->tanggal)) }}</td>
                                    @endif
                                    <td>
                                        {{ $data->lamaran->count() }}
                                        @if ($data->lamaran->count() == 1)
                                            <i class="fa-solid fa-user-tie text-success"></i>
                                        @else
                                            <i class="fa-solid fa-user-tie text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->lamaran()->where('user_id', auth()->user()->id)->exists())
                                            <h6 class="text-success">
                                                Already Apply
                                                <i class="fa-solid fa-square-check text-success"></i>
                                            </h6>
                                        @else
                                            <a href="{{ url('/pelamar/lowongan/apply/' . $data->id) }}"
                                                class="btn btn-primary">Apply</a>
                                        @endif
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
