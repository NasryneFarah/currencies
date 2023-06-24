<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //j'appelle mes différents seeders
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
