<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_add_employee_id_to_assets_table.php
public function up(): void
{
    Schema::table('assets', function (Blueprint $table) {
        $table->foreignId('employee_id')
              ->nullable()
              ->after('department_id')
              ->constrained()
              ->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('assets', function (Blueprint $table) {
        $table->dropForeign(['employee_id']);
        $table->dropColumn('employee_id');
    });
}
};
