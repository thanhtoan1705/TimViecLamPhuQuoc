<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Page\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('client.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/gioi-thieu', [PageController::class, 'about'])->name('about');
});

