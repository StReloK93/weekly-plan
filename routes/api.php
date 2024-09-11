<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TruckTypeController;
use App\Http\Controllers\TruckAbilityController;
use App\Http\Controllers\ExcavatorTypeController;
use App\Http\Controllers\ExcavatorController;
use App\Http\Controllers\DrillingController;
use App\Http\Controllers\DrillingTypeController;
use App\Http\Controllers\NormativeController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\HorizonController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ExcavatorFactController;
use App\Http\Controllers\ExplosionController;
use App\Http\Controllers\DrillingPositionController;
use App\Http\Controllers\ExcavatorPositionController;



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
    Route::controller(ExcavatorTypeController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});



Route::apiResource('excavator', ExcavatorController::class);
Route::prefix('excavator')->group(function () {
    Route::controller(ExcavatorController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});


Route::apiResource('drilling', DrillingController::class);
Route::prefix('drilling')->group(function () {
    Route::controller(DrillingController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});

Route::apiResource('drilling-type', DrillingTypeController::class);
Route::prefix('drilling-type')->group(function () {
    Route::controller(DrillingTypeController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});


Route::apiResource('normative', NormativeController::class)->only(['update','show']);
Route::prefix('normative')->group(function () {
    Route::controller(NormativeController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});

Route::apiResource('career', CareerController::class);
Route::prefix('career')->group(function () {
    Route::controller(CareerController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});



Route::apiResource('horizon', HorizonController::class);
Route::prefix('horizon')->group(function () {
    Route::controller(HorizonController::class)->group(function () {
        // Route::get('/help', 'gethob');
    });
});


Route::prefix('movement')->group(function () {
    Route::controller(MovementController::class)->group(function () {
        Route::get('{type}', 'index');
        Route::post('{type}', 'update');
    });
});



Route::prefix('excavator-fact')->group(function () {
    Route::controller(ExcavatorFactController::class)->group(function () {
        Route::post('', 'index');
        Route::post('/fact', 'factUpdate');
        Route::post('/plan', 'planUpdate');
    });
});

Route::prefix('explosion')->group(function () {
    Route::controller(ExplosionController::class)->group(function () {
        Route::post('', 'index');
        Route::post('/update', 'update');
    });
});

Route::prefix('drilling-position')->group(function () {
    Route::controller(DrillingPositionController::class)->group(function () {
        Route::post('', 'index');
        Route::post('/update', 'update');
    });
});

Route::prefix('excavator-position')->group(function () {
    Route::controller(ExcavatorPositionController::class)->group(function () {
        Route::post('', 'index');
        Route::post('/update', 'update');
    });
});


Route::apiResource('truck-ability', TruckAbilityController::class)->only('index');