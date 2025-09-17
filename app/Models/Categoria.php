<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function caracteristica(){
        return $this->belongsTo(Caracteristica::class, 'carracteristicas');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class)->withTimestamps();
    }
 
}
