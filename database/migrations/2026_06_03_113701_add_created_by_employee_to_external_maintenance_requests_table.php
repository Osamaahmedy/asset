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
        Schema::table('external_maintenance_requests', function (Blueprint $table) {
            $table->foreignId('created_by_employee')
                  ->nullable()
                  ->after('created_by')
                  ->constrained('employees')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('external_maintenance_requests', function (Blueprint $table) {
            $table->dropConstrainedForeignId('created_by_employee');
        });
    }
};
