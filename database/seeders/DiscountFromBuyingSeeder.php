<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountFromBuyingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discount_from_buyings')->insert([
            'name' => 'Diskon akhir taun',
            'paket_buyed' => 1,
            'is_All' => 0,
            'paket_discount' => 2,
            'periode_type' => 'time-based',
            'discount_type' => 'nominal',
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'value' => 10000,
        ]);
        DB::table('discount_from_buyings')->insert([
            'name' => 'Diskon akhir taun',
            'paket_buyed' => 1,
            'is_All' => 1,
            'paket_discount' => 1,
            'periode_type' => 'time-based',
            'discount_type' => 'nominal',
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'value' => 10000,
        ]);
    }
    
}
