@extends('template')

@section('title','editar presentacion')

@push('css')
@endpush

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">editar presentacion</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('presentacion.index') }}">Presentación</a>
        </li>
        <li class="breadcrumb-item active">editar presentacion</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">

         <form action="{{ route('presentacion.update', ['presentacion' => $presentacion]) }}" method="post">
            @csrf
            @method('PATCH')
            
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">nombre</label>
                     <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $presentacion->caracteristica->nombre) }}">
                    @error('nombre')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="descripcion" class="form-label">descripcion</label>
                     <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{ old('descripcion',$presentacion->caracteristica->descripcion) }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                 <div class="col-12 text-center">
                     <button type="submit" class="btn btn-primary">guardar</button>
                     <a href="{{ route('presentacion.index') }}" class="btn btn-secondary">cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
@endpush
