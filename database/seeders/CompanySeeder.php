<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'alias' => 'Empresa Alias',
            'name' => 'Nombre empresa',
            'trade_name' => 'Razón Social',
            'state' => 'Jalisco',
            'municipality' => 'Guadalajara',
            'location' => 'Guadalajara',
            'settlement' => 'Centro',
            'postal_code' => '20020',
            'address' => 'Av. Hidalgo #5021',
            'mobil' => '+523333333333',
            'email' => 'empresa@empresa.com',
        ]);
    }
}
