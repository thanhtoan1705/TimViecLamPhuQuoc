<?php

use App\Http\Controllers\Client\Employer\EmployerController;
use App\Http\Controllers\Client\Payment\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix('/nha-tuyen-dung')->name('employer.')->group(function () {
    Route::get('/', [EmployerController::class, 'index'])->name('index');
    Route::get('/chi-tiet/{slug}', [EmployerController::class, 'single'])->name('single');
    Route::get('/thanh-toan', [PaymentController::class, 'payment'])->name('payment');
    Route::post('/thanh-toan', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/vnpay/callback', [PaymentController::class, 'handleVnPayCallback'])->name('vnpay.callback');
    Route::get('/zalopay/callback', [PaymentController::class, 'handleZaloPayCallback'])->name('zalopay.callback');
    Route::get('/momo/callback', [PaymentController::class, 'handleMomoCallback'])->name('momo.callback');
    Route::get('/paypal/callback', [PaymentController::class, 'handlePaypalCallback'])->name('paypal.callback');
    Route::get('/paypal/cancel', [PaymentController::class, 'cancelTransaction'])->name('paypal.cancel');
});
