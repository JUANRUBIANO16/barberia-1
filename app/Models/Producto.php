<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'code', 'nombre', 'descripcion', 'stock', 'fecha_vencimiento', 
        'img_path', 'marca_id', 'presentacion_id'
    ];

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function presentacion(){
        return $this->belongsTo(Presentacione::class, 'presentacion_id');
    }
    
    public function compras(){
        return $this->belongsToMany(Compra::class, 'compra_productos')->withTimestamps()
        ->withPivot('cantidad','precio_compra','precio_venta');
    }
    
    public function ventas(){
        return $this->belongsToMany(Venta::class, 'producto_venta')->withTimestamps()
        ->withPivot('cantidad','precio_venta','descuento');
    }
}
