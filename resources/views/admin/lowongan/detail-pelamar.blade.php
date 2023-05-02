@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header m-3">{{ __('Detail Pelamar, '. $data->user->pelamar->nama ) }}</div>

                <div class="card-body text-center">
                    {{-- <img src="{{ asset('storage/' . $data->user->foto) }}" alt="" class="img d-inline-block h-25"> --}}
                    <h6>{{ "Nama : ". $data->user->pelamar->nama }}</h6>
                    <h6>{{ "Tanggal Lahir : ". date('d-m-Y', strtotime($data->user->pelamar->tanggal_lahir)) }}</h6>
                    <h6>{{ "Umur : ". $data->user->pelamar->umur . " Tahun" }}</h6>
                    <h6>{{ "Alamat : ". $data->user->pelamar->alamat . ", Kelurahan " . $data->user->pelamar->kelurahan->name . ", Kecamatan " . $data->user->pelamar->kecamatan->name . ", " . $data->user->pelamar->kabupaten->name . ", " . $data->user->pelamar->provinsi->name  }}</h6>
                    <h6>{{ "Jenis Kelamin : ". $data->user->pelamar->jenis_kelamin }}</h6>
                    <h6>{{ "Nomor Hp : ". $data->user->pelamar->nomor_hp }}</h6>
                    <h6>{{ "email : ". $data->user->pelamar->email }}</h6>
                    <h6>
                        @if ($data->status == 'Ditolak')
                            <h6 class="text-danger">{{$data->status }}</h6>
                        @else
                            <h6 class="text-success">{{$data->status }}</h6>
                        @endif
                    </h6>
                    <h6><a href="{{ url('pelamar-detail/cv/' . $data->user->pelamar->id) }}" target="_blank">Lihat CV Pelamar</a></h6>
                    <img src="{{ asset('storage/' . $data->user->pelamar->foto) }}" alt="" style="height: 300px"> <br>
                    @if ($data->status == 'Menunggu')
                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Menunggu') }}" class="btn btn-primary mt-2">Lanjut tahap Wawancara</a>
                    @elseif ($data->status == 'Wawancara')
                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Wawancara') }}" class="btn btn-primary mt-2">Lanjut tahap Psikotest</a>
                    @elseif ($data->status == 'Psikotest')
                        <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Psikotest') }}" class="btn btn-primary mt-2">Lanjut tahap Offering</a>
                    @elseif ($data->status == 'Offering')
                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#terimaModal">
                        Terima
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="terimaModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pegawai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ url('data-lowongan/pelamar-detail/terima/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal-body">
                                            {{-- NIK --}}
                                            <div class="row mb-3">
                                                <label for="nik" class="col-md-4 col-form-label text-md-end">{{ __('NIK') }}</label>

                                                <div class="col-md-6">
                                                    <input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik">

                                                    @error('nik')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Department --}}
                                            <div class="row mb-3">
                                                <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
                    
                                                <div class="col-md-6">
                                                    <select id="department" class="form-select" aria-label="Default select example" @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}">
                                                        <option>- Pilih Department -</option>
                                                        <option value="Human Resource">Human Resource</option>
                                                        <option value="Sales Marketing">Sales Marketing</option>
                                                        <option value="Finance Accounting">Finance Accounting</option>
                                                        <option value="Production">Production</option>
                                                    </select>
                    
                                                    @error('department')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Golongan --}}
                                            <div class="row mb-3">
                                                <label for="golongan" class="col-md-4 col-form-label text-md-end">{{ __('Golongan') }}</label>

                                                <div class="col-md-6">
                                                    <select id="golongan" class="form-select" aria-label="Default select example" @error('golongan') is-invalid @enderror" name="golongan" value="{{ old('golongan') }}">
                                                        <option>- Pilih Golongan -</option>
                                                        <option value="Manager/Kadep">Manager/Kadep</option>
                                                        <option value="Supervisor">Supervisor</option>
                                                        <option value="Staff">Staff</option>
                                                        <option value="Operator">Operator</option>
                                                    </select>

                                                    @error('golongan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ $data->user->pelamar->foto }}" hidden>
            
                                            @error('foto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($data->status != 'Diterima' && $data->status != 'Ditolak')
                    <a href="{{ url('data-lowongan/pelamar-detail/ubah-status/' . $data->id .'/Tolak') }}" class="btn btn-danger mt-2">Tolak</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection