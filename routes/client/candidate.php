<?php

use App\Http\Controllers\Client\Candidate\CandidateController;
use Illuminate\Support\Facades\Route;

Route::prefix('/ung-vien')->name('candidate.')->group(function(){
    Route::get('/noi-bat', [CandidateController::class, 'hot'])->name('hot');
    Route::get('/ho-so', [CandidateController::class, 'profile'])->name('profile');
    Route::get('/tuyen-dung-da-xem', [CandidateController::class, 'watched'])->name('watched');
    Route::get('/thong-bao', [CandidateController::class, 'notification'])->name('notification');
    Route::get('/quan-ly-cv', [CandidateController::class, 'index'])->name('cv.management');

    Route::get('/viec-lam-da-luu', [CandidateController::class, 'saveJob'])->name('saveJob');
    Route::get('/chi-tiet', [CandidateController::class, 'detail'])->name('detail');
});
