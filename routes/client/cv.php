<?php

use App\Http\Controllers\Client\CV\CvTemplateController;
use Illuminate\Support\Facades\Route;

// Route::get('/cv/cv/cv', [CvTemplateController::class, 'preview'])->name('cv.previewTemplate');
Route::post('/save-cv', [CvTemplateController::class, 'saveCV'])->name('cv.saveCV')->middleware('auth');
Route::get('/cv/{id}', [CvTemplateController::class, 'show'])->name('cv.show');
Route::get('/api/cv-templates/{id}', [CvTemplateController::class, 'getTemplateData']);
// Route::post('/cv/download', [CvTemplateController::class, 'download'])->name('cv.download');
Route::get('/mau-cv', [CvTemplateController::class, 'index'])->name('cv.list');
Route::get('/check-existing-cv/{templateId}', [CvTemplateController::class, 'checkExistingCV'])->name('cv.check-existing');
Route::delete('/cv/{id}/delete-template', [CvTemplateController::class, 'deleteExistingTemplate'])->name('cv.delete-template');
Route::post('/save-cv', [CvTemplateController::class, 'saveCV'])->name('cv.saveCV')->middleware('auth');
Route::get('/api/cv-templates', [CvTemplateController::class, 'getTemplates']);

Route::middleware(['auth', 'is_candidate'])->group(function () {
    Route::get('/cv-da-luu', [CvTemplateController::class, 'savedCVs'])->name('cv.saved');
    Route::delete('/cv/{id}', [CvTemplateController::class, 'destroy'])->name('cv.destroy');
    Route::get('/cv/download/{id}', [CvTemplateController::class, 'downloadPDF'])->name('cv.download.pdf');
});

// Trang xem template riêng
// Route::get('/cv/mau-cv/{id}', [CvTemplateController::class, 'viewTemplate'])
//     ->name('cv.viewTemplate');

    Route::get('/cv/mau-cv/{id}', [CvTemplateController::class, 'viewTemplate'])
    ->name('cv.viewTemplate');

Route::get('/cv/preview/{id}', [CvTemplateController::class, 'previewTemplate'])->name('cv.preview');
