<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/privacy', function () {
    return redirect()->route('privacy-policy');
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

// ─── Maintenance Report Word Export ─────────────────────────
Route::get('/maintenance-report/{id}/export', function ($id) {
    if (!auth()->check()) {
        abort(403);
    }
    return app(\App\Http\Controllers\MaintenanceReportController::class)->export($id);
})->name('maintenance.report.export');

// ─── Replacement Request Report Word Export ─────────────────
Route::get('/replacement-report/{id}/export', function ($id) {
    if (!auth()->check()) {
        abort(403);
    }
    return app(\App\Http\Controllers\ReplacementReportController::class)->export($id);
})->name('replacement.report.export');