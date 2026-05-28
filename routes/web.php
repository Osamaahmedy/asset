<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// use App\Http\Controllers\Api\NewsApiController;
// 
// Route::get('/news', [NewsApiController::class, 'index']);
// Route::get('/news/{id}', [NewsApiController::class, 'show']);

Route::get('/assets/print-barcodes', function (\Illuminate\Http\Request $request) {
    if (!auth()->check() || !auth()->user()->can('عرض الأصول')) {
        abort(403);
    }
    
    $ids = array_filter(explode(',', $request->get('ids', '')));
    
    $userDepartmentIds = auth()->user()
        ->departments()
        ->pluck('departments.id')
        ->toArray();

    if (empty($userDepartmentIds)) {
        abort(403);
    }

    $assets = \App\Models\Asset::whereIn('id', $ids)
        ->whereIn('department_id', $userDepartmentIds)
        ->get();

    return view('assets.print-barcodes', compact('assets'));
})->name('assets.print-barcodes');