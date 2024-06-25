<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Departamentoeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            'nombre' => 'Dep Cochabamba',
            'direccion' => '',
        ]);

        DB::table('departamentos')->insert([
            'nombre' => 'Dep Cochabamba',
            'direccion' => '',
        ]);

        DB::table('departamentos')->insert([
            'nombre' => 'Dep Cochabamba',
            'direccion' => '',
        ]);
    }
}
