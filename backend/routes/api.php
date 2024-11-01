<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [
    \App\Http\Controllers\LoginController::class,
    'login'
]);

Route::middleware(['auth:api_key'])->group(function () {
//    Route::get('locations', [
//        UserController::class,
//        'index'
//    ]);

    Route::apiResource('locations', LocationController::class)
        ->only(['index']);

});





