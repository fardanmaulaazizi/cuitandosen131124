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
        Schema::create('pilgan_sesis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('soal_sesi_id');
            $table->longText('deskripsi');
            $table->integer('nilai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilgan_sesis');
    }
};
