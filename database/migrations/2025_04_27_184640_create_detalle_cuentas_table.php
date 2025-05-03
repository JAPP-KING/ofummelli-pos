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
    Schema::create('detalle_cuentas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cuenta_id')->constrained('cuentas')->onDelete('cascade'); // Relación a la cuenta
        $table->foreignId('producto_id')->constrained('productos')->onDelete('restrict'); // Relación a producto
        $table->integer('cantidad')->default(1); // Cantidad de productos pedidos
        $table->decimal('precio_unitario', 10, 2); // Precio individual del producto
        $table->decimal('subtotal', 10, 2); // cantidad * precio_unitario
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_cuentas');
    }
};
