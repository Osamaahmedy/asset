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
        Schema::create('radusergroup', function (Blueprint $table) {
            $table->increments('id');
$table->index('username', 'radcheck_username_index');
            $table->string('groupname', 64)->default('');
            $table->integer('priority')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radusergroup');
    }
};
