<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::orderBy('name')->get();
        return view('usuario.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        try{
            DB::beginTransaction();
            
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            
            User::create($data);
            
            DB::commit();
            return redirect()->route('usuario.index')->with('success','Usuario registrado');
        } catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear el usuario: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return view('usuario.show', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        return view('usuario.edit', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, User $usuario)
    {
        try {
            DB::beginTransaction();
            
            $data = $request->validated();
            
            // Si se proporciona una nueva contraseña, hashearla
            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                // Si no se proporciona contraseña, mantener la actual
                unset($data['password']);
            }
            
            $usuario->update($data);
            
            DB::commit();
            return redirect()->route('usuario.index')->with('success', 'Usuario actualizado');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al actualizar el usuario: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        try {
            DB::beginTransaction();
            
            // No permitir eliminar el usuario actual
            if ($usuario->id === auth()->id()) {
                return redirect()->route('usuario.index')->with('error', 'No puedes eliminar tu propio usuario');
            }
            
            $usuario->delete();
            
            DB::commit();
            return redirect()->route('usuario.index')->with('success', 'Usuario eliminado exitosamente');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('usuario.index')->with('error', 'Error al eliminar el usuario');
        }
    }
}
