<?php

use App\Http\Controllers\Client\CV\CvTemplateController;
use Illuminate\Support\Facades\Route;

Route::get('/cv/cv/cv', [CvTemplateController::class, 'preview'])->name('cv.previewTemplate');
Route::post('/save-cv', [CvTemplateController::class, 'saveCV'])->name('cv.saveCV');
Route::get('/cv/{id}', [CvTemplateController::class, 'show'])->name('cv.show');
Route::get('/api/cv-templates/{id}', [CvTemplateController::class, 'getTemplateData']);
Route::post('/cv/download', [CvTemplateController::class, 'download'])->name('cv.download');
Route::get('/mau-cv', [CvTemplateController::class, 'index'])->name('cv.list');
