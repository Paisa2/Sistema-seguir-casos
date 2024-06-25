<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->insert([
            'nombre' => 'Provincia_Chapare',
            'direccion' => ' Dep. Cochabamba',
        ]);

        DB::table('provincias')->insert([
            'nombre' => 'Provincia_Campero',
            'direccion' => ' Dep. Cochabamba',
        ]);

        DB::table('provincias')->insert([
            'nombre' => 'Provincia_Cercado',
            'direccion' => ' Dep. Cochabamba',
        ]);
    }
}
