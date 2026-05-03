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
        Schema::create('radpostauth', function (Blueprint $table) {
            $table->integer('id', true);
$table->index('username', 'radcheck_username_index');            $table->string('pass', 64)->default('');
            $table->string('reply', 32)->default('');
            $table->timestamp('authdate', 6)->useCurrentOnUpdate()->useCurrent();
            $table->string('class', 64)->nullable()->index('class');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radpostauth');
    }
};
