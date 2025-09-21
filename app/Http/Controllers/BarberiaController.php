<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class BarberiaController extends Controller
{
    /**
     * Mostrar la página principal de la barbería
     */
    public function inicio()
    {
        $productos = Producto::with(['marca', 'presentacion'])->take(6)->get();
        return view('barberia.inicio', compact('productos'));
    }
}
