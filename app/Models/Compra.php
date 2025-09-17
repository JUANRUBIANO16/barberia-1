<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function provedore(){
        return $this->belongsTo(Provedore::class, 'provedore_id');
    }

    public function comprobante(){
        return $this->belongsTo(Comprobante::class, 'comprobante_id');
    }
    
    public function productos(){
        return $this->belongsToMany(Producto::class)->withTimestamps()
        ->withPivot('cantidad','precio_compra','precio_venta');
    }
}



