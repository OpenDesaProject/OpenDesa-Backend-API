<?php

use App\Http\Controllers\DataDesaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaDesaController;

use App\Http\Controllers\PotensiController;
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

Route::get('berita-desa', [BeritaDesaController::class, 'index']);
Route::get('/data_desa', [DataDesaController::class, 'getAllDataDesa']);
Route::get('/data_desa/{id}', [DataDesaController::class, 'getOneDataDesa']);
Route::get('/potensi', [PotensiController::class, 'index']);
Route::post('/potensi', [PotensiController::class, 'store']);
Route::get('potensi/{kategori}', [PotensiController::class, 'getByCategory']);
Route::get('potensi/{kategori}/{slug}', [PotensiController::class, 'getByCategoryName']);
