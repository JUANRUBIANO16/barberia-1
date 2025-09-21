<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Models\Cita;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Citacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::with(['clienteUser', 'barberoUser'])->orderBy('fecha_hora', 'desc')->get();
        return view('cita.index', ['citas' => $citas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = User::where('role', 'cliente')->get();
        $barberos = User::where('role', 'barbero')->get();
        return view('cita.create', compact('clientes', 'barberos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCitaRequest $request)
    {
        try{
            DB::beginTransaction();
            
            Cita::create($request->validated());
            
            DB::commit();
            return redirect()->route('cita.index')->with('success','Cita registrada');
        } catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear la cita: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        $cita->load(['clienteUser', 'barberoUser']);
        return view('cita.show', ['cita' => $cita]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        $clientes = User::where('role', 'cliente')->get();
        $barberos = User::where('role', 'barbero')->get();
        return view('cita.edit', ['cita' => $cita, 'clientes' => $clientes, 'barberos' => $barberos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitaRequest $request, Cita $cita)
    {
        try {
            DB::beginTransaction();
            
            $cita->update($request->validated());
            
            DB::commit();
            return redirect()->route('cita.index')->with('success', 'Cita actualizada');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al actualizar la cita: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        try {
            DB::beginTransaction();
            
            $cita->delete();
            
            DB::commit();
            return redirect()->route('cita.index')->with('success', 'Cita eliminada exitosamente');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('cita.index')->with('error', 'Error al eliminar la cita');
        }
    }
}
