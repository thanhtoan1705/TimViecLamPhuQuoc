<?php


use App\Http\Controllers\Client\Auth\AuthController;
use App\Http\Controllers\Client\Candidate\CandidateController;
use App\Http\Controllers\Client\Employer\EmployerController;
use Illuminate\Support\Facades\Route;


Route::get('/ung-vien/dang-nhap', [CandidateController::class, 'login'])->name('candidate.login');
Route::get('/ung-vien/dang-ky', [CandidateController::class, 'register'])->name('candidate.register');
Route::get('/nha-tuyen-dung/dang-nhap', [EmployerController::class, 'login'])->name('employer.login');
Route::get('/nha-tuyen-dung/dang-ky', [EmployerController::class, 'register'])->name('employer.register');
Route::get('dat-lai-mat-khau', [AuthController::class, 'reset'])->name('reset');
Route::get('tao-moi-mat-khau', [AuthController::class, 'newPass'])->name('newPass');
Route::get('nhap-otp', [AuthController::class, 'otp'])->name('OTP');
