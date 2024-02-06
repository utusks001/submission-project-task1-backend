<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('kelas', [KelasController::class, 'index']);
Route::post('kelas', [KelasController::class, 'store']);
Route::get('kelas/{id}', [KelasController::class, 'show']);
Route::post('kelas/{id}', [KelasController::class, 'update']);
Route::delete('kelas/{id}', [KelasController::class, 'destroy']);

Route::get('siswa', [SiswaController::class, 'index']);
Route::post('siswa', [SiswaController::class, 'store']);
Route::get('siswa/{id}', [SiswaController::class, 'show']);

Route::post('nilai', [NilaiController::class, 'store']);
Route::get('nilai/{id}', [NilaiController::class, 'show']);

Route::fallback(function(){
    return response()->json([
        'message' => 'Halaman tidak ditemukan.'], 404);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


