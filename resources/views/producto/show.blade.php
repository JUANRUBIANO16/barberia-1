@extends('template')

@section('title', 'Ver Producto')

@section('content')
    <h1 class="mt-4 px-5">Detalles del Producto</h1>
    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('producto.index') }}">Productos</a>
        </li>
        <li class="breadcrumb-item active">Ver Producto</li>
    </ol>

    <div class="container w-100 border-3 border primary rounded p-4 mt-3">
        <div class="row">
            <div class="col-md-6">
                <h5>Información Básica</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Código:</th>
                        <td>{{ $producto->code }}</td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td>{{ $producto->nombre }}</td>
                    </tr>
                    <tr>
                        <th>Stock:</th>
                        <td>{{ $producto->stock }}</td>
                    </tr>
                    <tr>
                        <th>Descripción:</th>
                        <td>{{ $producto->descripcion ?? 'Sin descripción' }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Vencimiento:</th>
                        <td>{{ $producto->fecha_vencimiento ? $producto->fecha_vencimiento->format('d/m/Y') : 'No especificada' }}</td>
                    </tr>
                </table>
            </div>
            
            <div class="col-md-6">
                <h5>Clasificación</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Categoría:</th>
                        <td>{{ $producto->categoria->caracteristica->nombre ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Marca:</th>
                        <td>{{ $producto->marca->caracteristica->nombre ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Presentación:</th>
                        <td>{{ $producto->presentacion->caracteristica->nombre ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Característica:</th>
                        <td>{{ $producto->caracteristica->nombre ?? 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('producto.edit', $producto) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('producto.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection

