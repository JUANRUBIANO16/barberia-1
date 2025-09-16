<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barberos extends Model
{
    public function persona(){
        return $this->belongsTo(Personas::class, 'persona_id');
    }
}
