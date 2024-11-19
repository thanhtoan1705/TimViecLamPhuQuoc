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

Route::middleware(['auth'])->group(function () {
    Route::get('/cv-da-luu', [CvTemplateController::class, 'savedCVs'])->name('cv.saved');
    Route::delete('/cv/{id}', [CvTemplateController::class, 'destroy'])->name('cv.destroy');
    Route::get('/cv/download/{id}', [CvTemplateController::class, 'downloadPDF'])->name('cv.download.pdf');
});

Route::get('/cv/template/{id}', [CvTemplateController::class, 'previewTemplate'])
    ->name('cv.previewTemplate')
    ->where('id', '[0-9]+');

// Trang danh sách template
Route::get('/cv/templates', [CvTemplateController::class, 'listTemplates'])
    ->name('cv.templates');

// Trang xem template riêng
Route::get('/cv/template-view/{id}', [CvTemplateController::class, 'viewTemplate'])
    ->name('cv.viewTemplate')
    ->where('id', '[1-9]+');
