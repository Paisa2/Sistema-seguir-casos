<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            'nombre' => 'Municipio_Quillacollo',
            'direccion' => ' Av.6 de Agosto,Quillacollo',
        ]);

        DB::table('municipios')->insert([
            'nombre' => 'Municipio_Colcapirhua',
            'direccion' => 'Av.La Paz, Colcapirhua',
        ]);

        DB::table('municipios')->insert([
            'nombre' => 'Municipio_Tiquipaya',
            'direccion' => 'C. Pablo Jaimes, Tiquipaya',
        ]);
    }
}
