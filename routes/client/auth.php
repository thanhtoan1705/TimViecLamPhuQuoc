<?php

use App\Http\Controllers\Client\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('dat-lai-mat-khau', [AuthController::class, 'reset'])->name('reset');
Route::get('tao-moi-mat-khau', [AuthController::class, 'newPass'])->name('newPass');
Route::get('nhap-otp', [AuthController::class, 'otp'])->name('OTP');
