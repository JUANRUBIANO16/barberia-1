<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function marca(){
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function presentacion(){
        return $this->belongsTo(Presentacion::class, 'presentacion_id');
    }

    public function caracteristica(){
        return $this->belongsTo(Caracteristica::class, 'caracteristica_id');
    }
    
    public function compras(){
        return $this->belongsToMany(Compra::class)->withTimestamps()
        ->withPivot('cantidad','precio_compra','precio_venta');
    }
    
    public function ventas(){
        return $this->belongsToMany(Venta::class)->withTimestamps()
        ->withPivot('cantidad','precio_compra','precio_venta');
    }
    
    public function categorias(){
        return $this->belongsToMany(Categoria::class)->withTimestamps();
    }
    
}
