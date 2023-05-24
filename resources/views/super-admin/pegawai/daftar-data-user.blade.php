@extends('layouts.template')

@section('title', 'User Data')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header mt-3 text-black bg-white">{{ __('Data User') }}</div>

                    <div class="card-body overflow-scroll">
                        @if (Auth::user()->role == 'SuperAdmin')
                            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                data-bs-target="#addUser">
                                <i class="fa-solid fa-file-circle-plus"></i>
                                <span>Add User</span>
                            </button>
                        @endif
                        <div class="row mb-3 mx-1">
                            <form class="nav-link d-none d-lg-flex search align-items-center"
                                action="{{ url('/data-user') }}">
                                <div class="col-6">
                                    <input type="text" class="form-control search-input" id="search-input"
                                        placeholder="Enter NIK or Name" name="search" autofocus>
                                </div>
                                <div class="col-2 mx-1">
                                    <button class="btn search-button mt-1 w-75"><i
                                            class="fa-solid fa-magnifying-glass"></i>Search</button>
                                </div>
                            </form>
                        </div>
                        <table class="table mb-4 text-black">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-black">#</th>
                                    <th scope="col" class="text-black">NIK</th>
                                    <th scope="col" class="text-black">Nama</th>
                                    <th scope="col" class="text-black">Email</th>
                                    <th scope="col" class="text-black">Department</th>
                                    <th scope="col" class="text-black">Golongan</th>
                                    @if (Auth::user()->role != 'Admin')
                                        <th scope="col" class="text-black">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->department }}</td>
                                        <td>{{ $data->golongan }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary text-decoration-none"
                                                data-bs-toggle="modal" data-bs-target="#detail-user{{ $data->id }}">
                                                <span>Detail</span>
                                            </button>
                                            {{-- <a href="{{ url('/data-user/detail-user/' . $data->id) }}" class="btn btn-primary" disabled>Detail</a> --}}
                                            @if (Auth::user()->role == 'Super Admin')
                                                <a href="{{ url('/data-user/edit-user/' . $data->id) }}"
                                                    class="btn btn-warning" disabled>Edit</a>
                                                @if ($data->id != Auth::user()->id)
                                                    <a href="{{ url('/data-user/delete-user/' . $data->id) }}"
                                                        class="btn btn-danger" disabled>Delete</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- Modal Start --}}
                                    {{-- Modal Details Start --}}
                                    <div class="modal fade" id="detail-user{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-white text-black border-0">
                                                <div class="modal-header border-secondary">
                                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Details</h1>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa-solid fa-xmark m-auto"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body fw-bold">
                                                    <p>NIK : <span class="fw-normal">{{ $data->nik }}</span></p>
                                                    <p>Nama : <span class="fw-normal">{{ $data->nama }}</span></p>
                                                    <p>E-mail : <span class="fw-normal">{{ $data->email }}</span></p>
                                                    <p>Jumlah Cuti : <span
                                                            class="fw-normal">{{ $data->jumlah_cuti }}</span></p>
                                                    <p>Address :</p>
                                                    <p class="fw-normal">
                                                        {{ $data->alamat . ', ' . $data->kelurahan->name . ', ' . $data->kecamatan->name . ', ' . $data->kabupaten->name . ', ' . $data->provinsi->name }}
                                                    </p>
                                                    <p>Jenis Kelamin : <span
                                                            class="fw-normal">{{ $data->jenis_kelamin }}</span></p>
                                                    <p>Tanggal Lahir : <span
                                                            class="fw-normal">{{ $data->tanggal_lahir }}</span></p>
                                                    <p>Umur : <span
                                                            class="fw-normal">{{ \Carbon\Carbon::parse($data->tanggal_lahir)->age }}
                                                            Tahun</span></p>
                                                    <p>Nomor HP : <span class="fw-normal">{{ $data->nomor_hp }}</span></p>
                                                    <p>Status Pernikahan : <span
                                                            class="fw-normal">{{ $data->status_pernikahan }}</span></p>
                                                    @if ($data->status_pernikahan != 'Lajang')
                                                        <p>Jumlah Anak : <span
                                                                class="fw-normal">{{ $data->jumlah_anak }}</span></p>
                                                    @endif
                                                    <p>Department : <span class="fw-normal">{{ $data->department }}</span>
                                                    </p>
                                                    <p>Golongan : <span class="fw-normal">{{ $data->golongan }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Details End --}}
                                    {{-- Modal Add User Start --}}
                                    <div class="modal fade" id="addUser" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content bg-white">
                                                <div class="modal-header">
                                                    <h1 class="text-black fs-3 ms-3 fw-bold" id="exampleModalLabel">Add User
                                                    </h1>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa-solid fa-xmark m-auto"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ url('/data-user/store-user') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div
                                                            class="form-modal d-flex flex-wrap justify-content-center align-items-center w-100">
                                                            <div
                                                                class="form-left d-flex flex-column justify-content-start align-items-center">
                                                                {{-- NIK --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="nik"
                                                                        class="d-none">{{ __('NIK') }}</label>

                                                                    <input id="nik" type="number"
                                                                        class="form-input @error('nik') is-invalid @enderror"
                                                                        name="nik" value="{{ old('nik') }}"
                                                                        placeholder="NIK" required autocomplete="nik">

                                                                    @error('nik')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Nama --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="nama"
                                                                        class="d-none">{{ __('Nama') }}</label>

                                                                    <input id="nama" type="text"
                                                                        class="form-input @error('nama') is-invalid @enderror"
                                                                        name="nama" value="{{ old('nama') }}"
                                                                        placeholder="Name">

                                                                    @error('nama')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Email --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="email"
                                                                        class="d-none">{{ __('Email Address') }}</label>

                                                                    <input id="email" type="email"
                                                                        class="form-input @error('email') is-invalid @enderror"
                                                                        name="email" value="{{ old('email') }}"
                                                                        required autocomplete="email" placeholder="Email">

                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Tanggal Lahir --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="tanggal_lahir"
                                                                        class="d-none">{{ __('Tanggal lahir') }}</label>

                                                                    <input id="tanggal_lahir" type="date"
                                                                        class="form-input text-black @error('tanggal_lahir') is-invalid @enderror"
                                                                        name="tanggal_lahir"
                                                                        value="{{ old('tanggal_lahir') }}"
                                                                        placeholder="Born Date">

                                                                    @error('tanggal_lahir')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Jenis Kelamin --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="jenis_kelamin"
                                                                        class="text-black">{{ __('Jenis kelamin') }}</label>

                                                                    <div class="d-flex flex-column">
                                                                        <div class="form-check m-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="jenis_kelamin" id="jenis_kelamin"
                                                                                value="Laki-laki">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
                                                                                Laki-laki
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check m-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="jenis_kelamin" id="jenis_kelamin"
                                                                                value="Perempuan">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
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

                                                                {{-- Nomor HP --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="nomor_hp"
                                                                        class="d-none">{{ __('Nomor HP') }}</label>

                                                                    <input id="nomor_hp" type="number"
                                                                        class="form-input @error('nomor_hp') is-invalid @enderror"
                                                                        name="nomor_hp" value="{{ old('nomor_hp') }}"
                                                                        placeholder="Phone Number">

                                                                    @error('nomor_hp')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Status Pernikahan --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="status_pernikahan"
                                                                        class="text-black">{{ __('Status Pernikahan') }}</label>

                                                                    <div class="d-flex flex-column">
                                                                        <div class="form-check m-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="status_pernikahan" id="Lajang"
                                                                                value="Lajang">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
                                                                                Lajang
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check m-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="status_pernikahan" id="Menikah"
                                                                                value="Menikah">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
                                                                                Menikah
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check m-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="status_pernikahan" id="Cerai"
                                                                                value="Cerai">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
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

                                                                {{-- Jumlah Anak --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="jumlah_anak"
                                                                        class="d-none">{{ __('Jumlah Anak') }}</label>

                                                                    <input id="jumlah_anak" type="number"
                                                                        class="form-input @error('jumlah_anak') is-invalid @enderror"
                                                                        name="jumlah_anak"
                                                                        value="{{ old('jumlah_anak') }}"
                                                                        disabled="disabled"
                                                                        placeholder="Number Of Children">

                                                                    @error('jumlah_anak')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-right d-flex flex-column justify-content-center align-items-center">

                                                                {{-- Department --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="department"
                                                                        class="d-none">{{ __('Department') }}</label>

                                                                    <select id="department" class="form-input"
                                                                        aria-label="Default select example"
                                                                        @error('department') is-invalid @enderror"
                                                                        name="department"
                                                                        value="{{ old('department') }}">
                                                                        <option>- Pilih Department -</option>
                                                                        <option value="Human Resource">Human Resource
                                                                        </option>
                                                                        <option value="Sales Marketing">Sales Marketing
                                                                        </option>
                                                                        <option value="Finance Accounting">Finance
                                                                            Accounting
                                                                        </option>
                                                                        <option value="Production">Production</option>
                                                                    </select>

                                                                    @error('department')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Golongan --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="golongan"
                                                                        class="d-none">{{ __('Golongan') }}</label>

                                                                    <select id="golongan" class="form-input"
                                                                        aria-label="Default select example"
                                                                        @error('golongan') is-invalid @enderror"
                                                                        name="golongan" value="{{ old('golongan') }}">
                                                                        <option>- Pilih Golongan -</option>
                                                                        <option value="Manager/Kadep">Manager/Kadep
                                                                        </option>
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

                                                                {{-- Provinsi --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="provinsi"
                                                                        class="d-none">{{ __('Provinsi') }}</label>

                                                                    <select id="provinsi" class="form-input"
                                                                        aria-label="Default select example"
                                                                        @error('province_id') is-invalid @enderror"
                                                                        name="province_id"
                                                                        value="{{ old('province_id') }}">
                                                                        <option>- Pilih Provinsi -</option>
                                                                        @foreach ($provinces as $province)
                                                                            <option value="{{ $province->id }}">
                                                                                {{ $province->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error('province_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Kota/Kabupaten --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="kabupaten"
                                                                        class="d-none">{{ __('Kabupaten/Kota') }}</label>

                                                                    <select id="kabupaten" class="form-input"
                                                                        aria-label="Default select example"
                                                                        @error('regency_id') is-invalid @enderror"
                                                                        name="regency_id"
                                                                        value="{{ old('regency_id') }}">
                                                                        <option>- Pilih Kabupaten/Kota -</option>
                                                                    </select>

                                                                    @error('regency_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Kecamatan --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="kecamatan"
                                                                        class="d-none">{{ __('Kecamatan') }}</label>

                                                                    <select id="kecamatan" class="form-input"
                                                                        aria-label="Default select example"
                                                                        @error('district_id') is-invalid @enderror"
                                                                        name="district_id"
                                                                        value="{{ old('district_id') }}">
                                                                        <option>- Pilih Kecamatan -</option>
                                                                    </select>

                                                                    @error('district_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Kelurahan --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="kelurahan"
                                                                        class="d-none">{{ __('Kelurahan') }}</label>

                                                                    <select id="kelurahan" class="form-input"
                                                                        aria-label="Default select example"
                                                                        @error('village_id') is-invalid @enderror"
                                                                        name="village_id"
                                                                        value="{{ old('village_id') }}">
                                                                        <option>- Pilih Kelurahan -</option>
                                                                    </select>

                                                                    @error('village_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Alamat --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="alamat"
                                                                        class="d-none">{{ __('Detail alamat') }}</label>

                                                                    <input id="alamat" type="text"
                                                                        class="form-input @error('alamat') is-invalid @enderror"
                                                                        name="alamat" value="{{ old('alamat') }}"
                                                                        placeholder="Address">

                                                                    @error('alamat')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>


                                                                {{-- Password --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="password"
                                                                        class="d-none">{{ __('Password') }}</label>

                                                                    <input id="password" type="password"
                                                                        class="form-input @error('password') is-invalid @enderror"
                                                                        name="password" required
                                                                        autocomplete="new-password"
                                                                        placeholder="Password">

                                                                    @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3 w-75">
                                                                    <label for="password-confirm"
                                                                        class="d-none">{{ __('Confirm Password') }}</label>

                                                                    <input id="password-confirm" type="password"
                                                                        class="form-input" name="password_confirmation"
                                                                        required autocomplete="new-password"
                                                                        placeholder="Confirm Password">
                                                                </div>

                                                                <div class="w100 align-self-center">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ __('Register') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Add User End --}}
                                    {{-- Modal End --}}
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
