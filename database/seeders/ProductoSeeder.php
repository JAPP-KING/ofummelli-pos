<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [

            // 🍖 Carne Nacional
            ['codigo' => 'CAR-001', 'nombre' => 'Carne En Vara 1Kg Surtido', 'unidad_medida' => 'plato', 'precio_venta' => 35.00],
            ['codigo' => 'CAR-002', 'nombre' => 'Carne En Vara 1/2Kg Surtido', 'unidad_medida' => 'plato', 'precio_venta' => 18.00],
            ['codigo' => 'CAR-003', 'nombre' => 'Carne En Vara 1/4Kg Surtido', 'unidad_medida' => 'plato', 'precio_venta' => 9.00],

            // 🥩 Carne Importada
            ['codigo' => 'CAR-004', 'nombre' => 'Carne En Vara 1Kg Importada', 'unidad_medida' => 'plato', 'precio_venta' => 45.00],
            ['codigo' => 'CAR-005', 'nombre' => 'Carne En Vara 1/2Kg Importada', 'unidad_medida' => 'plato', 'precio_venta' => 23.00],
            ['codigo' => 'CAR-006', 'nombre' => 'Carne En Vara 1/4Kg Importada', 'unidad_medida' => 'plato', 'precio_venta' => 12.00],

            // 🍽 Cocina
            ['codigo' => 'COC-001', 'nombre' => 'Ración De Tequeños', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-002', 'nombre' => 'Ración De Papas', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-003', 'nombre' => 'Ración De Huevos De Codorniz', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-004', 'nombre' => 'Ración De Tostones Con Atún', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-005', 'nombre' => 'Ración De Tostones Con Queso', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-006', 'nombre' => 'Ración De Pastelito Carne/Queso', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-007', 'nombre' => 'Ración De Arepas Con Queso Fundido', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-008', 'nombre' => 'Ración De Queso Fundido', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-009', 'nombre' => 'Ración De Queso Crema Con Casabe', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-010', 'nombre' => 'Ración De Alitas A La BBQ', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-011', 'nombre' => 'Ración De Chorizo Monserratina', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-012', 'nombre' => 'Ración De Morcilla', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-013', 'nombre' => 'Ración Mixta (Morcilla/Chorizo)', 'unidad_medida' => 'ración', 'precio_venta' => 8.00],
            ['codigo' => 'COC-014', 'nombre' => 'Ensalada', 'unidad_medida' => 'plato', 'precio_venta' => 10.00],
            ['codigo' => 'COC-015', 'nombre' => 'Salchipapa', 'unidad_medida' => 'plato', 'precio_venta' => 10.00],
            ['codigo' => 'COC-016', 'nombre' => 'Hamburguesa', 'unidad_medida' => 'unidad', 'precio_venta' => 10.00],
            ['codigo' => 'COC-017', 'nombre' => 'Combo Kids', 'unidad_medida' => 'combo', 'precio_venta' => 10.00],
            ['codigo' => 'COC-018', 'nombre' => 'Ceviche De Pescado', 'unidad_medida' => 'plato', 'precio_venta' => 14.00],
            ['codigo' => 'COC-019', 'nombre' => 'Ceviche Mixto', 'unidad_medida' => 'plato', 'precio_venta' => 16.00],

            // 🍲 Sopas
            ['codigo' => 'SOP-001', 'nombre' => 'Sopa Costilla Grande', 'unidad_medida' => 'plato', 'precio_venta' => 8.00],
            ['codigo' => 'SOP-002', 'nombre' => 'Sopa Costilla Pequeña', 'unidad_medida' => 'plato', 'precio_venta' => 5.00],
            ['codigo' => 'SOP-003', 'nombre' => 'Sopa Mondongo Grande', 'unidad_medida' => 'plato', 'precio_venta' => 8.00],
            ['codigo' => 'SOP-004', 'nombre' => 'Sopa Mondongo Pequeña', 'unidad_medida' => 'plato', 'precio_venta' => 5.00],
            ['codigo' => 'SOP-005', 'nombre' => 'Sopa Pollo Grande', 'unidad_medida' => 'plato', 'precio_venta' => 8.00],
            ['codigo' => 'SOP-006', 'nombre' => 'Sopa Pollo Pequeña', 'unidad_medida' => 'plato', 'precio_venta' => 5.00],
            ['codigo' => 'SOP-007', 'nombre' => 'Picadillo Llanero Grande', 'unidad_medida' => 'plato', 'precio_venta' => 8.00],
            ['codigo' => 'SOP-008', 'nombre' => 'Picadillo Llanero Pequeño', 'unidad_medida' => 'plato', 'precio_venta' => 5.00],
            ['codigo' => 'SOP-009', 'nombre' => 'Sopa Mariscos Grande', 'unidad_medida' => 'plato', 'precio_venta' => 10.00],
            ['codigo' => 'SOP-010', 'nombre' => 'Sopa Mariscos Pequeño', 'unidad_medida' => 'plato', 'precio_venta' => 6.00],

            // 🥞 Cachapas
            ['codigo' => 'CAC-001', 'nombre' => 'Cachapa Sola', 'unidad_medida' => 'plato', 'precio_venta' => 6.00],
            ['codigo' => 'CAC-002', 'nombre' => 'Cachapa C/ Queso Telita', 'unidad_medida' => 'plato', 'precio_venta' => 10.00],
            ['codigo' => 'CAC-003', 'nombre' => 'Cachapa C/ Cochino', 'unidad_medida' => 'plato', 'precio_venta' => 14.00],
            ['codigo' => 'CAC-004', 'nombre' => 'Cachapa C/ Queso Telita Y Cochino', 'unidad_medida' => 'plato', 'precio_venta' => 16.00],
            ['codigo' => 'CAC-005', 'nombre' => '1/2 Cachapa C/ Queso Telita', 'unidad_medida' => 'plato', 'precio_venta' => 5.00],
            ['codigo' => 'CAC-006', 'nombre' => 'Ración De Queso Telita', 'unidad_medida' => 'ración', 'precio_venta' => 6.00],

            // 🍰 Postres
            ['codigo' => 'POS-001', 'nombre' => 'Torta Grande', 'unidad_medida' => 'unidad', 'precio_venta' => 5.00],
            ['codigo' => 'POS-002', 'nombre' => 'Marquesa', 'unidad_medida' => 'unidad', 'precio_venta' => 4.00],
            ['codigo' => 'POS-003', 'nombre' => 'Quesillo', 'unidad_medida' => 'unidad', 'precio_venta' => 4.00],
            ['codigo' => 'POS-004', 'nombre' => 'Torta Pequeña', 'unidad_medida' => 'unidad', 'precio_venta' => 3.00],

            // 🥃 Servicios (Whisky, Ron, Vodka, Vino, etc.)
            ['codigo' => 'SER-001', 'nombre' => 'Buchanans', 'unidad_medida' => 'botella', 'precio_venta' => 60.00],
            ['codigo' => 'SER-002', 'nombre' => 'Old Parr', 'unidad_medida' => 'botella', 'precio_venta' => 50.00],
            ['codigo' => 'SER-003', 'nombre' => 'Descorche', 'unidad_medida' => 'servicio', 'precio_venta' => 25.00],
            ['codigo' => 'SER-004', 'nombre' => 'Servicio De Vino', 'unidad_medida' => 'servicio', 'precio_venta' => 25.00],
            ['codigo' => 'SER-005', 'nombre' => 'Servicio De Ron Carúpano', 'unidad_medida' => 'servicio', 'precio_venta' => 20.00],
            ['codigo' => 'SER-006', 'nombre' => 'Servicio De Ron Cacique', 'unidad_medida' => 'servicio', 'precio_venta' => 20.00],
            ['codigo' => 'SER-007', 'nombre' => 'Servicio Cacique 500 Años', 'unidad_medida' => 'servicio', 'precio_venta' => 35.00],
            ['codigo' => 'SER-008', 'nombre' => 'Servicio De Santa Teresa 0.75L', 'unidad_medida' => 'servicio', 'precio_venta' => 25.00],
            ['codigo' => 'SER-009', 'nombre' => 'Servicio Vodka Gordon', 'unidad_medida' => 'servicio', 'precio_venta' => 25.00],
            ['codigo' => 'SER-010', 'nombre' => 'Servicio Grey Goose', 'unidad_medida' => 'servicio', 'precio_venta' => 60.00],
            ['codigo' => 'SER-011', 'nombre' => 'Servicio De Anís Cartujo', 'unidad_medida' => 'servicio', 'precio_venta' => 20.00],
            ['codigo' => 'SER-012', 'nombre' => 'Servicio De Anís El Mono', 'unidad_medida' => 'servicio', 'precio_venta' => 40.00],
            ['codigo' => 'SER-013', 'nombre' => 'Servicio De Caroreña', 'unidad_medida' => 'servicio', 'precio_venta' => 15.00],

            // 🍻 Cervezas
            ['codigo' => 'CERV-001', 'nombre' => 'Tobo 10 Cervezas', 'unidad_medida' => 'toalla', 'precio_venta' => 10.00],
            ['codigo' => 'CERV-002', 'nombre' => 'Cerveza Por Unidad', 'unidad_medida' => 'unidad', 'precio_venta' => 1.00],
            ['codigo' => 'CERV-003', 'nombre' => 'Cerveza Verano', 'unidad_medida' => 'unidad', 'precio_venta' => 2.00],
            ['codigo' => 'CERV-004', 'nombre' => 'Breeze Ice', 'unidad_medida' => 'unidad', 'precio_venta' => 3.00],
            ['codigo' => 'CERV-005', 'nombre' => 'Corona', 'unidad_medida' => 'unidad', 'precio_venta' => 3.00],
            ['codigo' => 'CERV-006', 'nombre' => 'Presidente', 'unidad_medida' => 'unidad', 'precio_venta' => 3.00],

            // 🥤 Bebidas
            ['codigo' => 'BEB-001', 'nombre' => 'Batido De Mora', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-002', 'nombre' => 'Batido De Fresa', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-003', 'nombre' => 'Batido De Melón', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-004', 'nombre' => 'Batido De Durazno', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-005', 'nombre' => 'Batido De Lechoza', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-006', 'nombre' => 'Batido De Parchita', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-007', 'nombre' => 'Batido De Patilla', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-008', 'nombre' => 'Batido De Guanábana', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-009', 'nombre' => 'Batido De Mango', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],
            ['codigo' => 'BEB-010', 'nombre' => 'Batido De Piña', 'unidad_medida' => 'vaso', 'precio_venta' => 4.00],

            // 🥛 Merengadas y Especiales
            ['codigo' => 'MER-001', 'nombre' => 'Toddy', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'MER-002', 'nombre' => 'Cerelac', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'MER-003', 'nombre' => 'Malteada', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'MER-004', 'nombre' => 'Samba', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'MER-005', 'nombre' => 'Merengada De Durazno', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'MER-006', 'nombre' => 'Merengada De Fresa', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'MER-007', 'nombre' => 'Merengada De Melón', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'MER-008', 'nombre' => 'Merengada De Lechoza', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'MER-009', 'nombre' => 'Merengada De Guanábana', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            
            // 🍹 Tragos
            ['codigo' => 'TRA-001', 'nombre' => 'Trago De Whisky Buchanan', 'unidad_medida' => 'trago', 'precio_venta' => 8.00],
            ['codigo' => 'TRA-002', 'nombre' => 'Trago De Whisky Old Parr', 'unidad_medida' => 'trago', 'precio_venta' => 8.00],
            ['codigo' => 'TRA-003', 'nombre' => 'Cuba Libre', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'TRA-004', 'nombre' => 'Mojito De Fresa', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'TRA-005', 'nombre' => 'Mojito De Parchita', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'TRA-006', 'nombre' => 'Mojito De Limón', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'TRA-007', 'nombre' => 'Michelada', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'TRA-008', 'nombre' => 'Daiquiri De Fresa', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],
            ['codigo' => 'TRA-009', 'nombre' => 'Daiquiri De Parchita', 'unidad_medida' => 'vaso', 'precio_venta' => 5.00],

            // 🧃 Extras Bebidas
            ['codigo' => 'EXT-001', 'nombre' => 'Jugo Yukery 1.5L', 'unidad_medida' => 'botella', 'precio_venta' => 6.00],
            ['codigo' => 'EXT-002', 'nombre' => 'Juguito', 'unidad_medida' => 'unidad', 'precio_venta' => 1.50],
            ['codigo' => 'EXT-003', 'nombre' => 'Refresco', 'unidad_medida' => 'unidad', 'precio_venta' => 1.00],
            ['codigo' => 'EXT-004', 'nombre' => 'Agua Minalba', 'unidad_medida' => 'unidad', 'precio_venta' => 1.00],
            ['codigo' => 'EXT-005', 'nombre' => 'Malta', 'unidad_medida' => 'unidad', 'precio_venta' => 1.00],
            ['codigo' => 'EXT-006', 'nombre' => 'Refresco De Lata', 'unidad_medida' => 'unidad', 'precio_venta' => 2.00],
            ['codigo' => 'EXT-007', 'nombre' => 'Lipton', 'unidad_medida' => 'unidad', 'precio_venta' => 2.00],
            ['codigo' => 'EXT-008', 'nombre' => 'Agua Perrier', 'unidad_medida' => 'unidad', 'precio_venta' => 3.00],
            ['codigo' => 'EXT-009', 'nombre' => 'Gatorade', 'unidad_medida' => 'unidad', 'precio_venta' => 3.00],
            ['codigo' => 'EXT-010', 'nombre' => 'Red Bull', 'unidad_medida' => 'unidad', 'precio_venta' => 4.00],
            ['codigo' => 'EXT-011', 'nombre' => 'Monster', 'unidad_medida' => 'unidad', 'precio_venta' => 5.00],
            ['codigo' => 'EXT-012', 'nombre' => 'Refresco De 2L', 'unidad_medida' => 'botella', 'precio_venta' => 4.00],

            // 🚬 Cigarrillos
            ['codigo' => 'CIG-001', 'nombre' => 'Cigarrillo Belmont', 'unidad_medida' => 'paquete', 'precio_venta' => 4.00],
            ['codigo' => 'CIG-002', 'nombre' => 'Cigarrillo Lucky', 'unidad_medida' => 'paquete', 'precio_venta' => 5.00],

        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}