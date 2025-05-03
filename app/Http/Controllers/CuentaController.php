<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{
    public function index()
    {
        $cuentas = Cuenta::orderBy('created_at', 'desc')->paginate(10);
        return view('cuentas.index', compact('cuentas'));
    }

    public function create()
{
    $productos = Producto::orderBy('nombre')->get();
    $clientes = Cliente::all();

    // Formato para pasar productos al JS
    $productosJS = $productos->mapWithKeys(function ($producto) {
        return [$producto->id => [
            'nombre' => $producto->nombre,
            'precio' => (float) $producto->precio_venta,
        ]];
    });

    return view('cuentas.create', compact('productos', 'productosJS', 'clientes'));
}

public function store(Request $request)
{
    $request->validate([
        'cliente_id'       => 'nullable|exists:clientes,id',
        'cliente_nombre'   => 'nullable|string|max:255',
        'responsable'      => 'nullable|string|max:255',
        'estacion'         => 'required|string|max:255',
        'fecha_hora'       => 'required|date',
        'productos'        => 'required|array',
        'productos.*'      => 'exists:productos,id',
        'cantidades'       => 'required|array',
        'cantidades.*'     => 'numeric|min:1',
        'metodo_pago'      => 'required|array',
        'monto_pago'       => 'required|array',
        'referencia_pago'  => 'nullable|array',
    ]);

    // ✅ Validación personalizada aquí
    if (empty($request->cliente_id) && empty($request->cliente_nombre)) {
        return back()->withErrors([
            'cliente_nombre' => 'Debe seleccionar un cliente o ingresar un nombre manual.',
        ])->withInput();
    }

    DB::beginTransaction();

    try {
        $total = 0;
        $productos_array = [];

        foreach ($request->productos as $index => $producto_id) {
            $producto = Producto::findOrFail($producto_id);
            $cantidad = $request->cantidades[$index] ?? 1;
            $subtotal = $producto->precio_venta * $cantidad;

            $productos_array[] = [
                'producto_id' => $producto_id,
                'cantidad'    => $cantidad,
                'precio'      => $producto->precio_venta,
                'subtotal'    => $subtotal
            ];

            $total += $subtotal;
        }

        $cuenta = Cuenta::create([
            'cliente_id'         => $request->cliente_id,
            'cliente_nombre'     => $request->cliente_nombre ?? null,
            'usuario_id'         => Auth::id(),
            'responsable_pedido' => $request->responsable,
            'estacion'           => $request->estacion,
            'fecha_apertura'     => $request->fecha_hora,
            'total_estimado'     => $total,
            'productos'          => json_encode($productos_array),
            'metodos_pago'       => json_encode([]),
        ]);

        $metodos_pago_array = [];
        foreach ($request->metodo_pago as $index => $metodo) {
            $metodos_pago_array[] = [
                'metodo'     => $metodo,
                'monto'      => $request->monto_pago[$index] ?? 0,
                'referencia' => $request->referencia_pago[$index] ?? null,
            ];
        }

        $cuenta->metodos_pago = json_encode($metodos_pago_array);
        $cuenta->save();

        DB::commit();
        return redirect()->route('cuentas.index')->with('success', 'Cuenta registrada exitosamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'Error al registrar la cuenta: ' . $e->getMessage()]);
    }
}

    public function show($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        $cuenta = Cuenta::with('cliente')->findOrFail($id);

        // Decodificamos los JSON
        $cuenta->productos = json_decode($cuenta->productos, true);
        $cuenta->metodos_pago = json_decode($cuenta->metodos_pago, true);
        

        // Obtenemos los productos necesarios en una sola consulta
        $productosIds = array_column($cuenta->productos, 'producto_id');
        $productos = \App\Models\Producto::whereIn('id', $productosIds)->get()->keyBy('id');

        return view('cuentas.show', compact('cuenta', 'productos'));
    }

    public function edit(Cuenta $cuenta)
    {
        return view('cuentas.edit', compact('cuenta'));
    }

    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();
        return redirect()->route('cuentas.index')->with('success', 'Cuenta eliminada correctamente.');
    }

    public function cerrar(Cuenta $cuenta)
    {
        $cuenta->update([
            'fecha_cierre' => now(),
        ]);

        return redirect()->route('cuentas.index')->with('success', 'Cuenta cerrada correctamente.');
    }

    public function marcarPagada(Cuenta $cuenta)
    {
        $cuenta->pagada = true;
        $cuenta->fecha_cierre = now();
        $cuenta->save();

        return redirect()->route('cuentas.index')->with('success', 'Cuenta marcada como pagada.');
    }

    public function cuentasPagadas()
    {
        $cuentas = Cuenta::where('pagada', true)->latest()->paginate(10);
        return view('cuentas.pagadas', compact('cuentas'));
    }
}