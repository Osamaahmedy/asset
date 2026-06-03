<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AssetReplacementRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class PurchasingReplacementController extends Controller
{
    // ─── عرض جميع طلبات الاستبدال ───────────────────────────────────────────

    public function index(Request $request)
    {
        $query = AssetReplacementRequest::with([
            'asset.department.administration.sector',
            'asset.employee',
            'asset.location',
            'asset.assetType',
            'requester',
            'approver',
            'approverEmployee',
            'targetLocation',
        ]);

        // فلترة حسب الحالة
        if ($request->has('status') && in_array($request->status, ['pending', 'approved', 'rejected'])) {
            $query->where('status', $request->status);
        }

        // بحث حسب اسم الأصل
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('asset', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('serial_number', 'like', "%{$search}%");
            });
        }

        $requests = $query->latest()->get();

        return response()->json([
            'success' => true,
            'total'   => $requests->count(),
            'data'    => $requests->map(fn($r) => $this->formatRequest($r)),
        ]);
    }

    // ─── تفاصيل طلب واحد ─────────────────────────────────────────────────────

    public function show(Request $request, $id)
    {
        $replacementRequest = AssetReplacementRequest::with([
            'asset.department.administration.sector',
            'asset.employee',
            'asset.location',
            'asset.assetType',
            'requester',
            'approver',
            'approverEmployee',
            'targetLocation',
        ])->find($id);

        if (!$replacementRequest) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $this->formatRequest($replacementRequest),
        ]);
    }

    // ─── الموافقة على طلب ─────────────────────────────────────────────────────

    public function approve(Request $request, $id)
    {
        $replacementRequest = AssetReplacementRequest::find($id);

        if (!$replacementRequest) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود',
            ], 404);
        }

        if ($replacementRequest->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'لا يمكن الموافقة على هذا الطلب — الحالة الحالية: ' . $replacementRequest->status,
            ], 422);
        }

        $employee = $request->user();

        $replacementRequest->update([
            'status'               => 'approved',
            'approver_employee_id' => $employee->id,
            'actioned_at'          => now(),
        ]);

        $replacementRequest->load([
            'asset.department.administration.sector',
            'asset.employee',
            'asset.location',
            'requester',
            'approverEmployee',
            'targetLocation',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تمت الموافقة على طلب الاستبدال بنجاح',
            'data'    => $this->formatRequest($replacementRequest),
        ]);
    }

    // ─── رفض طلب ──────────────────────────────────────────────────────────────

    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:1000',
        ]);

        $replacementRequest = AssetReplacementRequest::find($id);

        if (!$replacementRequest) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود',
            ], 404);
        }

        if ($replacementRequest->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'لا يمكن رفض هذا الطلب — الحالة الحالية: ' . $replacementRequest->status,
            ], 422);
        }

        $employee = $request->user();

        $replacementRequest->update([
            'status'               => 'rejected',
            'rejection_reason'     => $request->rejection_reason,
            'approver_employee_id' => $employee->id,
            'actioned_at'          => now(),
        ]);

        $replacementRequest->load([
            'asset.department.administration.sector',
            'asset.employee',
            'asset.location',
            'requester',
            'approverEmployee',
            'targetLocation',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم رفض طلب الاستبدال',
            'data'    => $this->formatRequest($replacementRequest),
        ]);
    }

    // ─── Helper: تنسيق بيانات الطلب ─────────────────────────────────────────

    private function formatRequest(AssetReplacementRequest $r): array
    {
        return [
            'id'     => $r->id,
            'status' => $r->status,
            'reason' => $r->reason,
            'reason_label' => match ($r->reason) {
                'completely_damaged' => 'تالف بالكامل',
                'expired'            => 'منتهي الصلاحية',
                'other'              => 'أخرى',
                default              => $r->reason,
            },
            'description'      => $r->description,
            'notes'            => $r->notes,
            'rejection_reason' => $r->rejection_reason,
            'actioned_at'      => $r->actioned_at?->format('Y/m/d H:i'),
            'created_at'       => $r->created_at?->format('Y/m/d - h:i A'),

            // مقدم الطلب (User من لوحة التحكم)
            'requester' => $r->requester ? [
                'id'   => $r->requester->id,
                'name' => $r->requester->name,
            ] : null,

            // الموقع المستهدف
            'target_location' => $r->targetLocation ? [
                'id'   => $r->targetLocation->id,
                'name' => $r->targetLocation->name,
            ] : null,

            // من وافق/رفض
            'approver' => $r->approver ? [
                'id'   => $r->approver->id,
                'name' => $r->approver->name,
                'type' => 'user',
            ] : ($r->approverEmployee ? [
                'id'   => $r->approverEmployee->id,
                'name' => $r->approverEmployee->name,
                'type' => 'employee',
            ] : null),

            // بيانات الأصل
            'asset' => $r->asset ? [
                'id'            => $r->asset->id,
                'name'          => $r->asset->name,
                'serial_number' => $r->asset->serial_number,
                'price'         => $r->asset->price,
                'status'        => $r->asset->status,
                'type'          => $r->asset->assetType?->name,
                'location'      => $r->asset->location?->name,
                'assigned_to'   => $r->asset->employee ? [
                    'id'   => $r->asset->employee->id,
                    'name' => $r->asset->employee->name,
                ] : null,
                'department' => $r->asset->department ? [
                    'id'   => $r->asset->department->id,
                    'name' => $r->asset->department->name,
                ] : null,
                'administration' => $r->asset->department?->administration ? [
                    'id'   => $r->asset->department->administration->id,
                    'name' => $r->asset->department->administration->name,
                ] : null,
                'sector' => $r->asset->department?->administration?->sector ? [
                    'id'   => $r->asset->department->administration->sector->id,
                    'name' => $r->asset->department->administration->sector->name,
                ] : null,
            ] : null,
        ];
    }
}
