<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Routing\Controller as RoutingController;
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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);

// Landing Page
Route::get('/career', [Controller::class, 'career']);

Route::get('/career/search', [Controller::class, 'search']);

Route::get('/career/filter', [Controller::class, 'filter']);

Route::get('/login-pegawai', function () {
    return view('auth.login-pegawai');
});

// Pelamar
Route::post('/career/apply/{id}', [PelamarController::class, 'applyLowongan']);

// Super Admin
Route::middleware(['auth', 'verified', 'user-access:SuperAdmin'])->group(function () {
    // Data User
    Route::get('/data-user/input-user', [SuperAdminController::class, 'inputUser']);

    Route::get('/data-user/edit-user/{id}', [SuperAdminController::class, 'editUser']);

    Route::post('/data-user/edit-user/update/{id}', [SuperAdminController::class, 'updateUser']);

    Route::post('/data-user/store-user', [SuperAdminController::class, 'storeUser']);

    Route::get('/data-user/delete-user/{id}', [SuperAdminController::class, 'deleteUser']);

    // Resign
    Route::get('/resign/daftar-resign', [SuperAdminController::class, 'resign']);
    });    

// Admin
Route::middleware(['auth', 'verified', 'user-access:SuperAdmin,Admin'])->group(function () {
    // Data User
    Route::get('/users-data', [AdminController::class, 'dataUser']);

    // Data Pegawai
    Route::get('/data-pegawai', [AdminController::class, 'dataPegawai']);

    Route::get('/data-pegawai/detail-pegawai/{id}', [AdminController::class, 'detailPegawai']);

    // Cuti
    Route::get('admin/daftar-cuti', [AdminController::class, 'daftarCuti']);

    // Izin
    Route::get('admin/izin', [AdminController::class, 'daftarIzin']);

    Route::get('admin/izin/bukti/{id}', [AdminController::class, 'buktiIzin']);

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

    // Data User
    Route::get('/data-user', [AdminController::class, 'dataUser']);
});

// Pegawai
Route::middleware(['auth', 'verified', 'user-access:SuperAdmin,Admin,Pegawai'])->group(function () {
    // Update data User
    Route::get('/Account/account-setting', [PegawaiController::class, 'editUser']);

    Route::post('/Account/account-setting/update', [PegawaiController::class, 'updateUser']);    

    // Update data Pegawai
    Route::get('/profile/edit-data-pegawai', [PegawaiController::class, 'editPegawai']);

    Route::post('/profile/edit-data-pegawai/update', [PegawaiController::class, 'updatePegawai']);

    // Update Foto Pegawai
    // Route::get('/profile/photo-profile', [PegawaiController::class, 'userPhoto']);

    Route::post('/profile/photo-profile/update',  [PegawaiController::class, 'updatePhoto']);

    // Update Signature Pegawai
    Route::get('/profile/signature', [PegawaiController::class, 'signature']);

    Route::post('profile/save-signature',  [PegawaiController::class, 'saveSignature']);

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

    // SK
    // Route::get('pegawai/cuti/sk/{id}', [PegawaiController::class, 'skCuti']);
    Route::get('pegawai/cetak-sk/{sk}/{id}',[PegawaiController::class, 'cetakSK']);

});

Route::middleware(['auth', 'verified', 'golongan:Manager/Kadep'])->group(function () {
    Route::get('kadep/daftar-perizinan', [PegawaiController::class, 'daftarPerizinan']);
    
    Route::get('kadep/daftar-perizinan/{id}/{konfirmasi}', [AdminController::class, 'konfirmasiIzin']);

    Route::get('kadep/daftar-cuti', [PegawaiController::class, 'daftarCutiKadep']);

    Route::get('kadep/daftar-cuti/{id}/{konfirmasi}', [AdminController::class, 'konfirmasiCuti']);

    Route::get('kadep/daftar-resign', [PegawaiController::class, 'daftarResign']);

    Route::get('kadep/daftar-resign/{id}/{konfirmasi}', [AdminController::class, 'konfirmasiResign']);

    // Data User
    Route::get('/employees-data', [PegawaiController::class, 'dataPegawai']);
});

// Indoregion
Route::post('/get-kabupaten', [IndoRegionController::class, 'getKabupaten']);

Route::post('/get-kecamatan', [IndoRegionController::class, 'getKecamatan']);

Route::post('/get-kelurahan', [IndoRegionController::class, 'getKelurahan']);