<?php

use App\Http\Controllers\Employer\Interview\InterviewController;
use Illuminate\Support\Facades\Route;

    Route::get('/phong-van', [InterviewController::class, 'index'])->name('interview');
    Route::get('/chi-tiet-phong-van', [InterviewController::class, 'detail'])->name('interview.detail');
