@extends('template')

@section('title','Editar Cita')

@push('css')
@endpush

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">Editar Cita</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('cita.index') }}">Citas</a>
        </li>
        <li class="breadcrumb-item active">Editar Cita</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">

         <form action="{{ route('cita.update', ['cita' => $cita]) }}" method="post">
            @csrf
            @method('PATCH')
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="cliente_user_id" class="form-label">Cliente</label>
                    <select name="cliente_user_id" id="cliente_user_id" class="form-control">
                        <option value="">Seleccionar cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_user_id', $cita->cliente_user_id) == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cliente_user_id')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="barbero_user_id" class="form-label">Barbero</label>
                    <select name="barbero_user_id" id="barbero_user_id" class="form-control">
                        <option value="">Seleccionar barbero</option>
                        @foreach($barberos as $barbero)
                            <option value="{{ $barbero->id }}" {{ old('barbero_user_id', $cita->barbero_user_id) == $barbero->id ? 'selected' : '' }}>
                                {{ $barbero->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('barbero_user_id')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                    <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control" value="{{ old('fecha_hora', \Carbon\Carbon::parse($cita->fecha_hora)->format('Y-m-d\TH:i')) }}">
                    @error('fecha_hora')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="">Seleccionar estado</option>
                        <option value="1" {{ old('estado', $cita->estado) == '1' ? 'selected' : '' }}>Pendiente</option>
                        <option value="2" {{ old('estado', $cita->estado) == '2' ? 'selected' : '' }}>Confirmada</option>
                        <option value="3" {{ old('estado', $cita->estado) == '3' ? 'selected' : '' }}>Completada</option>
                        <option value="4" {{ old('estado', $cita->estado) == '4' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    @error('estado')
                        <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" rows="3" class="form-control" placeholder="Observaciones adicionales...">{{ old('observaciones', $cita->observaciones) }}</textarea>
                    @error('observaciones')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                 <div class="col-12 text-center">
                     <button type="submit" class="btn btn-primary">Actualizar Cita</button>
                     <a href="{{ route('cita.index') }}" class="btn btn-secondary">Cancelar</a>
                 </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
@endpush
