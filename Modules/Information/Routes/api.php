<?php

use Illuminate\Http\Request;
use Modules\Information\Entities\Category;
use Modules\Information\Entities\Information;
use Modules\Information\Http\Controllers\CategoryController;
use Modules\Information\Http\Controllers\InformationController;

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

Route::middleware('auth:api')->get('/information', function (Request $request) {
    return $request->user();
});

Route::prefix('informations')->group(function () {
    Route::get('', [InformationController::class, 'index']);
    Route::get('{id}', [InformationController::class, 'show']);
    Route::prefix('manage')->middleware(['auth:sanctum'])->group(function () {
        Route::post('create', [InformationController::class, 'store']);
        Route::put('update/{id}', [InformationController::class, 'update']);
        Route::delete('delete/{id}', [InformationController::class, 'destroy']);
    });
});

Route::prefix('category')->group(function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('{id}', [CategoryController::class, 'show']);
    Route::prefix('manage')->middleware(['auth:sanctum'])->group(function () {
        Route::post('create', [CategoryController::class, 'store']);
        Route::put('update/{id}', [CategoryController::class, 'update']);
        Route::delete('delete/{id}', [CategoryController::class, 'destroy']);
    });
});
