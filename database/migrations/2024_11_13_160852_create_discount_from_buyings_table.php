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
        Schema::create('discount_from_buyings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('paket_buyed')->constrained('pakets');
            $table->boolean('is_all');
            $table->foreignId('paket_discount')->constrained('pakets');
            $table->enum('periode_type', ['one-time', 'time-based']);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('discount_type', ['percentage', 'nominal']);
            $table->integer('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_from_buyings');
    }
};
