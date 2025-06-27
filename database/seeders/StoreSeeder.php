<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Store::query()->truncate();
        Schema::enableForeignKeyConstraints();

        Store::query()->insert([
            ['name' => 'H&M', 'phone' => '0591234567', 'is_delivery' => true],
            ['name' => 'Lavander', 'phone' => '0591234598', 'is_delivery' => false],
            ['name' => 'Flory', 'phone' => '059894623', 'is_delivery' => true],
        ]);
    }
}
