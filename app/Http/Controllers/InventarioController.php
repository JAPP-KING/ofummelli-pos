<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Mostrar listado de inventarios.
     */
    public function index()
    {
        $inventarios = Inventario::with('producto')->get(); // Relacionar el producto

        return view('inventarios.index', compact('inventarios'));
    }

    public function entrada($id)
{
    $inventario = \App\Models\Inventario::findOrFail($id);
    return view('inventarios.entrada', compact('inventario'));
}

public function storeEntrada(Request $request, $id)
{
    $inventario = \App\Models\Inventario::findOrFail($id);

    $request->validate([
        'cantidad' => 'required|integer|min:1',
    ]);

    $inventario->cantidad_actual += $request->cantidad;
    $inventario->save();

    return redirect()->route('inventarios.index')->with('success', '¡Entrada registrada correctamente!');
}

public function entradaGlobal()
{
    $productos = \App\Models\Producto::orderBy('nombre')->get();
    return view('inventarios.entrada-global', compact('productos'));
}

public function storeEntradaGlobal(Request $request)
{
    $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
    ]);

    $inventario = Inventario::where('producto_id', $request->producto_id)->first();

    if ($inventario) {
        // Si existe el inventario del producto, actualizamos su cantidad
        $inventario->cantidad_actual += $request->cantidad;
        $inventario->save();
    } else {
        // Si no existe, creamos un nuevo registro de inventario
        Inventario::create([
            'producto_id' => $request->producto_id,
            'cantidad_inicial' => $request->cantidad,
            'cantidad_actual' => $request->cantidad,
            'precio_costo' => 0, // Se puede actualizar luego si quieres
        ]);
    }

    return redirect()->route('inventarios.index')->with('success', '¡Entrada global registrada exitosamente!');
}
}
