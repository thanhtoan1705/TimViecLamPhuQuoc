<?php

use App\Http\Controllers\Employer\Voucher\VoucherController;
use Illuminate\Support\Facades\Route;

Route::get('/ma-giam-gia', [VoucherController::class, 'promotion'])->name('promotion');