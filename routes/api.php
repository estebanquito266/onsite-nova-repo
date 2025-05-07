<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SistemaOnsiteController;

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

Route::group(['prefix' => 'sistemas-onsite'], function () {
    Route::get('/', [SistemaOnsiteController::class, 'index']);
    Route::post('/', [SistemaOnsiteController::class, 'store']);
    Route::get('/{id}', [SistemaOnsiteController::class, 'show']);
    Route::put('/{id}', [SistemaOnsiteController::class, 'update']);
    Route::delete('/{id}', [SistemaOnsiteController::class, 'destroy']);
});
