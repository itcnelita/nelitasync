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
        Schema::create('log_presensi', function (Blueprint $table) {
            $table->id()->primary();

            // $table->string('nisn')->nullable();
            // $table->string('nisn')->nullable();

            $table->string('id_identity')->nullable();

            $table->string('time')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
