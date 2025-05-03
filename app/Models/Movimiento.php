<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    // ✅ Relación: Cada Movimiento pertenece a un Inventario
    public function inventario()
    {
        return $this->belongsTo(\App\Models\Inventario::class);
    }
}
