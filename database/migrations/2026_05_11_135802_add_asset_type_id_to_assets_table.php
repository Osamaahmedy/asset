<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_add_asset_type_id_to_assets_table.php
public function up(): void
{
    Schema::table('assets', function (Blueprint $table) {
        $table->foreignId('asset_type_id')
              ->nullable()
              ->after('name')
              ->constrained()
              ->onDelete('restrict');
    });
}

public function down(): void
{
    Schema::table('assets', function (Blueprint $table) {
        $table->dropForeign(['asset_type_id']);
        $table->dropColumn('asset_type_id');
    });
}
};
