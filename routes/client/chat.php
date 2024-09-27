<?php

use App\Http\Controllers\ChatSystem\HomeController;

use Illuminate\Support\Facades\Route;

Route::prefix('/hop-thoai')->name('chat.')->group(function () {
    Route::get('/tin-nhan', [HomeController::class, 'index'])->name('index');
});

