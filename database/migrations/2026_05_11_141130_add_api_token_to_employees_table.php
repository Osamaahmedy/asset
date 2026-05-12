<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_add_api_token_to_employees_table.php
public function up(): void
{
    Schema::table('employees', function (Blueprint $table) {
        $table->string('api_token', 80)
              ->nullable()
              ->unique()
              ->after('password');
    });
}

public function down(): void
{
    Schema::table('employees', function (Blueprint $table) {
        $table->dropColumn('api_token');
    });
}
};
