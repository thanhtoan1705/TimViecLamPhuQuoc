<?php

use App\Http\Controllers\Employer\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/bang-tin', [DashboardController::class, 'index'])->name('index');
});
