<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('external_maintenance_requests', function (Blueprint $table) {
            $table->decimal('estimated_amount', 10, 2)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('external_maintenance_requests', function (Blueprint $table) {
            $table->decimal('estimated_amount', 10, 2)->nullable(false)->change();
        });
    }
};
