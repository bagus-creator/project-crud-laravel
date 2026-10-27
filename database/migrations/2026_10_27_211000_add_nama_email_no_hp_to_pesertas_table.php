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
        Schema::table('pesertas', function (Blueprint $table) {
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_hp');
        });
    }

    public function down(): void
    {
        Schema::table('pesertas', function (Blueprint $table) {
            $table->dropUnique(['email']);
            $table->dropColumn(['nama', 'email', 'no_hp']);
        });
    }
};
