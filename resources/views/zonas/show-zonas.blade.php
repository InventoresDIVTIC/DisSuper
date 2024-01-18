
@extends('layouts.nav')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Zonas</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form id="agregarZonaForm" method="POST" action="{{ route('zonas.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="nombre_zona">Nombre de la Zona:</label>
                            <input type="text" class="form-control" id="nombre_zona" name="nombre_zona" placeholder="Nombre de la Zona">
                        </div><br>
                        @if ($errors->has('nombre_zona'))
                            <span class="error-message">{{ $errors->first('nombre_zona') }}</span>
                        @endif
                        <div class="col-md-6 form-group">
                            <label for="Encargado">Encargado:</label>
                            <select class="form-control" id="Encargado" name="Encargado">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('Encargado'))
                            <span class="error-message">{{ $errors->first('Encargado') }}</span>
                        @endif
                    </div>
                    <div class="col-12"> <!-- Aquí agregamos la clase col-12 -->
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-plus"></i> Agregar Zona
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <br>
                
          
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Encargado</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zonas as $zona)
                        <tr>
                            <td>{{ $zona->id }}</td>
                            <td>{{ $zona->nombre_zona }}</td>
                            <td>{{ $zona->encargado ? $zona->encargado->name : 'Sin encargado' }}</td>
                            <td class="text-center">
                            <form action="{{ route('zonas.destroy', $zona->id) }}" method="POST" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta zona?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                            
                            <form action="{{ route('zonas.edit', $zona->id) }}" method="GET" style="display: inline-block;">
                                <button class="btn btn-info btn-sm" type="submit">
                                    <i class="fas"></i> Modificar
                                </button>
                                </a>
                            </form>
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        
        </div>
    </div>
</div>

<div class="modal" id="modificar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 text-center text-info">
                            <h3>Modificar Zona</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
   