<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function barbero(){
        return $this->belongsTo(barberos::class, 'barbero_id');
    }
}