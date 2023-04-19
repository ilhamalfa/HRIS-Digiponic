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
                            <h2 class="card-title">Resign</h2>
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
                                <th scope="col">Tanggal Resign</th>
                                <th scope="col">Status Resign</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->tanggal_resign }}</td>
                                <td>{{ $data->status_resign }}</td>
                                <td>
                                    @if ($data->status_resign == 'Accepted')
                                        <a href="" class="btn btn-primary">Cetak SK Izin</a>
                                    @else
                                        <button class="btn btn-primary" disabled>Cetak SK Resign</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Modal Form Start --}}
                    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Resign</h1>
                                    <button type="button" class="btn btn-outline-danger"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa-solid fa-xmark m-auto"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('pegawai/resign/ajukan-resign/proses') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="mulai">Resign Date</label>
                                            <input id="tanggal" type="date" class="form-control text-white @error('tanggal_resign') is-invalid @enderror" name="tanggal_resign" value="{{ old('tanggal_resign') }}" required autocomplete="tanggal_resign">

                                            @error('tanggal_resign')
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
