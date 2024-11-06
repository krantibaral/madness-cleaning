<?php

use App\Http\Controllers\Admin\HouseCleaningServiceController;
use App\Http\Controllers\Admin\ServiceController;

use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\WindowsCleaningServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('services', ServiceController::class);
    Route::resource('uploader', UploadController::class);
    Route::resource('windows_cleaning_services', WindowsCleaningServiceController::class);
    Route::resource('house_cleaning_services', HouseCleaningServiceController::class);
});