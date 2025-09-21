@extends('template')

@section('title', 'Categoria')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Categorias</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Categorias</li>
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
         <a href="{{ route('categoria.create') }}">
             <button type="button" class="btn btn-primary">Añadir nuevo registro</button>
         </a>
     </div>

    <div class="card px-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->caracteristica->nombre }}</td>
                            <td>{{ $categoria->caracteristica->descripcion }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="{{route('categoria.edit', $categoria)}}" class="btn btn-warning">editar</a> 
                                    
                                    <form action="{{ route('categoria.destroy', $categoria) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?')">eliminar</button>
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
