<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventario;
use App\Models\Producto;

class InventarioSeeder extends Seeder
{
    public function run(): void
    {
        // Vamos a recorrer TODOS los productos creados
        $productos = Producto::all();

        foreach ($productos as $producto) {
            $cantidad = 0; // Valor por defecto para productos de cocina, tragos, etc.

            // 🔵 Establecemos cantidades aproximadas lógicas dependiendo del tipo de producto
            if (str_contains(strtolower($producto->nombre), 'cerveza') || str_contains(strtolower($producto->nombre), 'toño') || str_contains(strtolower($producto->nombre), 'breeze')) {
                $cantidad = 300; // Mucha cerveza
            } elseif (str_contains(strtolower($producto->nombre), 'agua') || str_contains(strtolower($producto->nombre), 'gatorade') || str_contains(strtolower($producto->nombre), 'refresco') || str_contains(strtolower($producto->nombre), 'red bull') || str_contains(strtolower($producto->nombre), 'monster')) {
                $cantidad = 150;
            } elseif (str_contains(strtolower($producto->nombre), 'malta') || str_contains(strtolower($producto->nombre), 'lipton') || str_contains(strtolower($producto->nombre), 'yukery')) {
                $cantidad = 100;
            } elseif (str_contains(strtolower($producto->nombre), 'cigarrillo') || str_contains(strtolower($producto->nombre), 'belmont') || str_contains(strtolower($producto->nombre), 'lucky')) {
                $cantidad = 50;
            } elseif (str_contains(strtolower($producto->nombre), 'toddy') || str_contains(strtolower($producto->nombre), 'cerelac') || str_contains(strtolower($producto->nombre), 'samba')) {
                $cantidad = 70;
            } elseif (str_contains(strtolower($producto->nombre), 'quesillo') || str_contains(strtolower($producto->nombre), 'torta') || str_contains(strtolower($producto->nombre), 'marquesa')) {
                $cantidad = 40;
            } elseif (str_contains(strtolower($producto->nombre), 'breeze') || str_contains(strtolower($producto->nombre), 'corona') || str_contains(strtolower($producto->nombre), 'presidente')) {
                $cantidad = 80;
            } elseif (str_contains(strtolower($producto->nombre), 'perrier')) {
                $cantidad = 20;
            } else {
                $cantidad = 0; // Para platos, cachapas, ceviches, etc. (inventario de materias primas después)
            }

            Inventario::create([
                'producto_id'     => $producto->id,
                'cantidad_inicial' => $cantidad,
                'cantidad_actual'  => $cantidad,
                'precio_costo'     => 0, // No tenemos precios de costo aún
            ]);
        }
    }
}
