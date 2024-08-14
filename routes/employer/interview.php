<?php

use App\Http\Controllers\Employer\Interview\InterviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('/nha-tuyen-dung')->name('candidate.')->group(function () {
    Route::get('/phong-van', [InterviewController::class, 'index'])->name('employer.interview');
    Route::get('/chi-tiet-phong-van', [InterviewController::class, 'detail'])->name('employer.interview.detail');
});
