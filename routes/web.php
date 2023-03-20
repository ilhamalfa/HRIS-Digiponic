<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelamarController;
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

Route::get('/login-pegawai', function(){
    return view('auth.login-pegawai');
});

Route::get('/input-data-pelamar', [PelamarController::class, 'inputPelamar'])->middleware('pelamar');

Route::post('/store/data-pelamar', [PelamarController::class, 'storePelamar']);

Route::get('/data-pegawai', [PegawaiController::class, 'dataPegawai'])->middleware('superadmin');

Route::get('/data-pegawai/input-user', [PegawaiController::class, 'inputUser'])->middleware('superadmin');

Route::post('/data-pegawai/store-user', [PegawaiController::class, 'storeUser'])->middleware('superadmin');

Route::get('/data-pegawai/input-pegawai', [PegawaiController::class, 'inputPegawai'])->middleware('pegawai');

Route::post('/data-pegawai/store-pegawai/', [PegawaiController::class, 'storePegawai']);

Route::get('/data-pegawai/edit-pegawai/{id}', [PegawaiController::class, 'editPegawai']);

Route::post('/data-pegawai/update-pegawai/{id}', [PegawaiController::class, 'updatePegawai']);

Route::post('/get-kabupaten', [IndoRegionController::class, 'getKabupaten']);

Route::post('/get-kecamatan', [IndoRegionController::class, 'getKecamatan']);

Route::post('/get-kelurahan', [IndoRegionController::class, 'getKelurahan']);
