<?php


use App\Http\Controllers\Employer\Order\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/theo-doi-don-hang', [OrderController::class, 'index'])->name('order');
