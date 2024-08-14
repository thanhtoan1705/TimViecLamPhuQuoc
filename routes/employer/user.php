<?php

use App\Http\Controllers\Employer\User\AccountController;
use Illuminate\Support\Facades\Route;

Route::prefix('/nha-tuyen-dung')->name('candidate.')->group(function () {
    Route::get('/tai-khoan', [AccountController::class, 'index'])->name('employer.account');
});
