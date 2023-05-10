<?php

use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\PresensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register',[ApiController::class,'Register']);
Route::post('login',[ApiController::class,'Login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('profile',[ApiController::class,'profile']);
    Route::post('profile',[ApiController::class,'editprofile']);
    Route::post('editpassword',[ApiController::class,'editpassword']);
    Route::post('editfoto',[ApiController::class,'updatefoto']);
    Route::get('editfoto',[ApiController::class,'deletefoto']);
    Route::get('logout',[ApiController::class,'Logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
