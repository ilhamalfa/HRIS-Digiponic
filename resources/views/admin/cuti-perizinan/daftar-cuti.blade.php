@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Data Cuti Pegawai') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Tanggal Cuti</th>
                                <th scope="col">Tanggal Berakhir</th>
                                <th scope="col">Jumlah Hari</th>
                                <th scope="col">Status Cuti</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->user1->nama }}</td>
                                <td>{{ $data->tanggal_mulai }}</td>
                                <td>{{ $data->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $data->status}}</td>
                                <td>
                                    @if ($data->status == 'Accepted')
                                        @if (isset($data->user1->digital_signature))
                                            <a href="{{url('pegawai/cetak-sk/cuti/' . $data->id)}}" class="btn btn-primary">SK Cuti</a>
                                        @else
                                            <button disabled class="btn btn-danger">SIgnature Not Found</button>
                                        @endif
                                    @elseif($data->status == 'Declined')
                                        <button disabled class="btn btn-primary">SK Cuti</button>
                                    @endif
                                </td>
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