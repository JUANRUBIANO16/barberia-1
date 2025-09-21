<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePresentacionRequest;
use App\Http\Requests\UpdatePresentacionRequest;
use App\Models\Presentacione;
use App\Models\Caracteristica;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class presentacioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $presentaciones=Presentacione::with('caracteristica')->get();
        return view('presentacion.index',['presentaciones'=>$presentaciones]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("presentacion.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePresentacionRequest $request)
    {
        try{
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->presentacione()->create([
                'caracteristica_id' => $caracteristica->id
            ]);
            
            DB::commit();
            return redirect()->route('presentacion.index')->with('success','presentacion registrada');
        } catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear la presentación');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presentacione $presentacion)
    {
        $presentacion->load('caracteristica');
        return view('presentacion.edit',['presentacion'=>$presentacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresentacionRequest $request, Presentacione $presentacion)
    {
        Caracteristica::where('id', $presentacion->caracteristica->id)
        ->update($request->validated());

        return redirect()->route('presentacion.index')->with('success', 'presentacion editada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presentacione $presentacion)
    {
        try {
            DB::beginTransaction();
            
            // Eliminar la característica asociada
            $presentacion->caracteristica->delete();
            
            // Eliminar la presentación
            $presentacion->delete();
            
            DB::commit();
            return redirect()->route('presentacion.index')->with('success', 'Presentación eliminada exitosamente');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('presentacion.index')->with('error', 'Error al eliminar la presentación');
        }
    }
}
