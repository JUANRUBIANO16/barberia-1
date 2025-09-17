<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function barbero(){
        return $this->belongsTo(barbero::class, 'barbero_id');
    }
}