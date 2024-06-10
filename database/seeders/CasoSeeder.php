<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $casos = ['caso_1', 'caso_2', 'caso_3'];
        $estado = ["casoAbierto", "casoCerrado", "casoProceso"];
        for($i = 0; $i < 10; $i++) {
            DB::table('casos')->insert([
                'tipologia' => rand(),
                'descripcion' => rand(),
                'estado' => $estado(0, 3),
                'casos' => $casos(0, 3),
            ]);
        }

    }
}
