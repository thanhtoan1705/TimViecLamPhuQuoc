<?php

use App\Http\Controllers\Client\Post\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('bai-viet')
    ->name('post.')
    ->group(function () {

        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/chi-tiet', [PostController::class, 'detail'])->name('detail');

    });
