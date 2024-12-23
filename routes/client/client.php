<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\VideoCall\VideoCallController;
use App\Http\Controllers\Client\Page\PageController;
use App\Http\Controllers\Zalo\ZaloController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('client.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::post('/contact', [PageController::class, 'sendEmail'])->name('contact');
    Route::get('/gioi-thieu', [PageController::class, 'about'])->name('about');
    Route::get('/lien-he', [PageController::class, 'contact'])->name('lien-he');
    Route::post('/lien-he', [PageController::class, 'sendMailContact'])->name('lien-he.post');
    Route::get('/video-call', [VideoCallController::class, 'index'])->name('video-call');
    Route::get('/room', [VideoCallController::class, 'room'])->name('room');
    Route::post('/subscribe', [PageController::class, 'subscribe'])->name('subscribe');
    Route::get('subscribe/verify/{token}', [PageController::class, 'verifyEmail'])->name('verifyEmail');
    Route::get('/zalo/redirect', [ZaloController::class, 'redirect'])->name('zalo.redirect');
    Route::get('/zalo/callback', [ZaloController::class, 'callback'])->name('zalo.callback');
    Route::get('/zalo/auth', [ZaloController::class, 'redirect'])->name('zalo.auth');
    Route::get('/trang/{slug}', [PageController::class, 'show'])->name('page.detail');
});

