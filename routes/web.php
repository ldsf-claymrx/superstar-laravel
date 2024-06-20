<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;


Route::get('/', [UsersController::class, 'getViewLogin'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'authLogin']);
Route::get('/registro', [UsersController::class, 'getViewRegister'])->middleware('guest');
Route::post('/registro', [UsersController::class, 'create']);
Route::get('/logout', [AuthController::class, 'authLogout']);



Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});