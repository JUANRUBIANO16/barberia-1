@extends('template')

@section('title','Editar Producto')

@push('css')
@endpush

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">Editar Producto</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('producto.index') }}">Productos</a>
        </li>
        <li class="breadcrumb-item active">Editar Producto</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">

         <form action="{{ route('producto.update', ['producto' => $producto]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="code" class="form-label">Código del Producto</label>
                     <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $producto->code) }}">
                    @error('code')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre del Producto</label>
                     <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}">
                    @error('nombre')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="stock" class="form-label">Stock</label>
                     <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $producto->stock) }}">
                    @error('stock')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                     <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{ old('fecha_vencimiento', $producto->fecha_vencimiento) }}">
                    @error('fecha_vencimiento')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="marca_id" class="form-label">Marca</label>
                    <select name="marca_id" id="marca_id" class="form-control">
                        <option value="">Seleccionar marca</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ old('marca_id', $producto->marca_id) == $marca->id ? 'selected' : '' }}>
                                {{ $marca->caracteristica->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('marca_id')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="presentacion_id" class="form-label">Presentación</label>
                    <select name="presentacion_id" id="presentacion_id" class="form-control">
                        <option value="">Seleccionar presentación</option>
                        @foreach($presentaciones as $presentacion)
                            <option value="{{ $presentacion->id }}" {{ old('presentacion_id', $producto->presentacion_id) == $presentacion->id ? 'selected' : '' }}>
                                {{ $presentacion->caracteristica->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('presentacion_id')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="img_path" class="form-label">Imagen del Producto</label>
                    @if($producto->img_path)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $producto->img_path) }}" alt="{{ $producto->nombre }}" style="width: 100px; height: 100px; object-fit: cover;" class="border rounded">
                            <p class="text-muted small">Imagen actual</p>
                        </div>
                    @endif
                    <input type="file" name="img_path" id="img_path" class="form-control" accept="image/*">
                    @error('img_path')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                     <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                 <div class="col-12 text-center">
                     <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                     <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
@endpush