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
        Schema::table('assets', function (Blueprint $table) {
            $table->string('status')->default('متاح')->after('is_personal');
            $table->decimal('salvage_value', 10, 2)->nullable()->after('price');
            $table->integer('useful_life_years')->nullable()->after('salvage_value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn(['status', 'salvage_value', 'useful_life_years']);
        });
    }
};
