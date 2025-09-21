<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\administrador;
use App\Models\Categoria;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\marcacontroller;
use App\Http\Controllers\presentacioncontroller;
use App\Http\Controllers\productocontroller;
use App\Http\Controllers\Citacontroller;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

// Página principal de la barbería
Route::get('/', [App\Http\Controllers\BarberiaController::class, 'inicio'])->name('barberia.inicio');

//rutas de autenticación
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    
           // Panel principal (para todos los roles autenticados)
           Route::get('/panel', [PanelController::class, 'index'])->name('panel');
    
    // Rutas de administración (para todos los roles autenticados)
    Route::resource('categoria', CategoriaController::class)->parameters(['categoria' => 'categoria']);
    Route::resource('marca', marcacontroller::class)->parameters(['marca' => 'marca']);
    Route::resource('presentacion', presentacioncontroller::class)->parameters(['presentacion' => 'presentacion']);
           Route::resource('producto', productocontroller::class)->parameters(['producto' => 'producto']);
           Route::resource('cita', Citacontroller::class)->parameters(['cita' => 'cita']);
           Route::resource('usuario', UsuarioController::class)->parameters(['usuario' => 'usuario']);
       });


Route::get('/401', function () {
    return view('pages.401');
});


Route::get('/404', function () {
    return view('pages.404');
});

Route::get('/500', function () {
    return view('pages.500');
});


