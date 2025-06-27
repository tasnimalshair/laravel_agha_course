<?php

namespace Database\Seeders;

use App\Models\StoreProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StoreProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        StoreProduct::query()->truncate();
        Schema::enableForeignKeyConstraints();

        StoreProduct::factory()->count(20)->create();
    }
}
