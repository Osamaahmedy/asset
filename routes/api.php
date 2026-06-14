<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\Api\MaintenanceRequestController;
use App\Http\Controllers\Api\PurchasingReplacementController;
use App\Http\Controllers\Api\PurchasingExternalMaintenanceController;

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
        Route::middleware(['api.throttle:write'])
            ->post('/auth/change-password', [AuthController::class, 'changePassword']);

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

        // ─── مسارات أمين المشتريات ─────────────────────────────────────────
        Route::middleware(['api.purchasing'])->prefix('purchasing')->group(function () {

            // طلبات الاستبدال — عرض + موافقة/رفض
            Route::middleware(['api.throttle:read'])->group(function () {
                Route::get('/replacement-requests',      [PurchasingReplacementController::class, 'index']);
                Route::get('/replacement-requests/{id}', [PurchasingReplacementController::class, 'show']);
            });
            Route::middleware(['api.throttle:write'])->group(function () {
                Route::post('/replacement-requests/{id}/approve', [PurchasingReplacementController::class, 'approve']);
                Route::post('/replacement-requests/{id}/reject',  [PurchasingReplacementController::class, 'reject']);
            });

            // الصيانة الخارجية — عرض + تعديل (حالة + مبلغ + ملاحظة)
            Route::middleware(['api.throttle:read'])->group(function () {
                Route::get('/external-maintenance',      [PurchasingExternalMaintenanceController::class, 'index']);
                Route::get('/external-maintenance/{id}', [PurchasingExternalMaintenanceController::class, 'show']);
            });
            Route::middleware(['api.throttle:write'])->group(function () {
                Route::put('/external-maintenance/{id}', [PurchasingExternalMaintenanceController::class, 'update']);
            });
        });
    });
});
