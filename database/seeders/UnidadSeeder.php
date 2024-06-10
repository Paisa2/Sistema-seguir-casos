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

        $unidades = ['1', '2', '3', '4'];
        for($i = 0; $i < 10; $i++) {
            DB::table('unidades')->isert([
                'nombre' => rand(1, 100)*1000,
                'descripcion' => rand(1, 100)*1000,
                'unidades' => $unidades(rand(0, 3)),
            ]);
        }
    }
}
