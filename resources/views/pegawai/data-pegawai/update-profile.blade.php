@extends('layouts.template')

@section('title', 'Account Settings')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header mt-3">
                        {{ __('Change Profile Picture') }}<i class="fa-solid fa-image ms-2"></i>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6>Image Preview</h6>
                                @if (isset(Auth::user()->foto))
                                <img class="img-preview d-block" src="{{ asset('storage/' . Auth::user()->foto) }}"
                                alt="">
                                @else
                                <img class="img-preview d-block" src="{{ asset('storage/Pegawai/default/user.jpg') }}"
                                alt="">
                                @endif
                            </div>
                            <div class="col">
                                <h6 class="card-title">Update Your Photo</h6>
                                <input type="file" name="image" class="image">
                                <div class="note mt-3">
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
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Crop Your Image</h5>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa-solid fa-xmark m-auto"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin mb-2">
                <div class="card">
                    <div class="card-header mt-3">
                        {{ __('Change Your Password') }}<i class="fa-solid fa-lock ms-2"></i>
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
                                                    class="form-control text-white @error('email') is-invalid @enderror"
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
                                            <label class="col-sm-3 col-form-label" for="new-password">New Password</label>
                                            <div class="col-sm-9 position-relative">
                                                <input type="password"
                                                    class="form-control text-light @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    id="new-password" />
                                                <i class="fa-solid fa-eye password-icon-eye" id="new-password-icon-eye"></i>
                                                <i class="fa-solid fa-eye-slash password-icon-eye-slash"
                                                    id="new-password-icon-eye-slash"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-sm-3 col-form-label" for="confirm-password">Confirm
                                                Password</label>
                                            <div class="col-sm-9 position-relative">
                                                <input type="password" class="form-control text-light"
                                                    name="password_confirmation" required autocomplete="new-password"
                                                    id="confirm-password" />
                                                <i class="fa-solid fa-eye password-icon-eye"
                                                    id="confirm-password-icon-eye"></i>
                                                <i class="fa-solid fa-eye-slash password-icon-eye-slash"
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
                                        <div class="note mt-3">
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
                <div class="card">
                    <div class="card-header mt-3">
                        {{ __('Change Personal Data') }}<i class="fa-solid fa-user ms-2"></i>
                    </div>
                    <div class="card-body">
                        <form class="form-sample" method="POST" action="{{ url('/profile/edit-data-pegawai/update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <p class="card-description"> Personal info </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="name">Name</label>
                                        <div class="col-sm-9">
                                            <input id="name" type="text"
                                                class="form-control text-white @error('nama') is-invalid @enderror" name="nama"
                                                value="{{ $data->nama }}">
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
                                        <label class="col-sm-3 col-form-label" for="born_date">Date Of Birth</label>
                                        <div class="col-sm-9">
                                            <input id="born_date" type="date"
                                                class="form-control text-white @error('tanggal_lahir') is-invalid @enderror"
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
                                        <label class="col-sm-3 col-form-label">Gender</label>
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
                                        <label class="col-sm-3 col-form-label" for="status">Status</label>
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
                                        <label class="col-sm-3 col-form-label" for="phone_number">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input id="phone_number" type="number"
                                                class="form-control text-white @error('nomor_hp') is-invalid @enderror"
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
                                        <label class="col-sm-3 col-form-label">Number Of Children</label>
                                        <div class="col-sm-9">
                                            <input id="jumlah_anak" type="number"
                                                class="form-control text-success @error('jumlah_anak') is-invalid @enderror"
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
                            <p class="card-description"> Address </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="provinsi">Province</label>
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
                                        <label class="col-sm-3 col-form-label" for="kelurahan">Village</label>
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
                                        <label class="col-sm-3 col-form-label" for="kabupaten">Regency</label>
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
                                        <label class="col-sm-3 col-form-label" for="alamat">Detail Address</label>
                                        <div class="col-sm-9">
                                            <input id="alamat" type="text"
                                                class="form-control text-white @error('alamat') is-invalid @enderror" name="alamat"
                                                value="{{ $data->alamat }}">
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
                                        <label class="col-sm-3 col-form-label" for="kecamatan">Subdistrict</label>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "/profile/photo-profile/update",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $modal.modal('hide');
                            alert("Crop image successfully uploaded");
                            location.reload();
                        }
                    });
                }
            });
        })
    </script>
@endsection
