<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'password' => 'admin',
            'ci' => '1234567',
        ]);

        $user->assignRole('Admin');

        $user2 = User::create([
            'name' => 'Patricia Rodriguez',
            'email' => 'docente@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'password' => 'docente',
            'ci' => '5432101',
        ]);

        $user2->assignRole('User');

        $user3 = User::create([
            'name' => 'Paco Fernandez',
            'email' => 'docente2@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'password' => 'docente',
            'ci' => '4232332',
        ]);

        $user3->assignRole('User');
    }
}
