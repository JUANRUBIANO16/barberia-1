<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public function categoria(){
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function marca(){
        return $this->belongsTo(Marcas::class, 'marca_id');
    }

    public function presentacion(){
        return $this->belongsTo(Presentacion::class, 'presentacion_id');
    }

    public function caracteristica(){
        return $this->belongsTo(Carracteristicas::class, 'caracteristica_id');
    }
}
