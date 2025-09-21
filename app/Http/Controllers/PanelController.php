<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\Cita;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        // Obtener estadísticas
        $stats = [
            'total_usuarios' => User::count(),
            'usuarios_admin' => User::where('role', 'admin')->count(),
            'usuarios_barberos' => User::where('role', 'barbero')->count(),
            'usuarios_clientes' => User::where('role', 'cliente')->count(),
            'total_productos' => Producto::count(),
            'total_citas' => Cita::count(),
            'citas_pendientes' => Cita::where('estado', 1)->count(),
            'citas_confirmadas' => Cita::where('estado', 2)->count(),
            'citas_completadas' => Cita::where('estado', 3)->count(),
            'citas_canceladas' => Cita::where('estado', 4)->count(),
        ];

        return view('panel.index', compact('stats'));
    }
}
