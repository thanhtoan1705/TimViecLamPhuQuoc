<?php


use App\Http\Controllers\Client\Job\JobController;
use Illuminate\Support\Facades\Route;

Route::prefix('tin-tuyen-dung')
    ->name('job.')
    ->group(function () {

        Route::get('/', function () {
            return view('client.job.index');
        });

        Route::get('/chi-tiet', [JobController::class, 'single'])->name('single');
    });


