<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MaintenanceRequestStoreRequest;
use App\Models\MaintenanceRequest;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MaintenanceRequestController extends Controller
{
    // ─── إرسال طلب صيانة جديد ────────────────────────────────────────────────

    public function store(MaintenanceRequestStoreRequest $request)
    {
        $employee = $request->user();

        // 1. استخدام قفل ذري (Atomic Lock) على مستوى التطبيق لمنع التزامن على نفس الأصل
        $lockKey = 'maintenance_request_lock_' . $request->asset_id;
        $lock = Cache::lock($lockKey, 10); // قفل لمدة 10 ثوانٍ كأقصى حد

        try {
            // محاولة الحصول على القفل بدون انتظار (أو انتظار خفيف جداً)
            // إذا كان القفل محجوزاً بالفعل من طلب آخر متزامن، نرجع رد 429
            if (!$lock->get()) {
                return response()->json([
                    'success' => false,
                    'message' => 'الطلب قيد المعالجة حالياً، يرجى المحاولة بعد قليل.',
                ], 429);
            }

            // 2. استخدام Transaction مع Pessimistic Lock لمنع الـ Race Condition في قاعدة البيانات
            return DB::transaction(function () use ($request, $employee) {
                
                // جلب الأصل مع قفل للقراءة والتعديل لمنع أي معاملة أخرى من تعديله متزامناً
                $asset = Asset::where('id', $request->asset_id)
                    ->where('department_id', $employee->department_id)
                    ->lockForUpdate()
                    ->first();

                if (!$asset) {
                    return response()->json([
                        'success' => false,
                        'message' => 'الأصل غير موجود أو لا ينتمي لمكتبك',
                    ], 403);
                }

                // فحص وجود طلب معلق أو مؤجل مع قفل
                $existing = MaintenanceRequest::where('asset_id', $request->asset_id)
                    ->whereIn('status', ['pending', 'postponed'])
                    ->lockForUpdate()
                    ->exists();

                if ($existing) {
                    return response()->json([
                        'success' => false,
                        'message' => 'يوجد طلب صيانة قيد الانتظار أو مؤجل لهذا الأصل بالفعل',
                    ], 409);
                }

                // إنشاء طلب الصيانة
                $maintenanceRequest = MaintenanceRequest::create([
                    'asset_id'            => $request->asset_id,
                    'employee_id'         => $employee->id,
                    'problem_date'        => $request->problem_date,
                    'problem_description' => $request->problem_description,
                    'priority'            => $employee->priority, // من حساب الموظف
                    'status'              => 'pending',
                ]);

                $maintenanceRequest->load(['asset.department.administration.sector', 'employee']);

                return response()->json([
                    'success' => true,
                    'message' => 'تم إرسال طلب الصيانة بنجاح',
                    'data'    => $this->formatRequest($maintenanceRequest),
                ], 201);
            });

        } catch (\Exception $e) {
            // تسجيل الخطأ إن حدث شيء غير متوقع
            logger()->error('خطأ أثناء إنشاء طلب صيانة متزامن: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في النظام أثناء معالجة طلبك، يرجى المحاولة لاحقاً.',
            ], 500);
        } finally {
            // تحرير القفل دائماً بعد الانتهاء
            $lock->release();
        }
    }

    // ─── طلبات الموظف الحالي ─────────────────────────────────────────────────

    public function myRequests(Request $request)
    {
        $employee = $request->user();

        $requests = MaintenanceRequest::with([
                'asset.department.administration.sector',
                'asset.employee',
                'employee',
            ])
            ->where('employee_id', $employee->id)
            ->latest()
            ->get()
            ->map(fn($r) => $this->formatRequest($r));

        return response()->json([
            'success' => true,
            'total'   => $requests->count(),
            'data'    => $requests,
        ]);
    }

    // ─── تفاصيل طلب واحد ─────────────────────────────────────────────────────

    public function show(Request $request, $id)
    {
        $employee = $request->user();

        $maintenanceRequest = MaintenanceRequest::with([
                'asset.department.administration.sector',
                'asset.employee',
                'employee',
            ])
            ->where('id', $id)
            ->where('employee_id', $employee->id)
            ->first();

        if (!$maintenanceRequest) {
            return response()->json([
                'success' => false,
                'message' => 'الطلب غير موجود',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $this->formatRequest($maintenanceRequest),
        ]);
    }

    // ─── Helper: تنسيق بيانات الطلب ─────────────────────────────────────────

    private function formatRequest(MaintenanceRequest $r): array
    {
        return [
            'id'                  => $r->id,
            'problem_date'        => $r->problem_date?->format('Y/m/d'),
            'problem_description' => $r->problem_description,
           // 'status'              => $r->status,
            'status_label'        => MaintenanceRequest::statusOptions()[$r->status] ?? $r->status,
           // 'priority'            => $r->priority,
           // 'priority_label'      => \App\Models\Employee::priorityOptions()[$r->priority] ?? $r->priority,
           // 'supervisor_note'     => $r->supervisor_note,
           // 'it_note'             => $r->it_note,
            'created_at'          => $r->created_at?->format('Y/m/d - h:i A'),

            // مرسل الطلب
            'submitted_by' => $r->employee ? [
                'id'       => $r->employee->id,
                'name'     => $r->employee->name,
                'phone'    => $r->employee->phone,
                'position' => $r->employee->position,
            ] : null,

            // الأصل
            'asset' => $r->asset ? [
                'id'            => $r->asset->id,
                'name'          => $r->asset->name,
                'serial_number' => $r->asset->serial_number,
                // صاحب الأصل
                'assigned_to' => $r->asset->employee ? [
                    'id'   => $r->asset->employee->id,
                    'name' => $r->asset->employee->name,
                ] : null,
            ] : null,

            // المكتب
            'department' => $r->asset?->department ? [
                'id'   => $r->asset->department->id,
                'name' => $r->asset->department->name,
            ] : null,

            // الإدارة
            'administration' => $r->asset?->department?->administration ? [
                'id'   => $r->asset->department->administration->id,
                'name' => $r->asset->department->administration->name,
            ] : null,

            // القطاع
            'sector' => $r->asset?->department?->administration?->sector ? [
                'id'   => $r->asset->department->administration->sector->id,
                'name' => $r->asset->department->administration->sector->name,
            ] : null,
        ];
    }
}
