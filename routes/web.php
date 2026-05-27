<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// use App\Http\Controllers\Api\NewsApiController;
// 
// Route::get('/news', [NewsApiController::class, 'index']);
// Route::get('/news/{id}', [NewsApiController::class, 'show']);

Route::get('/admin/assets/print-barcodes', function (\Illuminate\Http\Request $request) {
    if (!auth()->check()) abort(403);
    $ids = explode(',', $request->get('ids'));
    $assets = \App\Models\Asset::whereIn('id', $ids)->get();
    return view('assets.print-barcodes', compact('assets'));
})->name('assets.print-barcodes');