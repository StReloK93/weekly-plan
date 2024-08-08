<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TruckTypeController;
use App\Http\Controllers\TruckAbilityController;
use App\Http\Controllers\ExcavatorTypeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('truck-type', TruckTypeController::class);
Route::prefix('truck-type')->group(function () {
    Route::controller(TruckTypeController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});


Route::apiResource('truck', TruckController::class);
Route::prefix('truck')->group(function () {
    Route::controller(TruckController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});

Route::apiResource('excavator-type', ExcavatorTypeController::class);
Route::prefix('excavator-type')->group(function () {
    Route::controller(TruckController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});






Route::apiResource('truck-ability', TruckAbilityController::class)->only('index');