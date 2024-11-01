<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [
    \App\Http\Controllers\LoginController::class,
    'login',
]);

Route::middleware(['auth:api_key'])->group(function () {
    //    Route::get('locations', [
    //        UserController::class,
    //        'index'
    //    ]);

    Route::apiResource('locations', LocationController::class)
        ->only(['index']);

});
