<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Presentacione;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class productocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $productos = Producto::with(['marca', 'presentacion'])->get();
        return view('producto.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::with('caracteristica')->get();
        $presentaciones = Presentacione::with('caracteristica')->get();
        return view("producto.create", compact('marcas', 'presentaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        try{
            DB::beginTransaction();
            
            $data = $request->validated();
            
            // Manejar la imagen
            if ($request->hasFile('img_path')) {
                $data['img_path'] = $request->file('img_path')->store('productos', 'public');
            }
            
            Producto::create($data);
            
            DB::commit();
            return redirect()->route('producto.index')->with('success','Producto registrado');
        } catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear el producto: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $producto->load(['marca', 'presentacion']);
        $marcas = Marca::with('caracteristica')->get();
        $presentaciones = Presentacione::with('caracteristica')->get();
        return view('producto.edit',['producto'=>$producto, 'marcas' => $marcas, 'presentaciones' => $presentaciones]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        try {
            DB::beginTransaction();
            
            $data = $request->validated();
            
            // Manejar la imagen
            if ($request->hasFile('img_path')) {
                // Eliminar imagen anterior si existe
                if ($producto->img_path) {
                    Storage::disk('public')->delete($producto->img_path);
                }
                $data['img_path'] = $request->file('img_path')->store('productos', 'public');
            }
            
            $producto->update($data);
            DB::commit();
            return redirect()->route('producto.index')->with('success', 'Producto editado');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al editar el producto: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        try {
            DB::beginTransaction();
            $producto->delete();
            DB::commit();
            return redirect()->route('producto.index')->with('success', 'Producto eliminado exitosamente');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('producto.index')->with('error', 'Error al eliminar el producto: ' . $e->getMessage());
        }
    }
}
