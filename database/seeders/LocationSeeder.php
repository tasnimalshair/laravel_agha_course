<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Location::query()->truncate();
        Schema::enableForeignKeyConstraints();

        Location::query()->insert([
            ['address' => 'Gaza', 'store_id' => 1],
            ['address' => 'Egypt', 'store_id' => 2],
            ['address' => 'Dubai', 'store_id' => 3],
        ]);
    }
}
