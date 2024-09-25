<?php

use App\Http\Controllers\Client\Page\PricingTableController;
use Illuminate\Support\Facades\Route;

Route::prefix('/bang-gia')->name('pricing.')->group(function () {

    Route::get('/danh-sach', [PricingTableController::class, 'index'])->name('index');

});
