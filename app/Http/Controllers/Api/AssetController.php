<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    // ─── قائمة الأصول حسب مكتب الموظف ──────────────────────────────────────

    public function index(Request $request)
    {
        $employee = $request->user();

        if (!$employee->department_id) {
            return response()->json([
                'success' => false,
                'message' => 'الموظف غير مرتبط بأي مكتب',
            ], 403);
        }

        $assets = Asset::with([
                'assetType',
                'department.administration.sector',
                'employee',
                'maintenances' => fn($q) => $q->latest()->limit(1),
            ])
            ->where('department_id', $employee->department_id)
            ->latest()
            ->get()
            ->map(fn($asset) => $this->formatAsset($asset));

        return response()->json([
            'success' => true,
            'total'   => $assets->count(),
            'data'    => $assets,
        ]);
    }

    // ─── تفاصيل أصل واحد ─────────────────────────────────────────────────────

    public function show(Request $request, $id)
    {
        $employee = $request->user();

        $asset = Asset::with([
                'assetType',
                'department.administration.sector',
                'employee',
                'maintenances' => fn($q) => $q->latest(),
            ])
            ->where('id', $id)
            ->where('department_id', $employee->department_id)
            ->first();

        if (!$asset) {
            return response()->json([
                'success' => false,
                'message' => 'الأصل غير موجود أو لا تملك صلاحية الوصول إليه',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $this->formatAsset($asset, detailed: true),
        ]);
    }

    // ─── Helper: تنسيق بيانات الأصل ─────────────────────────────────────────

    private function formatAsset(Asset $asset, bool $detailed = false): array
    {
        $data = [
            'id'            => $asset->id,
            'name'          => $asset->name,
            'serial_number' => $asset->serial_number,
            'price'         => $asset->price,
            'vendor'        => $asset->vendor,
            'purchase_date' => $asset->purchase_date,

            // النوع
            'type' => $asset->assetType ? [
                'id'   => $asset->assetType->id,
                'name' => $asset->assetType->name,
            ] : null,

            // المكتب
            'department' => $asset->department ? [
                'id'   => $asset->department->id,
                'name' => $asset->department->name,
            ] : null,

            // الإدارة
            'administration' => $asset->department?->administration ? [
                'id'   => $asset->department->administration->id,
                'name' => $asset->department->administration->name,
            ] : null,

            // القطاع
            'sector' => $asset->department?->administration?->sector ? [
                'id'   => $asset->department->administration->sector->id,
                'name' => $asset->department->administration->sector->name,
            ] : null,

            // الموظف المسؤول
            'assigned_to' => $asset->employee ? [
                'id'       => $asset->employee->id,
                'name'     => $asset->employee->name,
                'phone'    => $asset->employee->phone,
                'position' => $asset->employee->position,
            ] : null,

            // حالة الصيانة
            'maintenance' => [
                'status'              => $asset->maintenance_status,
                'last_date'           => $asset->last_maintenance_date,
                'cycle_months'        => $asset->maintenance_cycle_months,
                'due_date'            => $asset->maintenance_due_date,
            ],

            // الصورة

            'created_at' => $asset->created_at?->format('Y/m/d'),
        ];

        // بيانات إضافية في وضع التفصيل


        return $data;
    }
}
