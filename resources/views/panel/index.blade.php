@extends('template')

@section('title', 'Panel de Administración')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Panel de Administración</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Bienvenido, {{ Auth::user()->name }}</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Estadísticas principales -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="h4 mb-0">{{ $stats['total_usuarios'] }}</div>
                            <div>Total Usuarios</div>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('usuario.index') }}">Ver Detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="h4 mb-0">{{ $stats['total_productos'] }}</div>
                            <div>Total Productos</div>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-boxes-stacked fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('producto.index') }}">Ver Detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="h4 mb-0">{{ $stats['total_citas'] }}</div>
                            <div>Total Citas</div>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-calendar-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cita.index') }}">Ver Detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="h4 mb-0">{{ $stats['citas_pendientes'] }}</div>
                            <div>Citas Pendientes</div>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cita.index') }}">Ver Detalles</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas detalladas -->
    <div class="row">
        <!-- Usuarios por rol -->
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-users me-1"></i>
                    Usuarios por Rol
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="border rounded p-3">
                                <div class="h3 text-danger">{{ $stats['usuarios_admin'] }}</div>
                                <div class="text-muted">Administradores</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded p-3">
                                <div class="h3 text-warning">{{ $stats['usuarios_barberos'] }}</div>
                                <div class="text-muted">Barberos</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded p-3">
                                <div class="h3 text-info">{{ $stats['usuarios_clientes'] }}</div>
                                <div class="text-muted">Clientes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estado de citas -->
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-calendar-check me-1"></i>
                    Estado de Citas
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <div class="border rounded p-2">
                                <div class="h4 text-warning">{{ $stats['citas_pendientes'] }}</div>
                                <div class="small text-muted">Pendientes</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border rounded p-2">
                                <div class="h4 text-primary">{{ $stats['citas_confirmadas'] }}</div>
                                <div class="small text-muted">Confirmadas</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border rounded p-2">
                                <div class="h4 text-success">{{ $stats['citas_completadas'] }}</div>
                                <div class="small text-muted">Completadas</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border rounded p-2">
                                <div class="h4 text-danger">{{ $stats['citas_canceladas'] }}</div>
                                <div class="small text-muted">Canceladas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <!-- Scripts opcionales para futuras funcionalidades -->
@endpush
