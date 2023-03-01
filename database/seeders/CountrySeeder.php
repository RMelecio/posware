<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CfdiCountry;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CfdiCountry::insert([
            'id' => 151,
            'country' => 'MEX',
            'description' => 'México',
            'postal_code_form' => '[0-9]{5}',
            'tax_identity_registration_form' => '[A-Z&Ñ]{3,4}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[A-Z0-9]{2}[0-9A]',
            'validation_tax_identity_registration' => 'Lista del SAT',
            'grouping' => 'TLCAN',
            'created_at' => now(),
        ]);
    }
}
