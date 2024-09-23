<?php

use App\Http\Controllers\Client\Candidate\CandidateController;
use Illuminate\Support\Facades\Route;

Route::prefix('/ung-vien')->name('candidate.')->group(function(){
    Route::get('/noi-bat', [CandidateController::class, 'hot'])->name('hot');
    Route::get('/ho-so', [CandidateController::class, 'profile'])->name('profile');
    Route::get('/tuyen-dung-da-xem', [CandidateController::class, 'watched'])->name('watched');
    Route::get('/thong-bao', [CandidateController::class, 'notification'])->name('notification');
    Route::get('/quan-ly-cv', [CandidateController::class, 'index'])->name('cv.management');
    Route::get('/viec-lam-da-luu', [CandidateController::class, 'viewSavedJobs'])->name('viewSavedJobs');
    Route::post('/save-job/{job_id}', [CandidateController::class, 'saveJob'])->name('saveJob');
    Route::get('/doi-mat-khau', [CandidateController::class, 'editPassword'])->name('change-password');
    Route::put('/doi-mat-khau', [CandidateController::class, 'updatePassword'])->name('update_password');
});
Route::get('/{slug}', [CandidateController::class, 'detail'])->name('candidate.detail');
Route::get('/districts/{province}', [CandidateController::class, 'getDistricts']);
Route::get('/wards/{district}', [CandidateController::class, 'getWards']);


