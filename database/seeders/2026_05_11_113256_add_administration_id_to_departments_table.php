<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_add_administration_id_to_departments_table.php
public function up(): void
{
    Schema::table('departments', function (Blueprint $table) {
        $table->foreignId('administration_id')
              ->nullable()
              ->after('name')
              ->constrained()
              ->onDelete('restrict');
    });
}

public function down(): void
{
    Schema::table('departments', function (Blueprint $table) {
        $table->dropForeign(['administration_id']);
        $table->dropColumn('administration_id');
    });
}

};
