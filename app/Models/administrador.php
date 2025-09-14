<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class administrador extends Model
{
    use hasfactory;
    
    protected $table="administrador";
    protected $fillable=['id_admin','nombre','apellido','telefono','correo'];
    public $timestamps=false;
}
