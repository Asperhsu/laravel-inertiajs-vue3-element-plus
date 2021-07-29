<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationsController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('organizations')->name('organizations.')->group(function () {
        Route::get('/', [OrganizationsController::class, 'index'])->name('index');
        Route::get('/create', [OrganizationsController::class, 'create'])->name('create');
        Route::post('/', [OrganizationsController::class, 'store'])->name('store');
        Route::post('/{organization}/edit', [OrganizationsController::class, 'edit'])->name('edit');
        Route::put('/{organization}', [OrganizationsController::class, 'update'])->name('update');
        Route::delete('/{organization}', [OrganizationsController::class, 'destroy'])->name('destroy');
    });

    Route::get('contacts', function () {
        return 'contacts';
    })->name('contacts');

    Route::get('reports', function () {
        return 'reports';
    })->name('reports');
});
