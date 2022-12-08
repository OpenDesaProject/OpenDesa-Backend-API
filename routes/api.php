<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/potensi', [PotensiController::class, 'index']);
Route::post('/potensi', [PotensiController::class, 'store']);
Route::get('potensi/{kategori}', [PotensiController::class, 'getByCategory']);
Route::get('potensi/{kategori}/{slug}', [PotensiController::class, 'getByCategoryName']);