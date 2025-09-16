<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class compra_producto extends Model
{
    public function compra(){
        return $this->belongsTo(Compras::class, 'compra_id');
    }

    public function producto(){
        return $this->belongsTo(Productos::class, 'producto_id');
    }
}
