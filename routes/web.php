<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage.landingpage');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Landing Page
Route::post('rutelogin', [Controller::class, 'rutelogin'])->name('rutelogin');

Route::get('struktur', [Controller::class, 'struktur'])->name('struktur');

Route::get('career', [Controller::class, 'career'])->name('career');

Route::get('career/vacancy/detail/{id}', [Controller::class, 'careerVacancyDetail']);

Route::get('aboutus', [Controller::class, 'aboutus'])->name('aboutus');

Route::get('product', [Controller::class, 'product'])->name('product');


Route::get('/login-pegawai', function () {
    return view('auth.login-pegawai');
});

// Route Pelamar
Route::get('/pelamar/input-data-pelamar', [PelamarController::class, 'inputPelamar'])->middleware(['verified']);

Route::post('/pelamar/input-data-pelamar/store', [PelamarController::class, 'storePelamar']);

Route::get('/pelamar/lowongan/', [PelamarController::class, 'daftarLowongan'])->middleware('pelamar');

Route::get('/pelamar/lowongan/apply/{id}', [PelamarController::class, 'applyLowongan'])->middleware('pelamar');

Route::get('/pelamar/lamaran/', [PelamarController::class, 'daftarLamaran'])->middleware('pelamar');


// Super Admin
// Route Super Admin Start

// Data User
Route::get('/data-user', [SuperAdminController::class, 'dataUser'])->middleware('superadmin');

Route::get('/data-user/input-user', [SuperAdminController::class, 'inputUser'])->middleware('superadmin');

Route::post('/data-user/store-user', [SuperAdminController::class, 'storeUser'])->middleware('superadmin');

// Data Pegawai
Route::get('/data-pegawai', [PegawaiController::class, 'dataPegawai']);

Route::get('/pegawai/edit-pegawai/{id}', [SuperAdminController::class, 'editPegawai']);

Route::post('/pegawai/update-pegawai/{id}', [SuperAdminController::class, 'updatePegawai']);

// Data Lowongan
Route::get('data-lowongan/', [LowonganController::class, 'daftarLowongan']);

Route::get('data-lowongan/tambah-lowongan', [LowonganController::class, 'tambahLowongan']);

Route::post('data-lowongan/store-lowongan', [LowonganController::class, 'storeLowongan']);

Route::get('data-lowongan/detail-lowongan/{id}', [LowonganController::class, 'detailPerLowongan']);

Route::get('data-lowongan/daftar-pelamar/{id}', [LowonganController::class, 'detailLowongan']);

Route::get('data-lowongan/pelamar-detail/{id}', [LowonganController::class, 'detailPelamar']);

Route::get('data-lowongan/pelamar-detail/ubah-status/{id}/{status}', [LowonganController::class, 'ubahStatus']);

Route::post('data-lowongan/pelamar-detail/terima/{id}', [LowonganController::class, 'terima']);

Route::get('pelamar-detail/cv/{id}', [LowonganController::class, 'CV']);

// Resign
Route::get('/resign/daftar-resign', [SuperAdminController::class, 'resign'])->middleware('superadmin');

Route::get('/resign/daftar-resign/{id}/{konfirmasi}', [SuperAdminController::class, 'resignProses'])->middleware('superadmin');



// Admin
// Cuti
Route::get('admin/cuti', [AdminController::class, 'daftarCuti']);

Route::get('admin/cuti/{id}/{konfirmasi}', [AdminController::class, 'konfirmasiCuti']);

// Izin
Route::get('admin/izin', [AdminController::class, 'daftarIzin']);

Route::get('admin/izin/bukti/{id}', [AdminController::class, 'buktiIzin']);

Route::get('admin/izin/{id}/{konfirmasi}', [AdminController::class, 'konfirmasiIzin']);


// Pegawai
// Input data pegawai
Route::get('/pegawai/input-pegawai', [PegawaiController::class, 'inputPegawai']);

Route::post('/pegawai/input-pegawai/store-pegawai/', [PegawaiController::class, 'storePegawai']);

// Cuti
Route::get('pegawai/cuti', [PegawaiController::class, 'daftarCuti'])->middleware('pegawai');

Route::get('pegawai/cuti/ajukan-cuti', [PegawaiController::class, 'ajukanCuti'])->middleware('pegawai');

Route::post('pegawai/cuti/ajukan-cuti/proses', [PegawaiController::class, 'prosesCuti'])->middleware('pegawai');

// Izin
Route::get('pegawai/izin', [PegawaiController::class, 'daftarIzin'])->middleware('pegawai');

Route::get('pegawai/izin/ajukan-izin', [PegawaiController::class, 'ajukanIzin'])->middleware('pegawai');

Route::post('pegawai/izin/ajukan-izin/proses', [PegawaiController::class, 'prosesIzin'])->middleware('pegawai');

Route::get('pegawai/izin/bukti/{id}', [PegawaiController::class, 'buktiIzin'])->middleware('pegawai');

// resign
Route::get('pegawai/resign', [PegawaiController::class, 'resign'])->middleware('pegawai');

Route::get('pegawai/resign/ajukan-resign', [PegawaiController::class, 'resignForm'])->middleware('pegawai');

Route::post('pegawai/resign/ajukan-resign/proses', [PegawaiController::class, 'prosesResign'])->middleware('pegawai');


// Indoregion Start
Route::post('/get-kabupaten', [IndoRegionController::class, 'getKabupaten']);

Route::post('/get-kecamatan', [IndoRegionController::class, 'getKecamatan']);

Route::post('/get-kelurahan', [IndoRegionController::class, 'getKelurahan']);
// Indoregion End
