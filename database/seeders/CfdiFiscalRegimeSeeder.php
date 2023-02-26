<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\CfdiFiscalRegime;

class CfdiFiscalRegimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CfdiFiscalRegime::insert([
            [
                'regime_code' => '601',
                'description' => 'General de Ley Personas Morales',
                'natural' => 'No',
                'legal' => 'Si',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '603',
                'description' => 'Personas Morales con Fines no Lucrativos',
                'natural' => 'No',
                'legal' => 'Si',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '605',
                'description' => 'Sueldos y Salarios e Ingresos Asimilados a Salarios',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '606',
                'description' => 'Arrendamiento',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '607',
                'description' => 'Régimen de Enajenación o Adquisición de Bienes',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '608',
                'description' => 'Demás ingresos',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '610',
                'description' => 'Residentes en el Extranjero sin Establecimiento Permanente en México',
                'natural' => 'Si',
                'legal' => 'Si',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '611',
                'description' => 'Ingresos por Dividendos (socios y accionistas)',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '612',
                'description' => 'Personas Físicas con Actividades Empresariales y Profesionales',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '614',
                'description' => 'Ingresos por intereses',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '615',
                'description' => 'Régimen de los ingresos por obtención de premios',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '616',
                'description' => 'Sin obligaciones fiscales',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '620',
                'description' => 'Sociedades Cooperativas de Producción que optan por diferir sus ingresos',
                'natural' => 'No',
                'legal' => 'Si',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '621',
                'description' => 'Incorporación Fiscal',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '622',
                'description' => 'Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras',
                'natural' => 'No',
                'legal' => 'Si',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '623',
                'description' => 'Opcional para Grupos de Sociedades',
                'natural' => 'No',
                'legal' => 'Si',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '624',
                'description' => 'Coordinados',
                'natural' => 'No',
                'legal' => 'Si',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '625',
                'description' => 'Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas',
                'natural' => 'Si',
                'legal' => 'No',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
            [
                'regime_code' => '626',
                'description' => 'Régimen Simplificado de Confianza',
                'natural' => 'Si',
                'legal' => 'Si',
                'start_date' => '2022-01-01 00:00:00',
                'end_date' => null,
                'created_at' => now()
            ],
        ]);
    }
}
