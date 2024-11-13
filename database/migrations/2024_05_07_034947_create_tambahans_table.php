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
        Schema::create('tambahans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('tryout_id');
            $table->string('nama', 100);
            $table->integer('waktu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambahans');
    }
};
