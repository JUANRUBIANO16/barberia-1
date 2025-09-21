@extends('template')

@section('title', 'Crear Producto')

@push('css')
<style>
    #descripcion{
      resize:"none";  
    }
</style>
@endpush

@section('content')

<h1 class="mt-4 px-5">Crear Producto</h1>
<ol class="breadcrumb mb-4 px-5">
    <li class="breadcrumb-item">
        <a href="{{ route('panel') }}">Inicio</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('producto.index') }}">Productos</a>
    </li>
    <li class="breadcrumb-item active">Crear Producto</li>
</ol>

<div class="container w-100 border-3 border primary rounded p-4 mt-3">

<form action="{{route('producto.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="row g-3">
        <div class="col-md-6">
            <label for="code" class="form-label">Código del Producto</label>
          <input type="text" name="code" id="code" class="form-control" value="{{old('code')}}">
        @error('code')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre del Producto</label>
          <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
        @error('nombre')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="stock" class="form-label">Stock</label>
          <input type="number" name="stock" id="stock" class="form-control" value="{{old('stock')}}">
        @error('stock')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
          <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{old('fecha_vencimiento')}}">
        @error('fecha_vencimiento')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="marca_id" class="form-label">Marca</label>
            <select name="marca_id" id="marca_id" class="form-control">
                <option value="">Seleccionar marca</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
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
                    <option value="{{ $presentacion->id }}" {{ old('presentacion_id') == $presentacion->id ? 'selected' : '' }}>
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
            <input type="file" name="img_path" id="img_path" class="form-control" accept="image/*">
        @error('img_path')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{old('descripcion')}}</textarea>
@error('descripcion')
<small class="text-danger">{{$message}}</small>
@enderror
        </div>

          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
          </div>   
    
    </div>
</form>

</div>

@endsection

@push('js')
{{-- Aquí tu JS extra si necesitas --}}
@endpush