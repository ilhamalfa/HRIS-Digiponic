@extends('layouts.template')

@section('title', 'Leave List')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">Leave List</h6>
                    </div>
                    <div class="card-body overflow-scroll">
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addLeave">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            <span>Add</span>
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-black fw-bold">#</th>
                                    <th scope="col" class="text-black fw-bold">Leave Date</th>
                                    <th scope="col" class="text-black fw-bold">End Date</th>
                                    <th scope="col" class="text-black fw-bold">Total Days</th>
                                    <th scope="col" class="text-black fw-bold">Status</th>
                                    <th scope="col" class="text-black fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->tanggal_mulai }}</td>
                                        <td>{{ $data->tanggal_berakhir }}</td>
                                        <td>{{ date_diff(date_create($data->tanggal_mulai), date_create($data->tanggal_berakhir))->days + 1 . ' Hari' }}
                                        </td>
                                        <td>{{ $data->status }}</td>
                                        <td>
                                            @if ($data->status == 'Accepted')
                                                @if (isset($data->user1->digital_signature) && isset($data->user2->digital_signature))
                                                    <a href="{{ url('pegawai/cetak-sk/cuti/' . $data->id) }}"
                                                        class="btn btn-primary">Cetak SK Cuti</a>
                                                @else
                                                    <button disabled class="btn btn-danger">SIgnature Not Found</button>
                                                @endif
                                            @else
                                                <button class="btn btn-primary" disabled>Cetak SK Izin</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            {{-- Modal Form Start --}}
                            <div class="modal fade" id="addLeave" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-white border-0">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-3 fw-bold text-black" id="exampleModalLabel">Leave Form</h1>
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fa-solid fa-xmark m-auto"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="mb-3 text-black">Remaining Leave Days : {{ Auth::user()->jumlah_cuti }} Days</h6>
                                            <p class="text-black">You can take leave, 3 days after today</p>
                                            <form action="{{ url('pegawai/cuti/ajukan-cuti/proses') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input class="form-check-input" type="checkbox" id="checkBox"
                                                        name="check" class="form-input text-black"
                                                        onclick="checkboxFunction()">
                                                    <label class="form-check-label mt-2 ml-3 text-black" for="checkbox">
                                                        More Than a day
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mulai" class="text-black">Start Date</label>
                                                    <input id="mulai" type="date"
                                                        class="form-input @error('tanggal_mulai') is-invalid @enderror"
                                                        name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required
                                                        autocomplete="tanggal_mulai">
                                                    @error('tanggal_mulai')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="berakhir" class="text-black">End Date</label>
                                                    <input id="berakhir" type="date"
                                                        class="form-input @error('tanggal_berakhir') is-invalid @enderror"
                                                        name="tanggal_berakhir" required autocomplete="tanggal_berakhir"
                                                        disabled>
                                                    @error('tanggal_berakhir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="alasan" class="text-black">Reason</label>
                                                    <input id="alasan" type="text"
                                                        class="form-input @error('alasan') is-invalid @enderror"
                                                        name="alasan" required autocomplete="alasan"
                                                        value="{{ old('alasan') }}">
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
