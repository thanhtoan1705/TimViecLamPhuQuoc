<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


//Custom logout business
Route::get('/logout/business', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('filament.employer.auth.login'); // Chuyển hướng đến trang login
})->name('filament.business.auth.logout');
