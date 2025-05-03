<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index(Request $request)
    {
        $query = Movimiento::with('inventario.producto')->orderBy('created_at', 'desc');

        // ✅ Filtrar por fecha
        if ($request->filled('fecha_inicio')) {
            $query->whereDate('created_at', '>=', $request->fecha_inicio);
        }
        if ($request->filled('fecha_fin')) {
            $query->whereDate('created_at', '<=', $request->fecha_fin);
        }

        // ✅ Filtrar por varios productos
        if ($request->filled('producto_id')) {
            $productoIds = $request->producto_id;
            $query->whereHas('inventario', function ($q) use ($productoIds) {
                $q->whereIn('producto_id', (array) $productoIds);
            });
        }

        $movimientos = $query->paginate(10)->withQueryString(); // ✅ Paginación + mantener filtros

        $productos = Producto::orderBy('nombre')->get(); // ✅ Productos ordenados

        return view('movimientos.index', compact('movimientos', 'productos'));
    }
}
