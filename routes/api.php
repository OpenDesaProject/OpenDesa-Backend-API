<?php

use App\Http\Controllers\DesaController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\ProvinsiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinsi', [ProvinsiController::class, 'get']);
Route::get('/kabupaten', [KabupatenController::class, 'get']);
Route::get('/kecamatan', [KecamatanController::class, 'get']);
Route::get('/kecamatan/{id}', [KecamatanController::class, 'show']);
Route::get('/desa', [DesaController::class, 'get']);
