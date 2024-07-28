<?php

use Illuminate\Support\Facades\Route;

Route::prefix('tin-tuyen-dung')
    ->name('job.')
    ->group(function () {

        Route::get('/', function () {
            return view('client.job.index');
        });
    });
