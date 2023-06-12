@extends('layouts.template')

@section('title', 'Account Settings')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12 mb-2">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">Change Profile Picture</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-black fw-bold fs-5">Image Preview</h6>
                                @if (isset(Auth::user()->foto))
                                    <img class="img-preview d-block" src="{{ asset('storage/' . Auth::user()->foto) }}"
                                        alt="Profile Picture">
                                @else
                                    <img class="img-preview d-block"
                                        src="{{ asset('storage/Pegawai/default/profile-user-black.png') }}"
                                        alt="Profile Picture" width="200">
                                @endif
                            </div>
                            <div class="col">
                                <h6 class="card-title text-black fw-bold">Update Your Photo</h6>
                                <input type="file" name="image" class="image form-input">
                                <div class="note mt-3 text-black">
                                    <p><i class="fa-solid fa-circle-info me-2 text-info"></i>Note :</p>
                                    <p class="d-flex">
                                        <span>1.</span>
                                        <span class="ms-1">Don't upload photos that contain adult, discriminatory content,
                                            or content
                                            that harms others.</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>2.</span>
                                        <span class="ms-1">Make sure you upload photos that are the right size so they
                                            don't take up a
                                            lot of storage space and slow down the upload process. Max 200kb!</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content bg-white border-0">
                                <div class="modal-header border-0">
                                    <h1 class="text-black fw-bold fs-3" id="exampleModalLabel">Crop Your Image
                                    </h1>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa-solid fa-xmark m-auto"></i>
                                    </button>
                                </div>
                                <div class="modal-body border-0">
                                    <div class="img-container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="ms-2">Image Preview</h6>
                                                <div class="preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin mb-2">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">Change Password</h6>
                    </div>
                    <div class="card-body">
                        <form class="form-sample" action="{{ url('/Account/account-setting/update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="mb-3">
                                            <label class="col-sm-3 col-form-label" for="email">Your Email</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-input @error('email') is-invalid @enderror"
                                                    name="email" value="{{ Auth::user()->email }}" required
                                                    autocomplete="email" id="email" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-sm-3 col-form-label text-black fw-bold" for="new-password">New Password</label>
                                            <div class="col-sm-9 position-relative">
                                                <input type="password"
                                                    class="form-input @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    id="new-password" />
                                                <i class="fa-solid fa-eye password-icon-eye text-black" id="new-password-icon-eye"></i>
                                                <i class="fa-solid fa-eye-slash password-icon-eye-slash text-black"
                                                    id="new-password-icon-eye-slash"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-sm-3 col-form-label text-black fw-bold" for="confirm-password">Confirm
                                                Password</label>
                                            <div class="col-sm-9 position-relative">
                                                <input type="password" class="form-input"
                                                    name="password_confirmation" required autocomplete="new-password"
                                                    id="confirm-password" />
                                                <i class="fa-solid fa-eye password-icon-eye text-black"
                                                    id="confirm-password-icon-eye"></i>
                                                <i class="fa-solid fa-eye-slash password-icon-eye-slash text-black"
                                                    id="confirm-password-icon-eye-slash"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="note mt-3 text-black">
                                            <p><i class="fa-solid fa-circle-info me-2 text-info"></i>Note :</p>
                                            <p class="d-flex">
                                                <span>1.</span>
                                                <span class="ms-1">Use a strong and secure password. A good password
                                                    consists of a combination of upper and lower case letters, numbers and
                                                    symbols.</span>
                                            </p>
                                            <p class="d-flex">
                                                <span>2.</span>
                                                <span class="ms-1">Do not use easily guessable personal information such
                                                    as birthday, name or telephone number as part of your password.</span>
                                            </p>
                                            <p class="d-flex">
                                                <span>3.</span>
                                                <span class="ms-1">Change passwords regularly, at least every 6
                                                    months.</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">Change Personal Data</h6>
                    </div>
                    <div class="card-body">
                        <form class="form-sample" method="POST" action="{{ url('/profile/edit-data-pegawai/update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <p class="card-description text-black fw-bold"> Personal info </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="name">Name</label>
                                        <div class="col-sm-9">
                                            <input id="name" type="text"
                                                class="form-input @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ $data->nama }}">
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="born_date">Date Of Birth</label>
                                        <div class="col-sm-9">
                                            <input id="born_date" type="date"
                                                class="form-input @error('tanggal_lahir') is-invalid @enderror"
                                                name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                                            @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold">Gender</label>
                                        <div class="col-sm-9 d-flex">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="jenis_kelamin" value="Laki-laki" @checked($data->jenis_kelamin == 'Laki-laki')>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="form-check ms-3">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="jenis_kelamin" value="Perempuan" @checked($data->jenis_kelamin == 'Perempuan')>
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="status">Status</label>
                                        <div class="col-sm-9 d-flex">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="status_pernikahan"
                                                    id="Lajang" value="Lajang" @checked($data->status_pernikahan == 'Lajang')>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Single
                                                </label>
                                            </div>
                                            <div class="form-check mx-3">
                                                <input class="form-check-input" type="radio" name="status_pernikahan"
                                                    id="Menikah" value="Menikah" @checked($data->status_pernikahan == 'Menikah')>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Married
                                                </label>
                                            </div>
                                            <div class="form-check ms-3">
                                                <input class="form-check-input" type="radio" name="status_pernikahan"
                                                    id="Cerai" value="Cerai" @checked($data->status_pernikahan == 'Cerai')>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Divorced
                                                </label>
                                            </div>
                                            @error('status_pernikahan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="phone_number">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input id="phone_number" type="number"
                                                class="form-input @error('nomor_hp') is-invalid @enderror"
                                                name="nomor_hp" value="{{ $data->nomor_hp }}">
                                            @error('nomor_hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold">Number Of Children</label>
                                        <div class="col-sm-9">
                                            <input id="jumlah_anak" type="number"
                                                class="form-input @error('jumlah_anak') is-invalid @enderror"
                                                name="jumlah_anak" value="{{ $data->jumlah_anak }}" disabled="disabled">
                                            @error('jumlah_anak')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description text-black fw-bold"> Address </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="provinsi">Province</label>
                                        <div class="col-sm-9">
                                            <select id="provinsi" class="form-select"
                                                aria-label="Default select example"
                                                @error('province_id') is-invalid @enderror name="province_id"
                                                value="{{ old('province_id') }}">
                                                <option value="">- Pilih Provinsi -</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}" @selected($province->id == $data->province_id)>
                                                        {{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('province_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="kelurahan">Village</label>
                                        <div class="col-sm-9">
                                            <select id="kelurahan" class="form-select"
                                                aria-label="Default select example"
                                                @error('village_id') is-invalid @enderror name="village_id"
                                                value="{{ old('village_id') }}">
                                                <option value="{{ $village->id }}">{{ $village->name }}</option>
                                            </select>
                                            @error('village_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="kabupaten">Regency</label>
                                        <div class="col-sm-9">
                                            <select id="kabupaten" class="form-select"
                                                aria-label="Default select example"
                                                @error('regency_id') is-invalid @enderror name="regency_id"
                                                value="{{ old('regency_id') }}">
                                                <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                            </select>
                                            @error('regency_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="alamat">Detail Address</label>
                                        <div class="col-sm-9">
                                            <input id="alamat" type="text"
                                                class="form-input @error('alamat') is-invalid @enderror"
                                                name="alamat" value="{{ $data->alamat }}">
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label text-black fw-bold" for="kecamatan">Subdistrict</label>
                                        <div class="col-sm-9">
                                            <select id="kecamatan" class="form-select"
                                                aria-label="Default select example"
                                                @error('district_id') is-invalid @enderror name="district_id"
                                                value="{{ old('district_id') }}">
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            </select>
                                            @error('district_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
