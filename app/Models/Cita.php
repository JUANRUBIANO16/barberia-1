<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'cliente_user_id',
        'barbero_user_id', 
        'fecha_hora',
        'estado',
        'observaciones'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    public function clienteUser(){
        return $this->belongsTo(User::class, 'cliente_user_id');
    }

    public function barberoUser(){
        return $this->belongsTo(User::class, 'barbero_user_id');
    }

    // Métodos para obtener el estado como texto
    public function getEstadoTextoAttribute()
    {
        $estados = [
            1 => 'Pendiente',
            2 => 'Confirmada', 
            3 => 'Completada',
            4 => 'Cancelada'
        ];
        
        return $estados[$this->estado] ?? 'Desconocido';
    }

    // Métodos para verificar estado
    public function isPendiente()
    {
        return $this->estado === 1;
    }

    public function isConfirmada()
    {
        return $this->estado === 2;
    }

    public function isCompletada()
    {
        return $this->estado === 3;
    }

    public function isCancelada()
    {
        return $this->estado === 4;
    }
}