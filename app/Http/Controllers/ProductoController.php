<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $productos = \App\Models\Producto::all(); // Traer todos los productos de la base de datos
    return view('productos.index', compact('productos')); // Llevarlos a la vista productos/index.blade.php
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validamos los datos
    $validated = $request->validate([
        'codigo' => 'required|string|max:255|unique:productos,codigo',
        'nombre' => 'required|string|max:255',
        'unidad_medida' => 'required|string|max:50',
        'precio_venta' => 'required|numeric|min:0',
    ]);

    // Creamos el producto
    \App\Models\Producto::create($validated);

    // Redirigimos de vuelta al listado con un mensaje de éxito
    return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
