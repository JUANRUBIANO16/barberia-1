<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;
use App\Models\Marca;
use App\Models\Caracteristica;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class marcacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $marcas=Marca::with('caracteristica')->get();
        return view('marca.index',['marcas'=>$marcas]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("marca.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarcaRequest $request)
    {
        try{
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->marca()->create([
                'caracteristica_id' => $caracteristica->id
            ]);
            
            DB::commit();
            return redirect()->route('marca.index')->with('success','marca registrada');
        } catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear la marca');
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
    public function edit(Marca $marca)
    {
        $marca->load('caracteristica');
        return view('marca.edit',['marca'=>$marca]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarcaRequest $request, Marca $marca)
    {
        Caracteristica::where('id', $marca->caracteristica->id)
        ->update($request->validated());

        return redirect()->route('marca.index')->with('success', 'marca editada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        try {
            DB::beginTransaction();
            
            // Eliminar la característica asociada
            $marca->caracteristica->delete();
            
            // Eliminar la marca
            $marca->delete();
            
            DB::commit();
            return redirect()->route('marca.index')->with('success', 'Marca eliminada exitosamente');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('marca.index')->with('error', 'Error al eliminar la marca');
        }
    }
}

