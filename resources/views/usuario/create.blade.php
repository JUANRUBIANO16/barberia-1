@extends('template')

@section('title', 'Crear Usuario')

@section('content')

<h1 class="mt-4 px-5">Crear Usuario</h1>
<ol class="breadcrumb mb-4 px-5">
    <li class="breadcrumb-item">
        <a href="{{ route('panel') }}">Inicio</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('usuario.index') }}">Usuarios</a>
    </li>
    <li class="breadcrumb-item active">Crear Usuario</li>
</ol>

<div class="container w-100 border-3 border primary rounded p-4 mt-3">

<form action="{{route('usuario.store')}}" method="post">
    @csrf
<div class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
        @error('name')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
        @error('email')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        @error('password')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <div class="col-md-12">
            <label for="role" class="form-label">Rol</label>
            <select name="role" id="role" class="form-control">
                <option value="">Seleccionar rol</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="barbero" {{ old('role') == 'barbero' ? 'selected' : '' }}>Barbero</option>
                <option value="cliente" {{ old('role') == 'cliente' ? 'selected' : '' }}>Cliente</option>
            </select>
        @error('role')
       <small class="text-danger">{{'*'.$message}}</small>
        @enderror
        </div>

          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
          </div>   
    
    </div>
</form>

</div>

@endsection

@push('js')
{{-- Aquí tu JS extra si necesitas --}}
@endpush
