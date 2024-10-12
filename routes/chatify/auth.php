<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\Candidate\AuthController as AuthCandidateController;

Route::get('/chat/dang-nhap', [AuthCandidateController::class, 'login'])->name('login');
