<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'razon_social',
        'direccion', 
        'tipo_persona',
        'documento_id',
        'estado'
    ];
    public function documento(){
        return $this->belongsTo(Documento::class);
    }

    public function provedore(){
        return $this->hasOne(Provedore::class);
    }

    public function cliente(){
        return $this->hasOne(Cliente::class);
    }

    public function barbero(){
        return $this->hasOne(barbero::class);
    }
}


