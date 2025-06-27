<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::query()->truncate();
        Schema::enableForeignKeyConstraints();

        User::query()->create([
            'name' => 'tasnim',
            'email' => 'tasnim@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::query()->create([
            'name' => 'toqa',
            'email' => 'toqa@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
