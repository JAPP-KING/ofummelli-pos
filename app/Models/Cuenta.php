<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'cliente_nombre',
        'usuario_id',
        'responsable_pedido',
        'estacion',
        'fecha_apertura',
        'fecha_cierre',
        'total_estimado',
        'productos',
        'metodos_pago',
        'pagada',
    ];

    protected $casts = [
        'productos'     => 'array',
        'metodos_pago'  => 'array',
        'fecha_apertura'=> 'datetime',
        'fecha_cierre'  => 'datetime',
    ];

    // 🔗 Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    // 🔗 Relación con Usuario (cajero que registró)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}