@extends('layouts.template')

@section('title', 'User Edit')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header d-flex align-items-center">
                        <a href="{{ url('/data-user') }}">
                            <i class="fa-solid fa-left-long fa-2x me-3 text-black"></i>
                        </a>
                        <h6 class="text-black fw-bold fs-3">User Edit</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/data-user/edit-user/update/' . $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-modal d-flex flex-wrap justify-content-center align-items-center w-100">
                                <div class="form-left d-flex flex-column justify-content-start align-items-center">

                                    {{-- Nama --}}
                                    <div class="mb-3 w-75">
                                        <label for="nama" class="form-label text-black">Name</label>
                                        <input type="text" class="form-input" name="nama" id="nama"
                                            value="{{ $data->nama }}" placeholder="Name" autocomplete="off" required>
                                    </div>

                                    {{-- Tanggal Lahir --}}
                                    <div class="mb-3 w-75">
                                        <label for="add-tanggal-lahir" class="text-black">{{ __('Born Date') }}</label>
                                        <input type="date" class="form-input text-black" name="tanggal_lahir"
                                            id="add-tanggal-lahir" value="{{ $data->tanggal_lahir }}"
                                            placeholder="Born Date" required>
                                    </div>
                                    
                                    {{-- Jenis Kelamin --}}
                                    <div class="mb-3 w-75">
                                        <label for="add-jenis-kelamin" class="text-black">{{ __('Select Gender') }}</label>
                                        <div class="d-flex flex-column">
                                            <div class="form-check m-2">
                                                <input type="radio" class="form-check-input" name="jenis_kelamin"
                                                    id="add-male" value="Laki-laki" @checked($data->jenis_kelamin == 'Laki-laki')>
                                                <label for="add-male" class="form-check-label">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input type="radio" class="form-check-input" name="jenis_kelamin"
                                                    id="add-female" value="Perempuan">
                                                <label for="add-female" class="form-check-label"
                                                    @checked($data->jenis_kelamin == 'Perempuan')>
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Nomor HP --}}
                                    <div class="mb-3 w-75">
                                        <label for="nomor-hp" class="form-label text-black">Phone Number</label>
                                        <input type="number" class="form-input" name="nomor_hp" id="nomor-hp"
                                            value="{{ $data->nomor_hp }}" placeholder="Phone Number" autocomplete="off"
                                            required>
                                    </div>

                                    {{-- Status Pernikahan --}}
                                    <div class="mb-3 w-75">
                                        <label for="status-pernikahan" class="text-black">{{ __('Status') }}</label>
                                        <div class="d-flex flex-column">
                                            <div class="form-check m-2">
                                                <input type="radio" class="form-check-input" name="status_pernikahan"
                                                    id="add-lajang" value="Lajang" @checked($data->status_pernikahan == 'Lajang')>
                                                <label for="add-lajang" class="form-check-label">
                                                    Bachelor
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input type="radio" class="form-check-input" name="status_pernikahan"
                                                    id="add-menikah" value="Menikah">
                                                <label for="add-menikah" class="form-check-label"
                                                    @checked($data->status_pernikahan == 'Menikah')>
                                                    Married
                                                </label>
                                            </div>
                                            <div class="form-check m-2">
                                                <input type="radio" class="form-check-input" name="status_pernikahan"
                                                    id="add-cerai" value="Cerai">
                                                <label for="add-cerai" class="form-check-label"
                                                    @checked($data->status_pernikahan == 'Cerai')>
                                                    Divorce
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Jumlah Anak --}}
                                    <div class="mb-3 w-75">
                                        <label for="jumlah-anak" class="form-label text-black">Number of children</label>
                                        <input type="number" class="form-input" name="jumlah_anak" id="jumlah-anak"
                                            value="{{ $data->jumlah_anak }}" disabled="disabled"
                                            placeholder="Number Of Children">
                                    </div>
                                </div>
                                <div class="form-right d-flex flex-column justify-content-center align-items-center">

                                    {{-- Department --}}
                                    <div class="mb-3 w-75">
                                        <label for="department" class="form-label text-black">Department</label>
                                        <select class="form-input" name="department" id="department"
                                            value="{{ old('department') }}">
                                            <option>- Select Department -</option>
                                            <option value="Human Resource" @selected($data->department == 'Human Resource')>Human Resource
                                            </option>
                                            <option value="Sales Marketing" @selected($data->department == 'Sales Marketing')>Sales Marketing
                                            </option>
                                            <option value="Finance Accounting" @selected($data->department == 'Finance Accounting')>Finance
                                                Accounting
                                            </option>
                                            <option value="Production" @selected($data->department == 'Production')>Production</option>
                                        </select>
                                    </div>

                                    {{-- Golongan --}}
                                    <div class="mb-3 w-75">
                                        <label for="golongan" class="form-label text-black">Class</label>
                                        <select class="form-input" name="golongan" id="golongan"
                                            value="{{ old('golongan') }}">
                                            <option>- Select Class -</option>
                                            <option value="Manager/Kadep" @selected($data->golongan == 'Manager/Kadep')>Manager/Kadep
                                            </option>
                                            <option value="Supervisor" @selected($data->golongan == 'Supervisor')>Supervisor</option>
                                            <option value="Staff" @selected($data->golongan == 'Staff')>Staff</option>
                                            <option value="Operator" @selected($data->golongan == 'Operator')>Operator</option>
                                        </select>
                                    </div>

                                    {{-- Provinsi --}}
                                    <div class="mb-3 w-75">
                                        <label for="provinsi" class="form-label text-black">Province</label>
                                        <select class="form-input" name="province_id" id="provinsi"
                                            value="{{ old('province_id') }}">
                                            <option>- Select Province -</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}" @selected($province->id == $data->province_id)>
                                                    {{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Kota/Kabupaten --}}
                                    <div class="mb-3 w-75">
                                        <label for="kabupaten" class="form-label text-black">Regency</label>
                                        <select class="form-input" name="regency_id" id="kabupaten"
                                            value="{{ old('regency_id') }}">
                                            <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                        </select>
                                    </div>

                                    {{-- Kecamatan --}}
                                    <div class="mb-3 w-75">
                                        <label for="kecamatan" class="form-label text-black">District</label>
                                        <select class="form-input" name="district_id" id="kecamatan"
                                            value="{{ old('district_id') }}">
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        </select>
                                    </div>

                                    {{-- Kelurahan --}}
                                    <div class="mb-3 w-75">
                                        <label for="kelurahan" class="form-label text-black">Village</label>
                                        <select class="form-input" name="village_id" id="kelurahan"
                                            value="{{ old('village_id') }}">
                                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                                        </select>
                                    </div>

                                    {{-- Alamat --}}
                                    <div class="mb-3 w-75">
                                        <label for="alamat" class="form-label text-black">Address</label>
                                        <input type="text" class="form-input" name="alamat" id="alamat"
                                            value="{{ $data->alamat }}" placeholder="Address">
                                    </div>
                                    <div class="w100 align-self-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Done') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
