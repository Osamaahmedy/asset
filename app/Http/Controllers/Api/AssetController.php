<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AssetController extends Controller
{
    // ─── قائمة الأصول حسب مكتب الموظف ───────────────────────────────────────

    public function index(Request $request)
    {
        $employee = $request->user();

        if (!$employee->department_id) {
            return response()->json([
                'success' => false,
                'message' => 'الموظف غير مرتبط بأي مكتب',
            ], 403);
        }

        $perPage = min((int) $request->get('per_page', 15), 50);

        $assets = Asset::with([
                'assetType',
                'department.administration.sector',
                'employee',
                'vendor',
                'location',
                'maintenances' => fn($q) => $q->latest()->limit(1),
            ])
            ->visibleTo($employee)
            ->latest()
            ->paginate($perPage);

        return response()->json([
            'success'    => true,
            'total'      => $assets->total(),
            'per_page'   => $assets->perPage(),
            'page'       => $assets->currentPage(),
            'last_page'  => $assets->lastPage(),
            'data'       => $assets->getCollection()->map(fn($asset) => $this->formatAsset($asset)),
        ]);
    }

    // ─── تفاصيل أصل واحد ──────────────────────────────────────────────────────

    public function show(Request $request, $id)
    {
        $employee = $request->user();

        $asset = Asset::with([
                'assetType',
                'department.administration.sector',
                'employee',
                'vendor',
                'location',
                'maintenances' => fn($q) => $q->latest(),
            ])
            ->where('id', $id)
            ->visibleTo($employee)
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

    // ─── Helper: تنسيق بيانات الأصل ──────────────────────────────────────────

    private function formatAsset(Asset $asset, bool $detailed = false): array
    {
        $data = [
            'id'            => $asset->id,
            'name'          => $asset->name,
            'serial_number' => $asset->serial_number,
            'price'         => $asset->price,
            'status'        => $asset->status,

            'vendor' => $asset->vendor ? [
                'id'   => $asset->vendor->id,
                'name' => $asset->vendor->name,
            ] : null,

            'location' => $asset->location ? [
                'id'   => $asset->location->id,
                'name' => $asset->location->name,
            ] : null,

            'purchase_date' => $asset->purchase_date
                ? Carbon::parse($asset->purchase_date)->format('Y/m/d')
                : null,

            // نوع الأصل: شخصي أم تابع للوزارة
            'ownership' => [
                'is_personal' => (bool) $asset->is_personal,
                'label'       => $asset->is_personal ? 'شخصي' : 'تابع للوزارة',
            ],

            'type' => $asset->assetType ? [
                'id'   => $asset->assetType->id,
                'name' => $asset->assetType->name,
            ] : null,

            'department' => $asset->department ? [
                'id'   => $asset->department->id,
                'name' => $asset->department->name,
            ] : null,

            'administration' => $asset->department?->administration ? [
                'id'   => $asset->department->administration->id,
                'name' => $asset->department->administration->name,
            ] : null,

            'sector' => $asset->department?->administration?->sector ? [
                'id'   => $asset->department->administration->sector->id,
                'name' => $asset->department->administration->sector->name,
            ] : null,

            'assigned_to' => $asset->employee ? [
                'id'       => $asset->employee->id,
                'name'     => $asset->employee->name,
                'phone'    => $asset->employee->phone,
                'position' => $asset->employee->position,
            ] : null,

            'maintenance' => [
                'status'       => $asset->maintenance_status,
                'last_date'    => $asset->last_maintenance_date
                    ? Carbon::parse($asset->last_maintenance_date)->format('Y/m/d')
                    : null,
                'cycle_months' => $asset->maintenance_cycle_months,
                'due_date'     => $asset->maintenance_due_date
                    ? Carbon::parse($asset->maintenance_due_date)->format('Y/m/d')
                    : null,
            ],

            'warranty' => [
                'months'          => $asset->warranty_months,
                'start_date'      => $asset->warranty_start_date,
                'expiry_date'     => $asset->warranty_expiry_date,
                'is_expired'      => $asset->is_warranty_expired,
                'days_remaining'  => $asset->warranty_days_remaining,
            ],

            // رابط الصورة إن وُجدت
            'image_url' => $asset->getFirstMediaUrl('image') ?: null,

            'created_at' => $asset->created_at
                ? Carbon::parse($asset->created_at)->format('Y/m/d')
                : null,
        ];

        if ($detailed) {
            $data['maintenances'] = $asset->maintenances->map(fn($m) => [
                'id'          => $m->id,
                'note'        => $m->note,
                'date'        => $m->maintenance_date
                    ? Carbon::parse($m->maintenance_date)->format('Y/m/d')
                    : null,
                'status'      => $m->status,
            ]);

            $data['document_url'] = $asset->getFirstMediaUrl('document') ?: null;
        }

        return $data;
    }
}
