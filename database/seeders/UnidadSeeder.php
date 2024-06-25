<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            [
                'nombre' => 'Unidad del adulto mayor',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Unidad Slim',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Unidad Defensoria',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Unidad Discapacidad',
                'descripcion' => '',
            ]
        ]);
    }
}
