<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    public function persona(){
        return $this->belongsTo(Persona::class, 'personas_id');
    }

    public function citas(){
        return $this->hasMany(Cita::class, 'cliente_id');
    }
}
