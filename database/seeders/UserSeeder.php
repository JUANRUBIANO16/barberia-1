<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@barberia.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        // Crear usuario barbero
        User::create([
            'name' => 'Carlos Barbero',
            'email' => 'barbero@barberia.com',
            'password' => Hash::make('123456'),
            'role' => 'barbero',
        ]);

        // Crear usuario cliente
        User::create([
            'name' => 'Juan Cliente',
            'email' => 'cliente@barberia.com',
            'password' => Hash::make('123456'),
            'role' => 'cliente',
        ]);

        // Crear otro barbero
        User::create([
            'name' => 'Miguel Torres',
            'email' => 'miguel@barberia.com',
            'password' => Hash::make('123456'),
            'role' => 'barbero',
        ]);

        // Crear otro cliente
        User::create([
            'name' => 'Ana García',
            'email' => 'ana@barberia.com',
            'password' => Hash::make('123456'),
            'role' => 'cliente',
        ]);
    }
}
