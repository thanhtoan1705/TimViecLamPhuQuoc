<?php

use App\Http\Controllers\Employer\History\HistoryController;
use App\Http\Controllers\Employer\Order\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/lich-su-hoat-dong', [HistoryController::class, 'index'])->name('history');
