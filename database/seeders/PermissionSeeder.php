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

            'unidad_1_index',
            'unidad_1_create',
            'unidad_1_edit',
            'unidad_1_destroy',
            'unidad_1_buscar',

            'unidad_2_index',
            'unidad_2_create',
            'unidad_2_edit',
            'unidad_2_destroy',
            'unidad_2_buscar',

            'unidad_3_index',
            'unidad_3_create',
            'unidad_3_edit',
            'unidad_3_destroy',
            'unidad_3_buscar',

            'unidad_4_index',
            'unidad_4_create',
            'unidad_4_edit',
            'unidad_4_destroy',
            'unidad_4_buscar',

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

            'report_create',

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }

}
