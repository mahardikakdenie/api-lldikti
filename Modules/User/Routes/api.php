<?php

use Illuminate\Http\Request;
use Modules\User\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function () {
    Route::get('', [UserController::class, 'index'])->middleware(['auth:sanctum']);
    Route::post('create', [UserController::class, 'store'])->middleware(['auth:sanctum']);
    Route::post('role/{id}', [UserController::class, 'assignRole'])->middleware(['auth:sanctum']);
    Route::get('{id}', [UserController::class, 'show'])->middleware(['auth:sanctum']);
    Route::put('{id}', [UserController::class, 'update'])->middleware(['auth:sanctum']);
});
