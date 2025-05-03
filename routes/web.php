<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\CuentaController; // ✅ NUEVO CONTROLADOR

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

    // ✅ Exportar Excel de Clientes
    Route::get('/clientes/exportar', [ClienteController::class, 'exportarExcel'])
        ->name('clientes.exportar')
        ->middleware('auth');

    // Clientes
    Route::resource('clientes', ClienteController::class);
    Route::get('/clientes/buscar', [ClienteController::class, 'buscar'])->name('clientes.buscar');

    // ✅ Cuentas (nuevo módulo)
    Route::resource('cuentas', CuentaController::class);
    Route::put('/cuentas/{cuenta}/cerrar', [CuentaController::class, 'cerrar'])->name('cuentas.cerrar');
    Route::post('/cuentas/{cuenta}/marcar-pagada', [CuentaController::class, 'marcarPagada'])
    ->name('cuentas.marcarPagada');
    Route::get('/cuentas/pagadas', [CuentaController::class, 'cuentasPagadas'])->name('cuentas.pagadas');
    Route::get('/cuentas', [CuentaController::class, 'index'])->name('cuentas.index');

});

require __DIR__.'/auth.php';