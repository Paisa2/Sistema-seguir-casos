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

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }

}
