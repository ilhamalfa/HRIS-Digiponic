@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-header d-flex justify-between mb-3">
                        <div class="table-header-left">
                            <h2 class="card-title">Daftar Cuti</h2>
                            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalForm">
                                <i class="fa-solid fa-file-circle-plus"></i>
                                <span>Add</span>
                            </button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
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
                                <td>{{ $data->tanggal_mulai }}</td>
                                <td>{{ $data->tanggal_berakhir }}</td>
                                <td>{{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . " Hari" }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    @if ($data->status == 'Accepted')
                                        <a href="" class="btn btn-primary">Cetak SK Izin</a>
                                    @else
                                        <button class="btn btn-primary" disabled>Cetak SK Izin</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        {{-- Modal Form Start --}}
                        <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Cuti</h1>
                                        <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-xmark m-auto"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="mb-3">Sisa Cuti : {{ Auth::user()->jumlah_cuti }} Hari</h6>
                                        <form action="{{ url('pegawai/cuti/ajukan-cuti/proses') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-check-input" type="checkbox" id="checkBox" name="check" class="form-control text-white" onclick="checkboxFunction()">
                                                <label class="form-check-label mt-2 ml-3" for="checkbox">
                                                    More Than a day
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="mulai">Start Date</label>
                                                <input id="mulai" type="date" class="form-control text-white @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required autocomplete="tanggal_mulai">

                                                @error('tanggal_mulai')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="berakhir">End Date</label>
                                                <input id="berakhir" type="date" class="form-control text-white @error('tanggal_berakhir') is-invalid @enderror" name="tanggal_berakhir" required autocomplete="tanggal_berakhir" disabled>

                                                @error('tanggal_berakhir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alasan">Alasan</label>
                                                <input id="alasan" type="text" class="form-control text-white @error('alasan') is-invalid @enderror" name="alasan" required autocomplete="alasan" value="{{ old('alasan') }}">

                                                @error('alasan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary me-2">
                                                <span>Add</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Form End --}}

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection