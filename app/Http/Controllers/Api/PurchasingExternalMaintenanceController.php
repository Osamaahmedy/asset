<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExternalMaintenanceRequest;
use Illuminate\Http\Request;

class PurchasingExternalMaintenanceController extends Controller
{
    // ─── عرض جميع طلبات الصيانة الخارجية ──────────────────────────────────────

    public function index(Request $request)
    {
        $query = ExternalMaintenanceRequest::with([
            'maintenanceRequest.asset.department.administration.sector',
            'maintenanceRequest.asset.employee',
            'maintenanceRequest.asset.location',
            'maintenanceRequest.employee',
            'creator',
            'creatorEmployee',
        ]);

        // فلترة حسب الحالة
        if ($request->has('status') && in_array($request->status, ['pending', 'approved', 'completed', 'rejected'])) {
            $query->where('status', $request->status);
        }

        // بحث حسب اسم الأصل
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('maintenanceRequest.asset', function ($q) use ($search) {
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
        $externalRequest = ExternalMaintenanceRequest::with([
            'maintenanceRequest.asset.department.administration.sector',
            'maintenanceRequest.asset.employee',
            'maintenanceRequest.asset.location',
            'maintenanceRequest.employee',
            'creator',
            'creatorEmployee',
        ])->find($id);

        if (!$externalRequest) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $this->formatRequest($externalRequest),
        ]);
    }

    // ─── تعديل الطلب (الحالة + المبلغ + الملاحظة) ────────────────────────────

    public function update(Request $request, $id)
    {
        $request->validate([
            'status'           => 'sometimes|in:pending,approved,completed,rejected',
            'estimated_amount' => 'sometimes|numeric|min:0',
            'admin_note'       => 'sometimes|nullable|string|max:2000',
            'rejection_reason' => 'required_if:status,rejected|nullable|string|max:1000',
        ]);

        $externalRequest = ExternalMaintenanceRequest::find($id);

        if (!$externalRequest) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود',
            ], 404);
        }

        $updateData = [];

        if ($request->has('status')) {
            $updateData['status'] = $request->status;
        }

        if ($request->has('estimated_amount')) {
            $updateData['estimated_amount'] = $request->estimated_amount;
        }

        if ($request->has('admin_note')) {
            $updateData['admin_note'] = $request->admin_note;
        }

        if ($request->has('rejection_reason')) {
            $updateData['rejection_reason'] = $request->rejection_reason;
        }

        if (empty($updateData)) {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم إرسال أي بيانات للتعديل',
            ], 422);
        }

        $externalRequest->update($updateData);

        $externalRequest->load([
            'maintenanceRequest.asset.department.administration.sector',
            'maintenanceRequest.asset.employee',
            'maintenanceRequest.asset.location',
            'maintenanceRequest.employee',
            'creator',
            'creatorEmployee',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الطلب بنجاح',
            'data'    => $this->formatRequest($externalRequest),
        ]);
    }

    // ─── Helper: تنسيق بيانات الطلب ─────────────────────────────────────────

    private function formatRequest(ExternalMaintenanceRequest $r): array
    {
        $mr = $r->maintenanceRequest;
        $statusOptions = ExternalMaintenanceRequest::statusOptions();

        return [
            'id'                    => $r->id,
            'status'                => $r->status,
            'status_label'          => $statusOptions[$r->status] ?? $r->status,
            'technical_description' => $r->technical_description,
            'estimated_amount'      => $r->estimated_amount,
            'required_parts'        => $r->required_parts,
            'rejection_reason'      => $r->rejection_reason,
            'admin_note'            => $r->admin_note,
            'created_at'            => $r->created_at?->format('Y/m/d - h:i A'),

            // منشئ الطلب
            'created_by' => $r->creator ? [
                'id'   => $r->creator->id,
                'name' => $r->creator->name,
                'type' => 'user',
            ] : ($r->creatorEmployee ? [
                'id'   => $r->creatorEmployee->id,
                'name' => $r->creatorEmployee->name,
                'type' => 'employee',
            ] : null),

            // طلب الصيانة الداخلي
            'maintenance_request' => $mr ? [
                'id'                  => $mr->id,
                'problem_date'        => $mr->problem_date?->format('Y/m/d'),
                'problem_description' => $mr->problem_description,
                'status'              => $mr->status,
                'priority'            => $mr->priority,

                // الموظف اللي قدم طلب الصيانة
                'employee' => $mr->employee ? [
                    'id'   => $mr->employee->id,
                    'name' => $mr->employee->name,
                ] : null,

                // الأصل
                'asset' => $mr->asset ? [
                    'id'            => $mr->asset->id,
                    'name'          => $mr->asset->name,
                    'serial_number' => $mr->asset->serial_number,
                    'status'        => $mr->asset->status,
                    'location'      => $mr->asset->location?->name,
                    'assigned_to'   => $mr->asset->employee ? [
                        'id'   => $mr->asset->employee->id,
                        'name' => $mr->asset->employee->name,
                    ] : null,
                    'department' => $mr->asset->department ? [
                        'id'   => $mr->asset->department->id,
                        'name' => $mr->asset->department->name,
                    ] : null,
                    'administration' => $mr->asset->department?->administration ? [
                        'id'   => $mr->asset->department->administration->id,
                        'name' => $mr->asset->department->administration->name,
                    ] : null,
                    'sector' => $mr->asset->department?->administration?->sector ? [
                        'id'   => $mr->asset->department->administration->sector->id,
                        'name' => $mr->asset->department->administration->sector->name,
                    ] : null,
                ] : null,
            ] : null,
        ];
    }
}
