<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comprobante(){
        return $this->belongsTo(Comprobantes::class, 'comprobante_id');
    }

     public function ventas(){
        return $this->belongsToMany(Venta::class)->withTimestamps()
        ->withPivot('cantidad','precio_compra','precio_venta');
    }

}
