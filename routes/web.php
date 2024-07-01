<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;


Route::get('/', function() {
    return view('dashboard.home');
});

// Ruta para el Inicio de Sesion
Route::get('/login', [UsersController::class, 'getViewLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authLogin']);

// Ruta para el registro de un usuario.
Route::get('/registro', [UsersController::class, 'getViewRegister'])->middleware('guest');
Route::post('/registro', [UsersController::class, 'create']);

// Ruta de Cerrar Sesion
Route::get('/logout', [AuthController::class, 'authLogout']);



Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);


    Route::get('/dashboard/admin', [AdminController::class, 'getViewDashboard']);


    Route::get('/dashboard/admin/productos', [AdminController::class, 'getProducts']);
    Route::post('/dashboard/admin/productos', [AdminController::class, 'createProduct']);
    Route::put('/dashboard/admin/productos/{id}', [AdminController::class, 'updateProduct'])->name('product.update');
    Route::delete('/dashboard/admin/productos/{id}', [AdminController::class, 'deleteProduct'])->name('product.delete');

    Route::get('/dashboard/admin/categorias', [AdminController::class, 'getCategories']);
    Route::post('/dashboard/admin/categorias', [AdminController::class, 'createCategory']);
    Route::put('/dashboard/admin/categorias/{id}', [AdminController::class, 'updateCategory'])->name('category.update');
    Route::delete('/dashboard/admin/categorias/{id}', [AdminController::class, 'deleteCategory'])->name('category.delete');

});