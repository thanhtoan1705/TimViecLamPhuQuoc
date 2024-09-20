<?php

use App\Http\Controllers\Client\Employer\EmployerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/nha-tuyen-dung')->name('employer.')->group(function () {
    Route::get('/', [EmployerController::class, 'index'])->name('index');
    Route::get('/chi-tiet/{slug}', [EmployerController::class, 'single'])->name('single');
    Route::get('/thanh-toan', [EmployerController::class, 'payment'])->name('payment');
    Route::post('/thanh-toan', [EmployerController::class, 'processPayment'])->name('payment.process');
});
