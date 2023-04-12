@extends('layouts.template')

@section('title')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-3">{{ __('Input User Pegawai Baru') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/profile/edit-data-pegawai/update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}">

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">

                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">{{ __('Jenis kelamin') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" @checked($data->jenis_kelamin == 'Laki-laki')>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" @checked($data->jenis_kelamin == 'Perempuan')>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perempuan
                                    </label>
                                </div>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="foto" class="col-md-4 col-form-label text-md-end">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}">

                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nomor_hp" class="col-md-4 col-form-label text-md-end">{{ __('Nomor HP') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_hp" type="number" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" value="{{ $data->nomor_hp }}">

                                @error('nomor_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status_pernikahan" class="col-md-4 col-form-label text-md-end">{{ __('Status Pernikahan') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_pernikahan" id="Lajang" value="Lajang" @checked($data->status_pernikahan == 'Lajang')>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Lajang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_pernikahan" id="Menikah" value="Menikah" @checked($data->status_pernikahan == 'Menikah')>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Menikah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_pernikahan" id="Cerai" value="Cerai" @checked($data->status_pernikahan == 'Cerai')>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cerai
                                    </label>
                                </div>
                                @error('status_pernikahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jumlah_anak" class="col-md-4 col-form-label text-md-end">{{ __('Jumlah Anak') }}</label>

                            <div class="col-md-6">
                                <input id="jumlah_anak" type="number" class="form-control text-white @error('jumlah_anak') is-invalid @enderror" name="jumlah_anak" value="{{ $data->jumlah_anak }}" disabled="disabled">

                                @error('jumlah_anak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <select id="department" class="form-select" aria-label="Default select example" @error('department') is-invalid @enderror" name="department">
                                    <option value="">- Pilih Department -</option>
                                    <option value="Human Resource" @selected($data->department == 'Human Resource')>Human Resource</option>
                                    <option value="Sales Marketing" @selected($data->department == 'Sales Marketing')>Sales Marketing</option>
                                    <option value="Finance Accounting" @selected($data->department == 'Finance Accounting')>Finance Accounting</option>
                                    <option value="Production" @selected($data->department == 'Production')>Production</option>
                                </select>

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="golongan" class="col-md-4 col-form-label text-md-end">{{ __('Golongan') }}</label>

                            <div class="col-md-6">
                                <select id="golongan" class="form-select" aria-label="Default select example" @error('golongan') is-invalid @enderror" name="golongan" value="{{ old('golongan') }}">
                                    <option value="">- Pilih Golongan -</option>
                                    <option value="Manager/Kadep"  @selected($data->golongan == 'Manager/Kadep')>Manager/Kadep</option>
                                    <option value="Supervisor"  @selected($data->golongan == 'Supervisor')>Supervisor</option>
                                    <option value="Staff"  @selected($data->golongan == 'Staff')>Staff</option>
                                    <option value="Operator"  @selected($data->golongan == 'Operator')>Operator</option>
                                </select>

                                @error('golongan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <label for="provinsi" class="col-md-4 col-form-label text-md-end">{{ __('Provinsi') }}</label>

                            <div class="col-md-6">
                                <select id="provinsi" class="form-select" aria-label="Default select example" @error('province_id') is-invalid @enderror" name="province_id" value="{{ old('province_id') }}">
                                    <option value="">- Pilih Provinsi -</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" @selected($province->id == $data->province_id)>{{ $province->name }}</option>
                                    @endforeach
                                </select>

                                @error('province_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kabupaten" class="col-md-4 col-form-label text-md-end">{{ __('Kabupaten/Kota') }}</label>

                            <div class="col-md-6">
                                <select id="kabupaten" class="form-select" aria-label="Default select example" @error('regency_id') is-invalid @enderror" name="regency_id" value="{{ old('regency_id') }}">
                                    <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                </select>

                                @error('regency_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-end">{{ __('Kecamatan') }}</label>

                            <div class="col-md-6">
                                <select id="kecamatan" class="form-select" aria-label="Default select example" @error('district_id') is-invalid @enderror" name="district_id" value="{{ old('district_id') }}">
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                </select>

                                @error('district_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-end">{{ __('Kelurahan') }}</label>

                            <div class="col-md-6">
                                <select id="kelurahan" class="form-select" aria-label="Default select example" @error('village_id') is-invalid @enderror" name="village_id" value="{{ old('village_id') }}">
                                    <option value="{{ $village->id }}">{{ $village->name }}</option>
                                </select>

                                @error('village_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Detail alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $data->alamat }}">

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection