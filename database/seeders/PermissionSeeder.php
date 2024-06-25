<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'permission_index',
            'permission_create',
            'permission_edit',
            'permission_destroy',
            'permission_buscar',

            'role_index',
            'role_create',
            'role_edit',
            'role_destroy',
            'role_buscar',

            'user_index',
            'user_create',
            'user_edit',
            'user_destroy',
            'user_buscar',

            'municipio_index',
            'municipio_create',
            'municipio_edit',
            'municipio_destroy',
            'municipio_buscar',

            'unidad_index',
            'unidad_create',
            'unidad_edit',
            'unidad_destroy',
            'unidad_buscar',

            'unidadA_index',
            'unidadA_create',
            'unidadA_edit',
            'unidadA_destroy',
            'unidadA_buscar',

            'unidadDef_index',
            'unidadDef_create',
            'unidadDef_edit',
            'unidadDef_destroy',
            'unidadDef_buscar',

            'unidadDis_index',
            'unidadDis_create',
            'unidadDis_edit',
            'unidadDis_destroy',
            'unidadDis_buscar',

            'denuncia_index',
            'denuncia_create',
            'denuncia_edit',
            'denuncia_destroy',
            'denuncia_buscar',

            'caso_index',
            'caso_create',
            'caso_edit',
            'caso_destroy',
            'caso_buscar',

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }

}
