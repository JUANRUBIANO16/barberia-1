<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Clientes extends Model
{
    public function persona(){
        return $this->belongsTo(Personas::class, 'personas_id');
    }
}
