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
        Schema::create('pembahasan_sesis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('tambahan_id');
            $table->bigInteger('soal_sesi_id');
            $table->bigInteger('pilgan_sesi_id');
            $table->longText('deskripsi')->nullable();
            $table->text('url_video1')->nullable();
            $table->text('url_video2')->nullable();
            $table->text('url_video3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembahasan_sesis');
    }
};
