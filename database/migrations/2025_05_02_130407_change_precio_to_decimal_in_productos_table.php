<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->decimal('precio_venta', 10, 2)->change(); // ✅ columna correcta
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->float('precio')->change(); // o el tipo anterior que tenías
        });
    }
};
