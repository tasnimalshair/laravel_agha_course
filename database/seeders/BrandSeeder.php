<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Brand::query()->truncate();
        Schema::enableForeignKeyConstraints();

        Brand::query()->insert([
            ['name' => 'Swap', 'country' => 'Pls'],
            ['name' => 'Zara', 'country' => 'Amr'],
            ['name' => 'Channel', 'country' => 'Cha'],
        ]);
    }
}
