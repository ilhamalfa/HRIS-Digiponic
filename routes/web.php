<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PerizinanController;
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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('rutelogin',[Controller::class,'rutelogin'])->name('rutelogin');
Route::get('struktur',[Controller::class,'struktur'])->name('struktur');
Route::get('career',[Controller::class,'career'])->name('career');
Route::get('aboutus',[Controller::class,'aboutus'])->name('aboutus');
Route::get('product',[Controller::class,'product'])->name('product');


Route::get('/login-pegawai', function(){
    return view('auth.login-pegawai');
});

// Route Pelamar
Route::get('/pelamar/input-data-pelamar', [PelamarController::class, 'inputPelamar'])->middleware(['pelamar'], ['verified']);

Route::post('/pelamar/input-data-pelamar/store', [PelamarController::class, 'storePelamar']);

Route::get('/pelamar/lowongan/', [PelamarController::class, 'daftarLowongan'])->middleware('pelamar');

Route::get('/pelamar/lowongan/apply/{id}', [PelamarController::class, 'applyLowongan'])->middleware('pelamar');


// Route Super Admin
// Data User
Route::get('/data-user', [PegawaiController::class, 'dataUser'])->middleware('superadmin');

Route::get('/data-user/input-user', [PegawaiController::class, 'inputUser'])->middleware('superadmin');

Route::post('/data-user/store-user', [PegawaiController::class, 'storeUser'])->middleware('superadmin');

// Data Pegawai
Route::get('/data-pegawai', [PegawaiController::class, 'dataPegawai'])->middleware('superadmin');

Route::get('/data-pegawai/input-pegawai', [PegawaiController::class, 'inputPegawai']);

Route::post('/data-pegawai/store-pegawai/', [PegawaiController::class, 'storePegawai']);

Route::get('/data-pegawai/edit-pegawai/{id}', [PegawaiController::class, 'editPegawai']);

Route::post('/data-pegawai/update-pegawai/{id}', [PegawaiController::class, 'updatePegawai']);

// Data Lowongan
Route::get('data-lowongan/', [LowonganController::class, 'daftarLowongan']);

Route::get('data-lowongan/tambah-lowongan', [LowonganController::class, 'tambahLowongan']);

Route::post('data-lowongan/store-lowongan', [LowonganController::class, 'storeLowongan']);

Route::get('data-lowongan/lowongan-detail/{id}', [LowonganController::class, 'detailLowongan']);

Route::get('data-lowongan/pelamar-detail/{id}', [LowonganController::class, 'detailPelamar']);

Route::get('pelamar-detail/download-cv/{id}', [LowonganController::class, 'downloadCV']);

// Pegawai
Route::get('pegawai/cuti-perizinan', [PerizinanController::class, 'daftarPerizinan'])->middleware('pegawai');




// Indoregion
Route::post('/get-kabupaten', [IndoRegionController::class, 'getKabupaten']);

Route::post('/get-kecamatan', [IndoRegionController::class, 'getKecamatan']);

Route::post('/get-kelurahan', [IndoRegionController::class, 'getKelurahan']);
