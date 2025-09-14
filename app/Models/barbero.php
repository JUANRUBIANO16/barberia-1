<?php

namespace App\Models;
use Illuminate\Database\Eloquent\factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barbero extends Model
{
    use hasfactory;

    protected $table="barbero";

    protected $fillable=['id_barbero','nombre','apellido','disponibilidad','telefono','num_doc','salario','edad'];
    public $timestamps=false;
}
