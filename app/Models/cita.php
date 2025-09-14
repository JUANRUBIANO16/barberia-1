<?php

namespace App\Models;
use\Illuminate\Database\eloquent\factories\hasfactory;

use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    use hasfactory;

    protected $table="citas";
    public $fiablle=['id_fecha','estado','hora','estado','descripcion','id.clie'];
    public $timestamps false;
}
