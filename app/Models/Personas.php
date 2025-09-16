<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    public function documento(){
        return $this->belongsTo(Documento::class, 'documento_id');
    }

    public function provedore(){
        return $this->hasOne(Provedore::class);
    }

    public function cliente(){
        return $this->hasOne(Clientes::class);
    }

    public function barbero(){
        return $this->hasOne(barberos::class);
    }
}


