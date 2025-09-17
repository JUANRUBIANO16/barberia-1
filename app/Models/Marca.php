<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function caracteristica(){
        return $this->belongsTo(Caracteristica::class, 'carracteristicas-id');
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
