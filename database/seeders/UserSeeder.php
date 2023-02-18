<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'middle_name' => 'Administrador',
            'last_name' => 'Administrador',
            'mobil' => '+523334531396',
            'department_id' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
