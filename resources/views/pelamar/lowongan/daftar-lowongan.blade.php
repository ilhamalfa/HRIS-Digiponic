@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lowongan') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Posisi</th>
                                <th scope="col">Tanggal Dateline</th>
                                <th scope="col">Jumlah Pendaftar</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->posisi }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->lamaran->count() . " Pendaftar"}}</td>
                                <td>
                                    @if($data->lamaran()->where('user_id', auth()->user()->id)->exists())
                                        <h6 class="text-success">Sudah Melamar</h6>
                                    @else
                                        <a href="{{ url('/pelamar/lowongan/apply/' . $data->id) }}" class="btn btn-primary">Daftar</a>
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
</div>
@endsection
