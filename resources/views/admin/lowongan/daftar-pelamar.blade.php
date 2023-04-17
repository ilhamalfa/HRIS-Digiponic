@extends('layouts.template')

@section('title')

@section('content')
    <a class="btn btn-primary my-2" href="{{ url('data-lowongan') }}">
        <i class="fa-solid fa-left-long"></i>
    </a>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Daftar Kandidat, ' . $data->posisi) }}</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->age }}</td>
                                <td>{{ $data->nomor_hp }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    <a href="{{ url('pelamar-detail/cv/' . $data->id) }}" class="btn btn-primary" target="_blank">CV Detail</a>
                                    @if ($data->status == 'Menunggu')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Menunggu') }}" class="btn btn-success">Interview</a>
                                    @elseif ($data->status == 'Wawancara')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Wawancara') }}" class="btn btn-success">Psikotest</a>
                                    @elseif ($data->status == 'Psikotest')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Psikotest') }}" class="btn btn-success">Offering</a>
                                    @elseif ($data->status == 'Offering')
                                        <a href="#" class="btn btn-success">Accept</a>
                                    @endif
                                    @if ($data->status != 'Diterima' && $data->status != 'Ditolak')
                                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Tolak') }}" class="btn btn-danger">Decline</a>
                                    @endif
                                </td>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
