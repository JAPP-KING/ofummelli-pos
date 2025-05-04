<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\CuentaController; // ✅ NUEVO CONTROLADOR

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requiere autenticación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Ruta para ver cuentas pagadas (por ahora sin protección de auth)
Route::get('/cuentas/pagadas', [CuentaController::class, 'pagadas'])->name('cuentas.pagadas');

// Agrupadas bajo autenticación
Route::middleware('auth')->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Inventarios
    Route::get('/inventarios/entrada-global', [InventarioController::class, 'entradaGlobal'])->name('inventarios.entrada.global');
    Route::post('/inventarios/entrada-global', [InventarioController::class, 'storeEntradaGlobal'])->name('inventarios.entrada.global.store');
    Route::resource('inventarios', InventarioController::class);

    // Movimientos
    Route::get('/movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');

    // Productos
    Route::resource('productos', ProductoController::class);
    Route::get('/productos/buscar', [ProductoController::class, 'buscar'])->name('productos.buscar');

    // Exportar Excel de Clientes
    Route::get('/clientes/exportar', [ClienteController::class, 'exportarExcel'])->name('clientes.exportar');

    // Clientes
    Route::resource('clientes', ClienteController::class);
    Route::get('/clientes/buscar', [ClienteController::class, 'buscar'])->name('clientes.buscar');

    // Cuentas (nuevo módulo)
    Route::resource('cuentas', CuentaController::class);
    Route::put('/cuentas/{cuenta}/cerrar', [CuentaController::class, 'cerrar'])->name('cuentas.cerrar');
    Route::post('/cuentas/{cuenta}/marcar-pagada', [CuentaController::class, 'marcarPagada'])->name('cuentas.marcarPagada');
    Route::get('/cuentas', [CuentaController::class, 'index'])->name('cuentas.index');
});

require __DIR__.'/auth.php';