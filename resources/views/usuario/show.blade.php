@extends('template')

@section('title', 'Ver Usuario')

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">Detalles del Usuario</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('usuario.index') }}">Usuarios</a>
        </li>
        <li class="breadcrumb-item active">Ver Usuario</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Información del Usuario</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>ID:</strong></td>
                                <td>{{ $usuario->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nombre:</strong></td>
                                <td>{{ $usuario->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{ $usuario->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Rol:</strong></td>
                                <td>
                                    @switch($usuario->role)
                                        @case('admin')
                                            <span class="badge bg-danger">Administrador</span>
                                            @break
                                        @case('barbero')
                                            <span class="badge bg-warning">Barbero</span>
                                            @break
                                        @case('cliente')
                                            <span class="badge bg-info">Cliente</span>
                                            @break
                                        @default
                                            <span class="badge bg-secondary">Desconocido</span>
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Fecha Creación:</strong></td>
                                <td>{{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Última Actualización:</strong></td>
                                <td>{{ \Carbon\Carbon::parse($usuario->updated_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Acciones</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('usuario.edit', $usuario) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar Usuario
                            </a>
                            <a href="{{ route('usuario.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver a la Lista
                            </a>
                            @if($usuario->id !== auth()->id())
                                <form action="{{ route('usuario.destroy', $usuario) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">
                                        <i class="fas fa-trash"></i> Eliminar Usuario
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-secondary w-100" disabled>
                                    <i class="fas fa-ban"></i> No puedes eliminar tu propio usuario
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
