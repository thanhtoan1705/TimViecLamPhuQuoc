<?php

use App\Http\Controllers\Client\Candidate\CandidateController;
use App\Http\Controllers\Employer\Candidate\CandidateController as EmployerCandidateController;
use Illuminate\Support\Facades\Route;

Route::prefix('/nha-tuyen-dung')->name('candidate.')->group(function(){
    Route::get('/goi-y-ung-vien', [EmployerCandidateController::class, 'index'])->name('candidate.suggestions');
});
