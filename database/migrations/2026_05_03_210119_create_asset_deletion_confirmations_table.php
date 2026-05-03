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
        Schema::create('asset_deletion_confirmations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asset_id')->index('asset_deletion_confirmations_asset_id_foreign');
            $table->boolean('is_confirmed')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('requested_by')->nullable()->index('asset_deletion_confirmations_requested_by_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_deletion_confirmations');
    }
};
