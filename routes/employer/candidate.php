<?php

use App\Http\Controllers\Employer\Candidate\CandidateController as EmployerCandidateController;
use Illuminate\Support\Facades\Route;

Route::get('/goi-y-ung-vien', [EmployerCandidateController::class, 'index'])->name('suggestions');
