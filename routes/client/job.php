<?php


use App\Http\Controllers\Client\Job\JobController;
use Illuminate\Support\Facades\Route;

Route::prefix('tin-tuyen-dung')
    ->name('job.')
    ->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('index');
//        Route::get('/chi-tiet/{employerSlug}/{jobSlug}', [JobController::class, 'single'])->name('single');
        Route::post('jobs/{id}/apply', [JobController::class, 'applyForJob'])->name('apply');
    });
Route::get('/{jobSlug}', [JobController::class, 'single'])->name('job.single');

