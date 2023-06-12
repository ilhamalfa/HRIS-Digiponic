@extends('layouts.template')

@section('title', 'Resign List')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">Resign List</h6>
                    </div>
                    <div class="card-body overflow-scroll">
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addResign">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            <span>Add</span>
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-black fw-bold">#</th>
                                    <th scope="col" class="text-black fw-bold">Resign Date</th>
                                    <th scope="col" class="text-black fw-bold">Status</th>
                                    <th scope="col" class="text-black fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                @foreach ($datas as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ date('d-M-Y', strtotime($data->tanggal_resign)) }}</td>
                                        <td>
                                            @if ($data->status_resign == 'Accepted')
                                                <span class="text-success">{{ $data->status_resign }}<i
                                                        class="fa-solid fa-circle-check"></i></span>
                                            @elseif($data->status_resign == 'Declined')
                                                <span class="text-danger">{{ $data->status_resign }}<i
                                                        class="fa-solid fa-circle-xmark"></i></span>
                                            @else
                                                <span class="text-info">{{ $data->status_resign }}<i
                                                        class="fa-solid fa-circle-info"></i></span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->status_resign == 'Accepted')
                                                @if (isset($data->user1->digital_signature))
                                                    <a href="{{ url('pegawai/cetak-sk/resign/' . $data->id) }}"
                                                        class="btn btn-primary">Cetak SK Resign</a>
                                                @else
                                                    <button disabled class="btn btn-danger">SIgnature Not Found</button>
                                                @endif
                                            @else
                                                <button class="btn btn-primary" disabled>Cetak SK Resign</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Modal Form Start --}}
                        <div class="modal fade" id="addResign" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-white border-0">
                                    <div class="modal-header">
                                        <h1 class="modal-title text-black fs-3 fw-bold" id="exampleModalLabel">Form Resign
                                        </h1>
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="fa-solid fa-xmark m-auto"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('pegawai/resign/ajukan-resign/proses') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="mulai" class="text-black fw-bold">Resign Date</label>
                                                <input id="tanggal" type="date"
                                                    class="form-input @error('tanggal_resign') is-invalid @enderror"
                                                    name="tanggal_resign" value="{{ old('tanggal_resign') }}" required
                                                    autocomplete="tanggal_resign">
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
