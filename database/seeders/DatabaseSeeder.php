<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🔵 Crear usuario ADMIN real
        User::create([
            'name' => 'Admin OfumMelli',
            'email' => 'admin@ofummelli.com',
            'password' => Hash::make('12345678'), // 🔒 Contraseña segura encriptada
        ]);

        // 🔵 Llamar a los Seeders de Productos e Inventario
        $this->call([
            ProductoSeeder::class,
            InventarioSeeder::class, // 👈 AGREGA ESTA LÍNEA
        ]);
    }
}
