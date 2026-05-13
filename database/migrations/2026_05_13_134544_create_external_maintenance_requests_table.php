// database/migrations/xxxx_create_external_maintenance_requests_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('external_maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenance_request_id')
                  ->constrained('maintenance_requests')
                  ->cascadeOnDelete();

            $table->text('technical_description');          // الوصف الفني
            $table->decimal('estimated_amount', 12, 2);    // المبلغ التقديري
            $table->text('required_parts')->nullable();     // القطع المطلوبة

            $table->enum('status', [
                'pending',   // قيد الانتظار
                'approved',  // مقبول
                'completed', // مكتمل
                'rejected',  // مرفوض
            ])->default('pending');

            $table->text('rejection_reason')->nullable();  // سبب الرفض
            $table->text('admin_note')->nullable();        // ملاحظة الإدارة
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('external_maintenance_requests');
    }
};
