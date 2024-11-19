<?php

use App\Http\Controllers\Client\Post\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')
    ->name('post.')
    ->group(function () {

        Route::get('/bai-viet', [PostController::class, 'index'])->name('index');
        Route::get('/bai-viet/{slug}.html', [PostController::class, 'detail'])->name('detail');

    });
