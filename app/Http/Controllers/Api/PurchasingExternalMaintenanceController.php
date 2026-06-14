<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExternalMaintenanceRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PurchasingExternalMaintenanceController extends Controller
{
    private array $withRelations = [
        'maintenanceRequest.asset.department.administration.sector',
        'maintenanceRequest.asset.employee',
        'maintenanceRequest.asset.location',
        'maintenanceRequest.employee',
        'creator',
        'creatorEmployee',
    ];

    // ─── عرض جميع طلبات الصيانة الخارجية ──────────────────────────────────

    public function index(Request $request): JsonResponse
    {
        $query = ExternalMaintenanceRequest::with($this->withRelations);

        // فلترة حسب الحالة
        if ($request->filled('status') && in_array($request->status, ['pending', 'approved', 'completed', 'rejected'])) {
            $query->where('status', $request->status);
        }

        // فلترة حسب العملة
        if ($request->filled('currency') && in_array($request->currency, ['YER', 'SAR', 'USD', 'EUR'])) {
            $query->where('currency', $request->currency);
        }

        // بحث حسب اسم الأصل أو الرقم التسلسلي
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('maintenanceRequest.asset', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('serial_number', 'like', "%{$search}%");
            });
        }

        $perPage  = (int) $request->get('per_page', 15);
        $requests = $query->latest()->paginate($perPage);

        return response()->json([
            'success'      => true,
            'total'        => $requests->total(),
            'current_page' => $requests->currentPage(),
            'last_page'    => $requests->lastPage(),
            'per_page'     => $requests->perPage(),
            'data'         => collect($requests->items())->map(fn($r) => $this->formatRequest($r)),
        ]);
    }

    // ─── تفاصيل طلب واحد ─────────────────────────────────────────────────

    public function show($id): JsonResponse
    {
        try {
            $externalRequest = ExternalMaintenanceRequest::with($this->withRelations)
                ->findOrFail($id);
        } catch (ModelNotFoundException) {
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

    // ─── تعديل الطلب (الحالة + المبلغ + العملة + الملاحظة) ───────────────

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'status'           => 'sometimes|in:pending,approved,completed,rejected',
            'estimated_amount' => 'sometimes|numeric|min:0',
            'currency'         => 'sometimes|in:YER,SAR,USD,EUR',
            'admin_note'       => 'sometimes|nullable|string|max:2000',
            'rejection_reason' => 'required_if:status,rejected|nullable|string|max:1000',
        ]);

        try {
            $externalRequest = ExternalMaintenanceRequest::findOrFail($id);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود',
            ], 404);
        }

        $updateData = [];

        foreach (['status', 'estimated_amount', 'currency', 'admin_note', 'rejection_reason'] as $field) {
            if ($request->has($field)) {
                $updateData[$field] = $request->$field;
            }
        }

        if (empty($updateData)) {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم إرسال أي بيانات للتعديل',
            ], 422);
        }

        $externalRequest->update($updateData);
        $externalRequest->load($this->withRelations);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الطلب بنجاح',
            'data'    => $this->formatRequest($externalRequest),
        ]);
    }

    // ─── Helper: تنسيق بيانات الطلب ──────────────────────────────────────

    private function formatRequest(ExternalMaintenanceRequest $r): array
    {
        $mr             = $r->maintenanceRequest;
        $statusOptions  = ExternalMaintenanceRequest::statusOptions();
        $currencyOptions = ExternalMaintenanceRequest::currencyOptions();

        return [
            'id'                    => $r->id,
            'status'                => $r->status,
            'status_label'          => $statusOptions[$r->status] ?? $r->status,
            'technical_description' => $r->technical_description,
            'estimated_amount'      => $r->estimated_amount,
            'currency'              => $r->currency,
            'currency_label'        => $currencyOptions[$r->currency] ?? $r->currency,
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

                'employee' => $mr->employee ? [
                    'id'   => $mr->employee->id,
                    'name' => $mr->employee->name,
                ] : null,

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
