<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('organizations', function () {
        return 'organizations';
    })->name('organizations');

    Route::get('contacts', function () {
        return 'contacts';
    })->name('contacts');

    Route::get('reports', function () {
        return 'reports';
    })->name('reports');
});
