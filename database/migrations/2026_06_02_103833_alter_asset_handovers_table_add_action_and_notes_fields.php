<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('asset_handovers', function (Blueprint $table) {
            $table->string('action_type')->default('handover')->after('employee_id');
            $table->date('handed_over_at')->nullable()->change();
            $table->text('handover_notes')->nullable()->after('condition_on_handover');
            $table->text('return_notes')->nullable()->after('condition_on_return');
        });
    }

    public function down(): void
    {
        Schema::table('asset_handovers', function (Blueprint $table) {
            $table->dropColumn([
                'action_type',
                'handover_notes',
                'return_notes',
            ]);

            $table->date('handed_over_at')->nullable(false)->change();
        });
    }
};
