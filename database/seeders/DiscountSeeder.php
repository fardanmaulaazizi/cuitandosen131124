<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discounts')->insert([
            'name' => 'Diskon alumni',
            'user_id'=> 2,
            'paket_id' => 1,
            'periode_type' => 'one-time',
            'discount_type' => 'percentage',
            'value' => 10,
            'is_used' => false,
            'is_active' => true
        ]);

        DB::table('discounts')->insert([
            'name' => 'Diskon akhir taun',
            'user_id'=> 2,
            'paket_id' => 1,
            'periode_type' => 'time-based',
            'discount_type' => 'nominal',
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'value' => 10000,
            'is_used' => false,
            'is_active' => true
        ]);
    }
}
