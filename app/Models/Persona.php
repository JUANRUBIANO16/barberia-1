<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function documento(){
        return $this->belongsTo(Documento::class, 'documento_id');
    }

    public function provedore(){
        return $this->hasOne(Provedore::class, 'persona_id');
    }

    public function cliente(){
        return $this->hasOne(Cliente::class, 'personas_id');
    }

    public function barbero(){
        return $this->hasOne(barbero::class, 'persona_id');
    }
}


