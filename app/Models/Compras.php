<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    public function provedore(){
        return $this->belongsTo(Provedore::class, 'provedore_id');
    }
}
