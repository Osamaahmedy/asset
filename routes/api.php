<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\Api\MaintenanceRequestController;

// ─── حماية عامة لكل الـ API ───────────────────────────────────────────────────
Route::middleware(['api.security'])->group(function () {

    // ─── Login: أشد قيوداً (5 محاولات فقط) ──────────────────────────────────
    Route::middleware(['api.throttle:login'])
        ->post('/auth/login', [AuthController::class, 'login']);

    // ─── Routes المحمية بالتوكن ───────────────────────────────────────────────
    Route::middleware(['api.auth'])->group(function () {

        // Auth — قراءة/كتابة عادية
        Route::middleware(['api.throttle:read'])
            ->get('/auth/profile', [AuthController::class, 'profile']);

        Route::middleware(['api.throttle:write'])
            ->post('/auth/logout', [AuthController::class, 'logout']);

        // Assets — قراءة فقط
        Route::middleware(['api.throttle:read'])->group(function () {
            Route::get('/assets',      [AssetController::class, 'index']);
            Route::get('/assets/{id}', [AssetController::class, 'show']);
        });

        // Maintenance Requests — كتابة أشد
        Route::middleware(['api.throttle:write'])->group(function () {
            Route::post('/maintenance-requests',     [MaintenanceRequestController::class, 'store']);
            Route::get('/maintenance-requests',      [MaintenanceRequestController::class, 'myRequests']);
            Route::get('/maintenance-requests/{id}', [MaintenanceRequestController::class, 'show']);
        });
    });
});
