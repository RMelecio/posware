<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            UserSeeder::class,
            AdminPermissionSeeder::class,
            DepartmenPermissionSeeder::class,
            CfdiFiscalRegimeSeeder::class,
            CountrySeeder::class,
            CompanySeeder::class,
            CompanyPermissionSeeder::class,
        ]);
    }
}
