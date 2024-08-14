<?php

use App\Http\Controllers\Employer\Service\ServiceController;
use Illuminate\Support\Facades\Route;


Route::prefix('/dich-vu')->name('service.')->group(function () {

    Route::get('/', [ServiceController::class, 'index'])->name('index');

});

