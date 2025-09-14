<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class comprobante extends Model
{
    use hasfactorY;
    protected $table='comprobante'
    public $fillable=['']
    public $timestamps=false
}
