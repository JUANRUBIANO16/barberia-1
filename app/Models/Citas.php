<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'cliente_id',
        'barbero_id', 
        'fecha_hora',
        'estado',
        'observaciones'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    // Relación con barbero
    public function barbero()
    {
        return $this->belongsTo(barberos::class, 'barbero_id');
    }

    // Constantes para los estados
    const ESTADO_PENDIENTE = 1;
    const ESTADO_CONFIRMADA = 2;
    const ESTADO_COMPLETADA = 3;
    const ESTADO_CANCELADA = 4;

    // Método para obtener el nombre del estado
    public function getEstadoNombreAttribute()
    {
        return match($this->estado) {
            self::ESTADO_PENDIENTE => 'Pendiente',
            self::ESTADO_CONFIRMADA => 'Confirmada',
            self::ESTADO_COMPLETADA => 'Completada',
            self::ESTADO_CANCELADA => 'Cancelada',
            default => 'Desconocido'
        };
    }
}
