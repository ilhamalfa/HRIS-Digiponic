@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Detail Pelamar, '. $data->user->nama ) }}</div>

                <div class="card-body text-center">
                    {{-- <img src="{{ asset('storage/' . $data->user->foto) }}" alt="" class="img d-inline-block h-25"> --}}
                    <h6>{{ "Nama : ". $data->user->pelamar->nama }}</h6>
                    <h6>{{ "Tanggal Lahir : ". date('d-m-Y', strtotime($data->user->pelamar->tanggal_lahir)) }}</h6>
                    <h6>{{ "Umur : ". $data->user->pelamar->umur . " Tahun" }}</h6>
                    <h6>{{ "Alamat : ". $data->user->alamat . ", Kelurahan " . $data->user->pelamar->kelurahan->name . ", Kecamatan " . $data->user->pelamar->kecamatan->name . ", " . $data->user->pelamar->kabupaten->name . ", " . $data->user->pelamar->provinsi->name  }}</h6>
                    <h6>{{ "Jenis Kelamin : ". $data->user->pelamar->jenis_kelamin }}</h6>
                    <h6>{{ "Nomor Hp : ". $data->user->pelamar->nomor_hp }}</h6>
                    <h6>{{ "email : ". $data->user->pelamar->email }}</h6>
                    <h6>{{ "Status : ". $data->status }}</h6>
                    <h6><a href="{{ url('pelamar-detail/download-cv/' . $data->user->pelamar->id) }}" target="_blank">Lihat CV Pelamar</a></h6>
                    <img src="{{ asset('storage/' . $data->user->pelamar->foto) }}" alt="" style="height: 300px"> <br>
                    <a href="" class="btn btn-primary mt-3">Lanjut tahap Selanjutnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
