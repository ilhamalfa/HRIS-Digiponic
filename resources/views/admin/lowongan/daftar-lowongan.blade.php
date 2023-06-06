@extends('layouts.template')

@section('title', 'Vacancy Table')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <h6 class="text-black fw-bold fs-3">Vacancy List</h6>
                    </div>
                    <div class="card-body overflow-scroll">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Vacancy">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            <span>Add</span>
                        </button>

                        {{-- Modal Vacancy Form Start --}}
                        <div class="modal fade" id="addVacancy" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content bg-white border-0">
                                    <div class="modal-header">
                                        <h1 class="text-black fw-bold fs-3" id="exampleModalLabel">Add Vacancy
                                        </h1>
                                        <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-xmark m-auto"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST"
                                            action="{{ url('data-lowongan/store-lowongan') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="Position"><span class="text-black">Position</span></label>
                                                <input id="Position" type="text"
                                                    class="form-input @error('posisi') is-invalid @enderror form-input"
                                                    name="posisi" value="{{ old('posisi') }}"
                                                    placeholder="Input Position" required autocomplete="posisi">
                                                @error('posisi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="Deadline Date"><span class="text-black">Deadline Date</span></label>
                                                <input id="Deadline Date" type="date"
                                                    class="form-input @error('tanggal') is-invalid @enderror form-input"
                                                    name="tanggal" value="{{ old('tanggal') }}"
                                                    placeholder="Deadline Date" required
                                                    autocomplete="tanggal">
                                                @error('tanggal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="Qualification"><span class="text-black">Qualification</span></label>
                                                <input id="Qualification" type="hidden" name="kualifikasi">
                                                <trix-editor input="Qualification"
                                                    class=" @error('kualifikasi') is-invalid @enderror form-input"
                                                    placeholder="Input Job Qualification" required
                                                    autocomplete="new-kualifikasi"></trix-editor>
                                                @error('kualifikasi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="Description"><span class="text-black">Description</span></label>
                                                <input id="Description" type="hidden" name="deskripsi">
                                                <trix-editor input="Description"
                                                    class=" @error('deskripsi') is-invalid @enderror form-input"
                                                    placeholder="Input Job Description" required
                                                    autocomplete="new-deskripsi"></trix-editor>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <span>Add</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- Modal Vacancy Form End --}}

                        <form class="d-flex justify-content-center align-items-center" action="{{ url('/data-user') }}">
                            <div class="form-section pagination-top-box">
                                @isset($datas)
                                    {{ $datas->links('vendor.pagination.design') }}
                                @endisset
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
                            <div class="form-section filter-top-box">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-filter"></i>
                                </button>
                                <ul class="dropdown-menu text-end">
                                    <li>
                                        <a class="dropdown-item text-white" href="#">
                                            <span>Asc</span>
                                            <i class="fa-solid fa-arrow-down-a-z"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="#">
                                            <span>Desc</span>
                                            <i class="fa-solid fa-arrow-down-z-a"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="#">
                                            <span>Deadline</span>
                                            <i class="fa-regular fa-clock"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-white" href="#">
                                            <span>Aplicants = 0</span>
                                            <i class="fa-solid fa-user-tie"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <table class="table mb-4 text-black">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-black fw-bold">#</th>
                                    <th scope="col" class="text-black fw-bold">Position</th>
                                    <th scope="col" class="text-black fw-bold">Deadline Date</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $index => $data)
                                    <tr>
                                        <th scope="row">{{ $index + $datas->firstItem() }}</th>
                                        <td>{{ $data->posisi }}</td>
                                        <td>
                                            @if (\Carbon\Carbon::now() > $data->tanggal)
                                                <span class="text-danger fw-bold">
                                                    {{ date('d F Y', strtotime($data->tanggal)) }}
                                                </span>
                                            @else
                                                <span class="text-black fw-bold">
                                                    {{ date('d F Y', strtotime($data->tanggal)) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $data->pelamar->count() }}
                                            @if ($data->pelamar->count() > 0)
                                                <i class="fa-solid fa-user-tie text-success ml-2"></i>
                                            @elseif ($data->pelamar->count() > 50)
                                                <i class="fa-solid fa-user-tie text-warning ml-2"></i>
                                            @else
                                                <i class="fa-solid fa-user-tie text-black ml-2"></i>
                                            @endif
                                        </td>
                                        <td class="table-vacancy-actions">
                                            <a href="{{ url('data-lowongan/daftar-pelamar/' . $data->id) }}"
                                                class="btn btn-link text-decoration-none text-black my-2">
                                                <span>Aplicants</span>
                                                <i class="fa-solid fa-table-list text-success"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-link text-decoration-none text-white"
                                                data-bs-toggle="modal" data-bs-target="#detailVacancy{{ $data->id }}">
                                                <i class="fa-solid fa-sort-down text-warning"></i>
                                                <span class="text-black">Details</span>
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Modal Vacancy Form Start --}}
                                    <div class="modal fade" id="Vacancy" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content bg-white border-0">
                                                <div class="modal-header">
                                                    <h1 class="text-black fw-bold fs-3" id="exampleModalLabel">Add Vacancy
                                                    </h1>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa-solid fa-xmark m-auto"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="forms-sample" method="POST"
                                                        action="{{ url('data-lowongan/store-lowongan') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="Position"><span
                                                                    class="text-black">Position</span></label>
                                                            <input id="Position" type="text"
                                                                class="form-input @error('posisi') is-invalid @enderror form-input"
                                                                name="posisi" value="{{ old('posisi') }}"
                                                                placeholder="Input Position" required
                                                                autocomplete="posisi">
                                                            @error('posisi')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Deadline Date"><span class="text-black">Deadline
                                                                    Date</span></label>
                                                            <input id="Deadline Date" type="date"
                                                                class="form-input @error('tanggal') is-invalid @enderror form-input"
                                                                name="tanggal" value="{{ old('tanggal') }}"
                                                                placeholder="Deadline Date" required
                                                                autocomplete="tanggal">
                                                            @error('tanggal')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Qualification"><span
                                                                    class="text-black">Qualification</span></label>
                                                            <input id="Qualification" type="hidden" name="kualifikasi">
                                                            <trix-editor input="Qualification"
                                                                class=" @error('kualifikasi') is-invalid @enderror form-input"
                                                                placeholder="Input Job Qualification" required
                                                                autocomplete="new-kualifikasi"></trix-editor>
                                                            @error('kualifikasi')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Description"><span
                                                                    class="text-black">Description</span></label>
                                                            <input id="Description" type="hidden" name="deskripsi">
                                                            <trix-editor input="Description"
                                                                class=" @error('deskripsi') is-invalid @enderror form-input"
                                                                placeholder="Input Job Description" required
                                                                autocomplete="new-deskripsi"></trix-editor>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">
                                                            <span>Add</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Vacancy Form End --}}

                                    {{-- Modal Details Start --}}
                                    <div class="modal fade" id="detailVacancy{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-white">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fw-bold fs-3 text-black"
                                                        id="exampleModalLabel">Details</h1>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa-solid fa-xmark m-auto"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-black">
                                                    <p class="fw-bold">Position : <span
                                                            class="fw-normal">{{ $data->posisi }}</span></p>
                                                    <p class="fw-bold">Qualification :</p>
                                                    <p class="mx-2 fw-normal">{!! $data->kualifikasi !!}</p>
                                                    <p class="fw-bold">Description :</p>
                                                    <p class="mx-2 fw-normal">{!! $data->deskripsi !!}</p>
                                                    <p class="fw-bold">Deadline Date :</p>
                                                    <p class="mx-2 fw-normal">
                                                        {{ date('d F Y', strtotime($data->tanggal)) }}
                                                    </p>
                                                    <p class="fw-bold">Registrants :</p>
                                                    <p class="mx-2 fw-normal">
                                                        {{ $data->pelamar->count() }}
                                                        <i class="fa-solid fa-user-tie"></i>
                                                    </p>
                                                </div>
                                                <div class="modal-footer text-black">
                                                    <p>Uploaded at {{ date('d F Y', strtotime($data->created_at)) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Details End --}}
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-bottom-box">
                            @isset($datas)
                                {{ $datas->links('vendor.pagination.design') }}
                            @endisset
                        </div>
                        <h6 class="my-4 ms-2 text-black">
                            <i class="fa-solid fa-circle-info text-info"></i>
                            <span>Information</span>
                        </h6>
                        <div class="information-box d-flex ms-4">
                            <div class="deadline-box ms-2">
                                <p class="text-black">Deadline Date :</p>
                                <p class="ms-3 text-black">
                                    <i class="fa-sharp fa-solid fa-square text-black"></i>
                                    <span>
                                        < Deadline Date</span>
                                </p>
                                <p class="ms-3 text-black">
                                    <i class="fa-sharp fa-solid fa-square text-danger"></i>
                                    <span>= Deadline Date</span>
                                </p>
                            </div>
                            <div class="apllicants-box">
                                <p class="text-black">Aplicants :</p>
                                <div class="d-flex">
                                    <p class="ms-3 text-black">
                                        <i class="fa-solid fa-user-tie"></i>
                                        <span>= 0</span>
                                    </p>
                                    <p class="ms-3 text-black">
                                        <i class="fa-solid fa-user-tie text-warning"></i>
                                        <span>> 50</span>
                                    </p>
                                </div>
                                <div class="d-flex">
                                    <p class="ms-3 text-black">
                                        <i class="fa-solid fa-user-tie text-success"></i>
                                        <span>> 1</span>
                                    </p>
                                    <p class="ms-3 text-black">
                                        <i class="fa-solid fa-user-tie text-danger"></i>
                                        <span>> 100</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
