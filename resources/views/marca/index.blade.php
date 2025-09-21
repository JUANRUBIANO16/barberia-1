@extends('template')

@section('title', 'Marca')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <h1 class="mt-4 px-5">Marcas</h1>

    <ol class="breadcrumb mb-4 px-5">
        <li class="breadcrumb-item active">
            <a href="{{ route('panel') }}">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Marcas</li>
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
         <a href="{{ route('marca.create') }}">
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
                    @foreach($marcas as $marca)
                        <tr>
                            <td>{{ $marca->caracteristica->nombre }}</td>
                            <td>{{ $marca->caracteristica->descripcion }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="{{route('marca.edit', $marca)}}" class="btn btn-warning">editar</a> 
                                    
                                    <form action="{{ route('marca.destroy', $marca) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta marca?')">eliminar</button>
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
