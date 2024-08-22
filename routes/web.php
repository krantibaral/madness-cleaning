<?php

use App\Http\Controllers\Admin\ServiceController;

use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () { 
    Route::resource('services', ServiceController::class);
    Route::resource('uploader', UploadController::class);
});