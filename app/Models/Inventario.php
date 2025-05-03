<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    // Aquí mismo agregamos:

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
