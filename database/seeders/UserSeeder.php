<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'apellido' => 'Fuentes',
            'email' => 'admin@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'password' => 'admin',
            'cargo' => 'Jefe',
        ]);

        $user->assignRole('Admin');

        $user2 = User::create([
            'name' => 'Patricia',
            'apellido' => 'Diaz',
            'email' => 'usuario@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'password' => 'usuario',
            'cargo' => 'Discapacidad',
        ]);

        $user2->assignRole('User');

        $user3 = User::create([
            'name' => 'Paco',
            'apellido' => 'Fernandez',
            'email' => 'usuario2@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'password' => 'usuario2',
            'cargo' => 'Slim',
        ]);

        $user3->assignRole('User');
    }
}
