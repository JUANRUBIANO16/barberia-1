<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barbero extends Model
{
    protected $fillable = [
        'persona_id'
    ];
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
