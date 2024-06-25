<?php

namespace Database\Seeders;

use App\Models\UnidadDefensoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHashPermissionSeeder::class,
            UserSeeder::class,
            CasoSeeder::class,
            DenunciaSeeder::class,
            UnidadAdultoSeeder::class,
            UnidadDefensoriaSeeder::class,
            UnidadDiscapacidadSeeder::class,
            UnidadSlimSeeder::class,
            MunicipioSeeder::class,
            UnidadSeeder::class,
            Departamentoeeder::class,
            ProvinciaSeeder::class
        ]);

    }
}
