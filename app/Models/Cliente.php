<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    protected $fillable = [
        'personas_id'
    ];
    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
