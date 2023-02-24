<?php

use App\Http\Controllers\DistributorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ProdukSatuController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [LoginController::class, 'register'])->name('register');
route::post('register', [LoginController::class, 'registerProcess']);

Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UsersController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('distributor', DistributorController::class);
    Route::resource('produksatu', ProdukSatuController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::get('/exportpdf', [UsersController::class, 'exportpdf'])->name('exportpdf');
});
