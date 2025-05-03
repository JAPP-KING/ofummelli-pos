<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventario_id'); // Producto afectado
            $table->enum('tipo', ['entrada', 'salida']); // Entrada o salida
            $table->integer('cantidad'); // Cuántos productos entraron o salieron
            $table->decimal('precio_costo', 8, 2)->nullable(); // Opcional
            $table->text('detalle')->nullable(); // Descripción o motivo opcional
            $table->timestamps();

            // 🔵 Llave foránea
            $table->foreign('inventario_id')->references('id')->on('inventarios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
