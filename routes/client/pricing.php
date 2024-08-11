<?php

use App\Http\Controllers\Client\Page\PricingTableController;
use Illuminate\Support\Facades\Route;


Route::get('/bang-gia-dang-tin', [PricingTableController::class, 'index'])->name('index');

