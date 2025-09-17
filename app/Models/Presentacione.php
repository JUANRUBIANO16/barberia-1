<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    public function caracteristica(){
        return $this->belongsTo(Caracteristica::class, 'carracteristicas_id');
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
