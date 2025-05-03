<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('codigo')->unique(); // Código del producto (ej: BC-01)
        $table->string('nombre');            // Nombre del producto
        $table->text('descripcion')->nullable(); // Descripción opcional
        $table->string('unidad_medida');      // Unidad de medida (ej: unidad, botella, caja)
        $table->integer('cantidad_inicial')->default(0); // Cantidad inicial cuando se agrega
        $table->integer('cantidad_actual')->default(0);  // Cantidad actual en stock
        $table->decimal('precio_venta', 10, 2);           // Precio de venta al cliente
        $table->decimal('costo', 10, 2)->nullable();      // Costo opcional (para ver ganancia)
        $table->enum('categoria', ['barra', 'bodegon', 'cocina'])->default('barra'); // Categoría del producto
        $table->text('observaciones')->nullable();        // Notas opcionales
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
