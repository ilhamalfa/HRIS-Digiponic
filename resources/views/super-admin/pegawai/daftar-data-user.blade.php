@extends('layouts.template')

@section('title', 'User Data')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">User Data</h6>
                    </div>
                    <div class="card-body overflow-scroll">
                        @if (Auth::user()->role == 'SuperAdmin')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                <i class="fa-solid fa-file-circle-plus"></i>
                                <span>Add User</span>
                            </button>
                        @endif
                        <form class="d-flex justify-content-center align-items-center" action="{{ url('/data-user') }}">
                            <div class="form-section pagination-top-box">
                                @isset($datas)
                                    {{ $datas->links('vendor.pagination.design') }}
                                @endisset
                                <span class="text-black">Pagination</span>
                            </div>
                            <div class="form-section search-top-box">
                                <input type="text" class="form-control search-input" id="search-input"
                                    placeholder="Enter NIK or Name" name="search" autofocus>
                            </div>
                            <div class="form-section d-flex search-button-top-box">
                                <button class="btn search-button">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <span class="search-button-text">Search</span>
                                </button>
                            </div>
                        </form>
                        @if (Session::has('success'))
                            <div class="alert alert-success" id="session-alert" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <table class="table mb-4 text-black">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-black fw-bold">#</th>
                                    <th scope="col" class="text-black fw-bold">NIK</th>
                                    <th scope="col" class="text-black fw-bold">Nama</th>
                                    <th scope="col" class="text-black fw-bold">Email</th>
                                    <th scope="col" class="text-black fw-bold">Department</th>
                                    <th scope="col" class="text-black fw-bold">Golongan</th>
                                    @if (Auth::user()->role != 'Admin')
                                        <th scope="col" class="text-black fw-bold">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $index => $data)
                                    <tr>
                                        <th scope="row">{{ $index + $datas->firstItem() }}</th>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->department }}</td>
                                        <td>{{ $data->golongan }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary text-decoration-none"
                                                data-bs-toggle="modal" data-bs-target="#detailUser{{ $data->id }}">
                                                <span>Detail</span>
                                                <i class="fa-solid fa-scroll"></i>
                                            </button>
                                            @if (Auth::user()->role == 'SuperAdmin')
                                                <a class="btn btn-warning text-decoration-none"
                                                    href="{{ url('/data-user/edit-user/' . $data->id) }}">
                                                    <span>Edit</span>
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </a>
                                                @if ($data->id != Auth::user()->id)
                                                    <a href="{{ url('/data-user/delete-user/' . $data->id) }}"
                                                        class="btn btn-danger" disabled>
                                                        <span>Delete</span>
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- Modal Start --}}
                                    {{-- Modal Details Start --}}
                                    <div class="modal fade" id="detailUser{{ $data->id }}" tabindex="-1"
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
                                                                    <input type="number" class="form-input"
                                                                        name="nik" id="add-nik"
                                                                        value="{{ old('nik') }}" placeholder="NIK"
                                                                        autocomplete="off" required>
                                                                </div>

                                                                {{-- Nama --}}
                                                                <div class="mb-3 w-75">
                                                                    <input type="text" class="form-input"
                                                                        name="nama" id="add-nama"
                                                                        value="{{ old('nama') }}" placeholder="Name"
                                                                        autocomplete="off" required>
                                                                </div>

                                                                {{-- Email --}}
                                                                <div class="mb-3 w-75">
                                                                    <input type="email" class="form-input"
                                                                        name="email" id="add-email"
                                                                        value="{{ old('email') }}" placeholder="Email"
                                                                        autocomplete="email" required>
                                                                </div>

                                                                {{-- Tanggal Lahir --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="add-tanggal-lahir"
                                                                        class="text-black">{{ __('Born Date') }}</label>
                                                                    <input type="date" class="form-input text-black"
                                                                        name="tanggal_lahir" id="add-tanggal-lahir"
                                                                        value="{{ old('tanggal_lahir') }}"
                                                                        placeholder="Born Date" required>
                                                                </div>

                                                                {{-- Jenis Kelamin --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="add-jenis-kelamin"
                                                                        class="text-black">{{ __('Select Gender') }}</label>
                                                                    <div class="d-flex flex-column">
                                                                        <div class="form-check m-2">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="jenis_kelamin" id="add-male"
                                                                                value="Laki-laki">
                                                                            <label for="add-male"
                                                                                class="form-check-label">
                                                                                Male
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check m-2">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="jenis_kelamin" id="add-female"
                                                                                value="Perempuan">
                                                                            <label for="add-female"
                                                                                class="form-check-label">
                                                                                Female
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- Nomor HP --}}
                                                                <div class="mb-3 w-75">
                                                                    <input type="number" class="form-input"
                                                                        name="nomor_hp" id="add-nomor-hp"
                                                                        value="{{ old('nomor_hp') }}"
                                                                        placeholder="Phone Number" autocomplete="off"
                                                                        required>
                                                                </div>

                                                                {{-- Status Pernikahan --}}
                                                                <div class="mb-3 w-75">
                                                                    <label for="status-pernikahan"
                                                                        class="text-black">{{ __('Status') }}</label>
                                                                    <div class="d-flex flex-column">
                                                                        <div class="form-check m-2">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="status_pernikahan" id="add-lajang"
                                                                                value="Lajang">
                                                                            <label for="add-lajang"
                                                                                class="form-check-label">
                                                                                Bachelor
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check m-2">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="status_pernikahan" id="add-menikah"
                                                                                value="Menikah">
                                                                            <label for="add-menikah"
                                                                                class="form-check-label">
                                                                                Married
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check m-2">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="status_pernikahan" id="add-cerai"
                                                                                value="Cerai">
                                                                            <label for="add-cerai"
                                                                                class="form-check-label">
                                                                                Divorce
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- Jumlah Anak --}}
                                                                <div class="mb-3 w-75">
                                                                    <input type="number" class="form-input"
                                                                        name="jumlah_anak" id="add-jumlah-anak"
                                                                        value="{{ old('jumlah_anak') }}"
                                                                        disabled="disabled"
                                                                        placeholder="Number Of Children">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-right d-flex flex-column justify-content-center align-items-center">

                                                                {{-- Department --}}
                                                                <div class="mb-3 w-75">
                                                                    <select class="form-input" name="department"
                                                                        id="add-department"
                                                                        value="{{ old('department') }}">
                                                                        <option>- Select Department -</option>
                                                                        <option value="Human Resource">Human Resource
                                                                        </option>
                                                                        <option value="Sales Marketing">Sales Marketing
                                                                        </option>
                                                                        <option value="Finance Accounting">Finance
                                                                            Accounting
                                                                        </option>
                                                                        <option value="Production">Production</option>
                                                                    </select>
                                                                </div>

                                                                {{-- Golongan --}}
                                                                <div class="mb-3 w-75">
                                                                    <select class="form-input" name="golongan"
                                                                        id="add-golongan" value="{{ old('golongan') }}">
                                                                        <option>- Select Class -</option>
                                                                        <option value="Manager/Kadep">Manager/Kadep
                                                                        </option>
                                                                        <option value="Supervisor">Supervisor</option>
                                                                        <option value="Staff">Staff</option>
                                                                        <option value="Operator">Operator</option>
                                                                    </select>
                                                                </div>

                                                                {{-- Provinsi --}}
                                                                <div class="mb-3 w-75">
                                                                    <select class="form-input" name="province_id"
                                                                        id="provinsi" value="{{ old('province_id') }}">
                                                                        <option>- Select Province -</option>
                                                                        @foreach ($provinces as $province)
                                                                            <option value="{{ $province->id }}">
                                                                                {{ $province->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                {{-- Kota/Kabupaten --}}
                                                                <div class="mb-3 w-75">
                                                                    <select class="form-input" name="regency_id"
                                                                        id="kabupaten" value="{{ old('regency_id') }}">
                                                                        <option>- Select Regency/City -</option>
                                                                    </select>
                                                                </div>

                                                                {{-- Kecamatan --}}
                                                                <div class="mb-3 w-75">
                                                                    <select class="form-input" name="district_id"
                                                                        id="kecamatan" value="{{ old('district_id') }}">
                                                                        <option>- Pilih District -</option>
                                                                    </select>
                                                                </div>

                                                                {{-- Kelurahan --}}
                                                                <div class="mb-3 w-75">
                                                                    <select class="form-input" name="village_id"
                                                                        id="kelurahan" value="{{ old('village_id') }}">
                                                                        <option>- Select Village -</option>
                                                                    </select>
                                                                </div>

                                                                {{-- Alamat --}}
                                                                <div class="mb-3 w-75">
                                                                    <input type="text" class="form-input"
                                                                        name="alamat" id="add-alamat"
                                                                        value="{{ old('alamat') }}"
                                                                        placeholder="Address">
                                                                </div>

                                                                {{-- Password --}}
                                                                <div class="mb-3 w-75 position-relative">
                                                                    <input type="password" class="form-input"
                                                                        name="password" id="new-password"
                                                                        placeholder="Password" autocomplete="new-password"
                                                                        required>
                                                                    <i class="fa-solid fa-eye password-icon-eye text-black"
                                                                        id="new-password-icon-eye"></i>
                                                                    <i class="fa-solid fa-eye-slash password-icon-eye-slash text-black"
                                                                        id="new-password-icon-eye-slash"></i>
                                                                </div>
                                                                <div class="mb-3 w-75 position-relative">
                                                                    <input type="password" class="form-input"
                                                                        name="password_confirmation" id="confirm-password"
                                                                        placeholder="Confirm Password"
                                                                        autocomplete="new-password" required>
                                                                    <i class="fa-solid fa-eye password-icon-eye text-black"
                                                                        id="confirm-password-icon-eye"></i>
                                                                    <i class="fa-solid fa-eye-slash password-icon-eye-slash text-black"
                                                                        id="confirm-password-icon-eye-slash"></i>
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
                        <div class="pagination-bottom-box">
                            @isset($datas)
                                {{ $datas->links('vendor.pagination.design') }}
                            @endisset
                            <span class="text-black">Pagination</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
