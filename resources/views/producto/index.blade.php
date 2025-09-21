@extends('template')

@section('title', 'Productos')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Productos</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Productos</li>
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
         <a href="{{ route('producto.create') }}">
             <button type="button" class="btn btn-primary">Añadir nuevo producto</button>
         </a>
     </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista de Productos
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Presentación</th>
                        <th>Stock</th>
                        <th>Fecha Vencimiento</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->code }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->marca->caracteristica->nombre ?? 'N/A' }}</td>
                            <td>{{ $producto->presentacion->caracteristica->nombre ?? 'N/A' }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->fecha_vencimiento ? \Carbon\Carbon::parse($producto->fecha_vencimiento)->format('d/m/Y') : 'N/A' }}</td>
                            <td>
                                @if($producto->img_path)
                                    <img src="{{ asset('storage/' . $producto->img_path) }}" alt="{{ $producto->nombre }}" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <span class="text-muted">Sin imagen</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="{{route('producto.edit', $producto)}}" class="btn btn-warning">editar</a> 
                                    
                                    <form action="{{ route('producto.destroy', $producto) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">eliminar</button>
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