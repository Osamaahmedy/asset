<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_add_fields_to_employees_table.php
public function up(): void
{
    Schema::table('employees', function (Blueprint $table) {
        $table->string('phone')->nullable()->after('name');
        $table->string('password')->after('phone');
        $table->enum('priority', ['high', 'medium', 'low'])->default('medium')->after('password');
        $table->enum('position', ['employee', 'office_manager'])->default('employee')->after('priority');
    });
}

public function down(): void
{
    Schema::table('employees', function (Blueprint $table) {
        $table->dropColumn(['phone', 'password', 'priority', 'position']);
    });
}
};
