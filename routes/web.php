<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelUploadController;


Route::get('/', function () {
    return view('excel.upload');
});

Route::get('/excel-upload', [ExcelUploadController::class, 'show'])->name('excel.upload');
Route::post('/excel-upload', [ExcelUploadController::class, 'store'])->name('excel.upload.store');
