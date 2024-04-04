<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name' => 'Chăn lông cừu',
            'description' => 'Chăn lông cừu mềm mịn, ấm áp',
            'price' => 500.00,
            'image_url' => 'http://example.com/chan_long_cuu.jpg',
            'origin' => 'Việt Nam',
        ]);

        \App\Models\Product::create([
            'name' => 'Ga chống thấm',
            'description' => 'Ga chống thấm, chống bám bẩn',
            'price' => 200.00,
            'image_url' => 'http://example.com/ga_chong_tham.jpg',
            'origin' => 'Việt Nam',
        ]);

        \App\Models\Product::create([
            'name' => 'Gối ôm',
            'description' => 'Gối ôm mềm mịn, thoải mái',
            'price' => 100.00,
            'image_url' => 'http://example.com/goi_om.jpg',
            'origin' => 'Việt Nam',
        ]);
    }
}
