<?php

use App\Http\Controllers\Client\Employer\EmployerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/nha-tuyen-dung')->name('employer.')->group(function () {

    Route::get('/', [EmployerController::class, 'index'])->name('index');
    Route::get('/chi-tiet', [EmployerController::class, 'single'])->name('index');
   
});
