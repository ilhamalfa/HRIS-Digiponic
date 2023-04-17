<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndoRegionController;
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
    // return view('landingpage.landingpage');
    return view('layouts.template');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Landing Page
Route::get('/rutelogin', [Controller::class, 'rutelogin'])->name('rutelogin');

Route::get('struktur', [Controller::class, 'struktur'])->name('struktur');

Route::get('/career', [Controller::class, 'career'])->name('career');

Route::get('career/vacancy/detail/{id}', [Controller::class, 'careerVacancyDetail']);

Route::get('aboutus', [Controller::class, 'aboutus'])->name('aboutus');

Route::get('product', [Controller::class, 'product'])->name('product');


Route::get('/login-pegawai', function () {
    return view('auth.login-pegawai');
});
// sandi (admin123) (pegawai123) (pelamar123)

// Route Pelamar
    Route::get('/pelamar/input-data-pelamar', [PelamarController::class, 'inputPelamar']);

    Route::post('/pelamar/input-data-pelamar/store', [PelamarController::class, 'storePelamar']);

    Route::get('/pelamar/lowongan/', [PelamarController::class, 'daftarLowongan']);

    Route::post('/pelamar/lowongan/apply/{id}', [PelamarController::class, 'applyLowongan']);

    Route::get('/pelamar/daftar-lamaran/', [PelamarController::class, 'daftarLamaran']);

    Route::get('/profile/edit-data-pelamar', [PelamarController::class, 'editPelamar']);

    Route::post('/profile/edit-data-pelamar/update', [PelamarController::class, 'updatePelamar']);

// Super Admin
// Route Super Admin Start
Route::middleware(['auth', 'verified', 'user-access:SuperAdmin'])->group(function () {
    // Data User
    Route::get('/data-user/input-user', [SuperAdminController::class, 'inputUser']);

    Route::post('/data-user/store-user', [SuperAdminController::class, 'storeUser']);

    Route::get('/data-user/delete-user/{id}', [SuperAdminController::class, 'deleteUser']);

    // Resign
    Route::get('/resign/daftar-resign', [SuperAdminController::class, 'resign']);

    Route::get('/resign/daftar-resign/{id}/{konfirmasi}', [SuperAdminController::class, 'resignProses']);

    // Data User
    Route::get('/data-user', [AdminController::class, 'dataUser']);
    });    

// Admin
Route::middleware(['auth', 'verified', 'user-access:SuperAdmin,Admin'])->group(function () {
    // Data User
    Route::get('/data-user', [AdminController::class, 'dataUser']);

    // Data Pegawai
    Route::get('/data-pegawai', [AdminController::class, 'dataPegawai']);

    Route::get('/data-pegawai/detail-pegawai/{id}', [AdminController::class, 'detailPegawai']);

    // Cuti
    Route::get('admin/daftar-cuti', [AdminController::class, 'daftarCuti']);

    Route::get('admin/cuti/{id}/{konfirmasi}', [AdminController::class, 'konfirmasiCuti']);

    // Izin
    Route::get('admin/izin', [AdminController::class, 'daftarIzin']);

    Route::get('admin/izin/bukti/{id}', [AdminController::class, 'buktiIzin']);

    Route::get('admin/izin/{id}/{konfirmasi}', [AdminController::class, 'konfirmasiIzin']);

    // Data Lowongan
    Route::get('data-lowongan/', [AdminController::class, 'daftarLowongan']);

    Route::get('data-lowongan/tambah-lowongan', [AdminController::class, 'tambahLowongan']);

    Route::get('data-lowongan/hapus-lowongan/{id}', [AdminController::class, 'hapusLowongan']);

    Route::post('data-lowongan/store-lowongan', [AdminController::class, 'storeLowongan']);

    Route::get('data-lowongan/detail-lowongan/{id}', [AdminController::class, 'detailPerLowongan']);

    Route::get('data-lowongan/daftar-pelamar/{id}', [AdminController::class, 'detailLowongan']);

    Route::get('data-lowongan/pelamar-detail/{id}', [AdminController::class, 'detailPelamar']);

    Route::get('data-lowongan/pelamar-detail/ubah-status/{id}/{status}', [AdminController::class, 'ubahStatus']);

    Route::post('data-lowongan/pelamar-detail/terima/{id}', [AdminController::class, 'terima']);

    Route::get('pelamar-detail/cv/{id}', [AdminController::class, 'CV']);
});



// Pegawai
Route::middleware(['auth', 'verified', 'user-access:SuperAdmin,Admin,Pegawai'])->group(function () {
    // Update data Pegawai
    Route::get('/profile/edit-data-pegawai', [PegawaiController::class, 'editPegawai']);

    Route::post('/profile/edit-data-pegawai/update', [PegawaiController::class, 'updatePegawai']);

    // Input data pegawai
    Route::get('/pegawai/input-pegawai', [PegawaiController::class, 'inputPegawai']);

    Route::post('/pegawai/input-pegawai/store-pegawai/', [PegawaiController::class, 'storePegawai']);

    // Cuti
    Route::get('pegawai/cuti', [PegawaiController::class, 'daftarCuti']);

    Route::get('pegawai/cuti/ajukan-cuti', [PegawaiController::class, 'ajukanCuti']);

    Route::post('pegawai/cuti/ajukan-cuti/proses', [PegawaiController::class, 'prosesCuti']);

    // Izin
    Route::get('pegawai/izin', [PegawaiController::class, 'daftarIzin']);

    Route::get('pegawai/izin/ajukan-izin', [PegawaiController::class, 'ajukanIzin']);

    Route::post('pegawai/izin/ajukan-izin/proses', [PegawaiController::class, 'prosesIzin']);

    Route::get('pegawai/izin/bukti/{id}', [PegawaiController::class, 'buktiIzin']);

    // resign
    Route::get('pegawai/resign', [PegawaiController::class, 'resign']);

    Route::get('pegawai/resign/ajukan-resign', [PegawaiController::class, 'resignForm']);

    Route::post('pegawai/resign/ajukan-resign/proses', [PegawaiController::class, 'prosesResign']);

});

Route::middleware(['auth', 'verified', 'user-access:SuperAdmin,Admin,Pegawai,Pelamar'])->group(function () {
    // Update data User
    Route::get('/Account/account-setting', [PegawaiController::class, 'editUser']);

    Route::post('/Account/account-setting/update', [PegawaiController::class, 'updateUser']);    
});

// Indoregion Start
Route::post('/get-kabupaten', [IndoRegionController::class, 'getKabupaten']);

Route::post('/get-kecamatan', [IndoRegionController::class, 'getKecamatan']);

Route::post('/get-kelurahan', [IndoRegionController::class, 'getKelurahan']);
// Indoregion End
