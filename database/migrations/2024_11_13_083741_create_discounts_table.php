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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('is_all');
            $table->foreignId('paket_id')->constrained('pakets');
            $table->enum('periode_type', ['one-time', 'time-based']);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('discount_type', ['percentage', 'nominal']);
            $table->integer('value');
            $table->boolean('is_used')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
