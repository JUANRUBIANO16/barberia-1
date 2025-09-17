<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    public function categoria(){
        return $this->hasOne(Categoria::class, 'carracteristicas');
    }

    public function marca(){
        return $this->hasOne(Marca::class, 'carracteristicas-id');
    }

    public function presentacion(){
        return $this->hasOne(Presentacion::class, 'carracteristicas_id');
    }
}
