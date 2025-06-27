<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Product::query()->truncate();
        Schema::enableForeignKeyConstraints();
        
        Product::query()->insert([
            ['name' => 'T-shirt', 'price' => 20, 'discount' => 5, 'color' => 'black', 'brand_id' => 1],
            ['name' => 'Scarf', 'price' => 10, 'discount' => 0, 'color' => 'red', 'brand_id' => 2],
            ['name' => 'shoes', 'price' => 50, 'discount' => 0, 'color' => 'Orange', 'brand_id' => 3],
            ['name' => 'ring', 'price' => 5, 'discount' => 0, 'color' => 'grey', 'brand_id' => 2],
            ['name' => 'bag', 'price' => 70, 'discount' => 0, 'color' => 'green', 'brand_id' => 1],
        ]);
    }
}
