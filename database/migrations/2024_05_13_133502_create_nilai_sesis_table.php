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
        Schema::create('nilai_sesis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('tryout_sesi_id');
            $table->bigInteger('subsession_id');
            $table->bigInteger('pilgan_sesi_id');
            $table->bigInteger('soal_sesi_id');
            $table->bigInteger('user_id');
            $table->longText('jawaban');
            $table->integer('nilai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_sesis');
    }
};
