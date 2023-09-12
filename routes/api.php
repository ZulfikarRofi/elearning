<?php

use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaContoller;
use App\Http\Controllers\UserController;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [UserController::class, 'postLogin']);
Route::post('/logout', [UserController::class, 'postLogout']);

Route::get('/dashboard', [SiswaContoller::class, 'getDataSiswa']);
Route::get('/detail-mapel', [SiswaContoller::class, 'detailMapel']);
Route::get('/detail-materi', [SiswaContoller::class, 'detailMateri']);
Route::get('/daftar-tugas', [SiswaContoller::class, 'daftarTugas']);
Route::get('/daftar-siswa', [SiswaContoller::class, 'daftarSiswa']);
Route::get('/jadwalku', [SiswaContoller::class, 'jadwalku']);

Route::get('matapelajaran', [MapelController::class, 'index']);
Route::post('matapelajaran/store', [MapelController::class, 'store']);
Route::get('matapelajaran/store/{id}', [MapelController::class, 'show']);
Route::post('matapelajaran/update/{id}', [MapelController::class, 'update']);
Route::delete('matapelajaran/delete/{id}', [MapelController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
