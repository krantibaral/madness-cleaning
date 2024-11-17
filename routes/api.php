<?php

use App\Http\Controllers\Api\{
    AppointmentBookingController,
    CarpetCleaningServiceController,
    HouseCleaningServiceController,
    LawnServiceController,
    LeaseCleaningController,
    RubbishRemovalServiceController,
    AuthController,
    ServiceController,
    WindowsCleaningServiceController,
    CommercialCleaningServiceController,
    BuilderCleaningServiceController,
    BookingController,
    ChatbotController
};
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Authenticated routes
Route::group(['middleware' => 'auth:api'], function () {
    // User-related routes
    Route::get('/user', [AuthController::class, 'getAuthUser']);
    Route::post('/user', [AuthController::class, 'updateUser']);
    Route::get('bookings', [BookingController::class, 'index']);
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);

    // Service-related routes 
    Route::get('services', [ServiceController::class, 'index']);
    Route::apiResource('windows-cleaning-services', WindowsCleaningServiceController::class);
    Route::apiResource('house-cleaning-services', HouseCleaningServiceController::class);
    Route::apiResource('lease-cleanings', LeaseCleaningController::class);
    Route::apiResource('carpet-cleaning-services', CarpetCleaningServiceController::class);
    Route::apiResource('commercial-cleaning-services', CommercialCleaningServiceController::class);
    Route::apiResource('builder-cleaning-services', BuilderCleaningServiceController::class);
    Route::apiResource('lawn-services', LawnServiceController::class);
    Route::apiResource('rubbish-removal-services', RubbishRemovalServiceController::class);
    Route::apiResource('appointment-bookings', AppointmentBookingController::class);
    Route::apiResource('chatbots', ChatbotController::class);
});
