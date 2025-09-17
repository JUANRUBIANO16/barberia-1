<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    public function cliente(){
        return $this->belongsTo(Cliente::class, );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comprobante(){
        return $this->belongsTo(Comprobantes::class);
    }

     public function ventas(){
        return $this->belongsToMany(Venta::class)->withTimestamps()
        ->withPivot('cantidad','precio_compra','precio_venta');
    }

}
