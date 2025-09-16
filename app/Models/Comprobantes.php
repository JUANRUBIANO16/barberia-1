<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comprobantes extends Model
{
    public function comprobante(){
        return $this->belongsTo(Comprobantes::class);
    }
}
