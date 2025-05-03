<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuenta_id')->constrained()->onDelete('cascade');
            $table->string('metodo'); // divisas, pago_movil, bs_efectivo, etc.
            $table->decimal('monto', 10, 2);
            $table->string('referencia')->nullable(); // Solo si aplica
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
