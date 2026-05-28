<?php

namespace Tests\Feature;

use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\MaintenanceRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class MaintenanceConcurrencyTest extends TestCase
{
    use RefreshDatabase;

    public function test_concurrency_lock_and_duplicate_prevention()
    {
        // 1. إنشاء البيانات الأساسية
        $department = Department::create(['name' => 'IT Department']);
        
        $employee = Employee::create([
            'name' => 'Test Employee',
            'phone' => '777777777',
            'password' => 'password123',
            'department_id' => $department->id,
            'position' => 'employee',
            'priority' => 'medium',
        ]);

        // تعيين token مخصص للمحاكاة وتوثيق الطلبات
        $plainToken = 'test-bearer-token-string-123';
        $employee->api_token = hash('sha256', $plainToken);
        $employee->save();

        $assetType = AssetType::create(['name' => 'Laptop']);

        $asset = Asset::create([
            'name' => 'Dell Latitude',
            'department_id' => $department->id,
            'asset_type_id' => $assetType->id,
            'is_personal' => false,
            'price' => 1200,
            'purchase_date' => '2026-05-27',
            'status' => Asset::STATUS_AVAILABLE,
        ]);

        // 2. محاكاة وجود قفل حالي على الأصل (حالة طلب متزامن قيد المعالجة)
        $lockKey = 'maintenance_request_lock_' . $asset->id;
        $lock = Cache::lock($lockKey, 10);
        $lock->get(); // حجز القفل يدوياً

        // محاولة إرسال طلب صيانة أثناء وجود القفل
        $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $plainToken,
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
            ])
            ->postJson('/api/maintenance-requests', [
                'asset_id' => $asset->id,
                'problem_date' => now()->format('Y-m-d'),
                'problem_description' => 'شاشة اللابتوب لا تعمل ولديها ععل فني في العرض', // أكثر من 10 حروف
            ]);

        // يجب أن يرجع الرد كـ 429 (Too Many Requests) بسبب القفل الذري
        $response->assertStatus(429);
        $response->assertJson([
            'success' => false,
            'message' => 'الطلب قيد المعالجة حالياً، يرجى المحاولة بعد قليل.',
        ]);

        // 3. تحرير القفل وإعادة المحاولة
        $lock->release();

        $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $plainToken,
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
            ])
            ->postJson('/api/maintenance-requests', [
                'asset_id' => $asset->id,
                'problem_date' => now()->format('Y-m-d'),
                'problem_description' => 'شاشة اللابتوب لا تعمل ولديها ععل فني في العرض',
            ]);

        // يجب أن ينجح الطلب ويرجع 201
        $response->assertStatus(201);
        $response->assertJsonPath('success', true);

        // التحقق من تحديث حالة الأصل في قاعدة البيانات إلى "في الصيانة"
        $this->assertEquals(Asset::STATUS_MAINTENANCE, $asset->fresh()->status);

        // 4. محاولة إرسال طلب صيانة آخر لنفس الأصل بينما الطلب الأول معلق
        $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $plainToken,
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
            ])
            ->postJson('/api/maintenance-requests', [
                'asset_id' => $asset->id,
                'problem_date' => now()->format('Y-m-d'),
                'problem_description' => 'وصف مشكلة آخر مكرر لنفس الجهاز المعطل',
            ]);

        // يجب أن يفشل الرد بـ 409 (Conflict) لمنع التكرار
        $response->assertStatus(409);
        $response->assertJson([
            'success' => false,
            'message' => 'يوجد طلب صيانة قيد الانتظار أو مؤجل لهذا الأصل بالفعل',
        ]);
    }
}
