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
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->date('purchase_date');
            $table->date('maintenance_due_date')->nullable();
            $table->integer('maintenance_cycle_months')->default(3);
            $table->date('last_maintenance_date')->nullable();
            $table->unsignedInteger('maintenance_interval_months')->default(3);
            $table->decimal('price', 10);
            $table->string('vendor', 255);
            $table->string('serial_number', 255)->unique();
            $table->unsignedBigInteger('department_id')->index('assets_department_id_foreign');
            $table->string('maintenance_status', 255)->default('جيدة');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
