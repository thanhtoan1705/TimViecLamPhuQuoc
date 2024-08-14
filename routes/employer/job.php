<?php

use App\Http\Controllers\Employer\Job\JobPostController;
use Illuminate\Support\Facades\Route;


Route::prefix('tin-tuyen-dung')->name('job.')->group(function () {

    Route::get('/them-moi', [JobPostController::class, 'create'])->name('create');
});


