@extends('template')

@section('title', 'Usuarios')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Usuarios</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Usuarios</li>
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
        <a href="{{ route('usuario.create') }}">
            <button type="button" class="btn btn-primary">Añadir nuevo usuario</button>
        </a>
    </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            Lista de Usuarios
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
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
                            <td>{{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('usuario.show', $usuario) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('usuario.edit', $usuario) }}" class="btn btn-warning btn-sm">Editar</a>
                                    @if($usuario->id !== auth()->id())
                                        <form action="{{ route('usuario.destroy', $usuario) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                                        </form>
                                    @else
                                        <button class="btn btn-secondary btn-sm" disabled title="No puedes eliminar tu propio usuario">Eliminar</button>
                                    @endif
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
