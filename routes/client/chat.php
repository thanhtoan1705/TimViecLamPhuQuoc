<?php

use App\Http\Controllers\ChatSystem\ContactController;
use App\Http\Controllers\ChatSystem\GroupController;
use App\Http\Controllers\ChatSystem\HomeController;
use App\Http\Controllers\ChatSystem\ProfileController;
use App\Http\Controllers\ChatSystem\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('/hop-thoai')->name('chat.')->group(function () {
    Route::get('/tin-nhan', [HomeController::class, 'index'])->name('chat');
    Route::get('/ho-so', [ProfileController::class, 'index'])->name('profile');
    Route::get('/lien-he', [ContactController::class, 'index'])->name('contact');
    Route::get('/nhom', [GroupController::class, 'index'])->name('group');
    Route::get('/cai-dat', [SettingController::class, 'index'])->name('setting');
});

