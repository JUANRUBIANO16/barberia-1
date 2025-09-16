<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedore extends Model
{
    use HasFactory;

    public function persona(){
        return $this->belongsTo(Personas::class, 'persona_id');
    }

    public function compras(){
        return $this->hasMany(Compras::class);
    }

}
