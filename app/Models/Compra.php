<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function provedore(){
        return $this->belongsTo(Provedore::class);
    }

    public function comprobante(){
        return $this->belongsTo(Comprobante::class);
    }
    
    public function productos(){
        return $this->belongsToMany(Producto::class, 'compra_productos')->withTimestamps()
        ->withPivot('cantidad','precio_compra','precio_venta');
    }
}



