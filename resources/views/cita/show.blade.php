@extends('template')

@section('title', 'Ver Cita')

@section('content')
<div class="container">
    <h1 class="mt-4 px-5">Detalles de la Cita</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('cita.index') }}">Citas</a>
        </li>
        <li class="breadcrumb-item active">Ver Cita</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Información de la Cita</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>ID:</strong></td>
                                <td>{{ $cita->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Cliente:</strong></td>
                                <td>{{ $cita->clienteUser->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Barbero:</strong></td>
                                <td>{{ $cita->barberoUser->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Fecha y Hora:</strong></td>
                                <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Estado:</strong></td>
                                <td>
                                    @switch($cita->estado)
                                        @case(1)
                                            <span class="badge bg-warning">Pendiente</span>
                                            @break
                                        @case(2)
                                            <span class="badge bg-info">Confirmada</span>
                                            @break
                                        @case(3)
                                            <span class="badge bg-success">Completada</span>
                                            @break
                                        @case(4)
                                            <span class="badge bg-danger">Cancelada</span>
                                            @break
                                        @default
                                            <span class="badge bg-secondary">Desconocido</span>
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Observaciones:</strong></td>
                                <td>{{ $cita->observaciones ?? 'Sin observaciones' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Creado:</strong></td>
                                <td>{{ \Carbon\Carbon::parse($cita->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Actualizado:</strong></td>
                                <td>{{ \Carbon\Carbon::parse($cita->updated_at)->format('d/m/Y H:i') }}</td>
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
                            <a href="{{ route('cita.edit', $cita) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar Cita
                            </a>
                            <a href="{{ route('cita.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver a la Lista
                            </a>
                            <form action="{{ route('cita.destroy', $cita) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('¿Estás seguro de que quieres eliminar esta cita?')">
                                    <i class="fas fa-trash"></i> Eliminar Cita
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
