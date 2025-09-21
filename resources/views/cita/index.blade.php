@extends('template')

@section('title', 'Citas')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Citas</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Citas</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-4 px-5">
        <a href="{{ route('cita.create') }}">
            <button type="button" class="btn btn-primary">Añadir nueva cita</button>
        </a>
    </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-calendar-alt me-1"></i>
            Lista de Citas
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Barbero</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($citas as $cita)
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->clienteUser->name ?? 'N/A' }}</td>
                            <td>{{ $cita->barberoUser->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y H:i') }}</td>
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
                            <td>{{ Str::limit($cita->observaciones, 50) ?? 'Sin observaciones' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('cita.show', $cita) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('cita.edit', $cita) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('cita.destroy', $cita) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta cita?')">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/datatables-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
@endpush
