<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::table('activity_logs', function (Blueprint $table) {
        $table->string('model_name')->nullable()->after('model_id');
        $table->string('department_name')->nullable()->after('model_name');
    });
}

public function down(): void
{
    Schema::table('activity_logs', function (Blueprint $table) {
        $table->dropColumn(['model_name', 'department_name']);
    });
}

};
