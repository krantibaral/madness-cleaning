<?php

use App\Http\Controllers\Api\HouseCleaningServiceController;
use App\Http\Controllers\Api\LeaseCleaningController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\WindowsCleaningServiceController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
// Route::get('services', [ServiceController::class, 'index']);
// Route::apiResource('windows-cleaning-services', WindowsCleaningServiceController::class);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('services', [ServiceController::class, 'index']);
    Route::apiResource('windows-cleaning-services', WindowsCleaningServiceController::class);
    Route::apiResource('house-cleaning-services', HouseCleaningServiceController::class);
    Route::apiResource('lease-cleanings', LeaseCleaningController::class);
});
