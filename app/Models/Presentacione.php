<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presentacione extends Model
{
    protected $fillable = ['caracteristica_id'];

    public function caracteristica(){
        return $this->belongsTo(Caracteristica::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
