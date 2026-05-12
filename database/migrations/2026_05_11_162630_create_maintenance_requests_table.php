<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_create_maintenance_requests_table.php
public function up(): void
{
    Schema::create('maintenance_requests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('asset_id')
              ->constrained()
              ->onDelete('cascade');
        $table->foreignId('employee_id')
              ->constrained()
              ->onDelete('cascade');
        $table->date('problem_date');
        $table->text('problem_description');
        $table->enum('priority', ['high', 'medium', 'low'])->default('medium');
        $table->enum('status', ['pending', 'postponed', 'completed'])->default('pending');
        $table->text('supervisor_note')->nullable();
        $table->text('it_note')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_requests');
    }
};
