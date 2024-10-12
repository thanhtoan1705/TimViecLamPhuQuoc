<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CV\CvTemplateController;

use Illuminate\Http\Request;
use App\Models\CvField;

Route::get('/cv/cv/cv', [CvTemplateController::class, 'preview'])->name('cv.previewTemplate');
Route::post('/save-cv', [CvTemplateController::class, 'saveCV'])->name('cv.saveCV');
Route::get('/cv/{id}', [CvTemplateController::class, 'show'])->name('cv.show');
Route::get('/api/cv-templates/{id}', [CvTemplateController::class, 'getTemplateData']);
Route::post('/cv/download', [CvTemplateController::class, 'download'])->name('cv.download');
