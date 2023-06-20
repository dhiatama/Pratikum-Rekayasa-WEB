<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index',[MahasiswaController::class,'index']);

Route::get('/mahasiswa/read',[MahasiswaController::class,'read']);
Route::post('/mahasiswa/create',[MahasiswaController::class,'create']);
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy']);


Route::get('/dosen/read',[DosenController::class,'read']);
Route::post('/dosen/create',[DosenController::class,'create']);
Route::put('/dosen/{nim}', [DosenController::class, 'update']);
Route::delete('/dosen/{nim}', [DosenController::class, 'destroy']);

Route::get('/makul/read',[MakulController::class,'read']);
Route::post('/makul/create',[MakulController::class,'create']);
Route::put('/makul/{nim}', [MakulController::class, 'update']);
Route::delete('/makul/{nim}', [MakulController::class, 'destroy']);