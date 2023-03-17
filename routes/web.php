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

Route::get('/data-pegawai/input', [PegawaiController::class, 'inputPegawai'])->middleware('superadmin');

Route::post('/data-pegawai/store/', [PegawaiController::class, 'storePegawai']);

Route::post('/get-kabupaten', [IndoRegionController::class, 'getKabupaten']);

Route::post('/get-kecamatan', [IndoRegionController::class, 'getKecamatan']);

Route::post('/get-kelurahan', [IndoRegionController::class, 'getKelurahan']);
