<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('denuncias')->insert([
                'descripcion' => rand(),
                'fecha_registro' =>'2024-06-10',
                'nom_demandante' => rand(0, 100),
                'nom_demandado' => rand(0, 100),


            ]);
        }
    }
}
