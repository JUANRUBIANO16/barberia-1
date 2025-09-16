<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comprobante(){
        return $this->belongsTo(Comprobantes::class, 'comprobante_id');
    }
}
