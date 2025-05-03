<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();

            // Responsable del pedido
            $table->string('responsable_pedido')->nullable();

            // Cliente y usuario (cajero)
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('usuario_id');

            // Productos en JSON
            $table->json('productos')->nullable();

            // Total estimado
            $table->decimal('total_estimado', 10, 2)->default(0);

            // Estación
            $table->string('estacion');

            // Métodos de pago en JSON
            $table->json('metodos_pago')->nullable();

            // Fechas
            $table->timestamp('fecha_apertura')->useCurrent();
            $table->timestamp('fecha_cierre')->nullable();

            // Timestamps de Laravel
            $table->timestamps();

            // Claves foráneas (agregadas al final para evitar errores)
            $table->foreign('cliente_id')->references('id')->on('clientes')->nullOnDelete();
            $table->foreign('usuario_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};