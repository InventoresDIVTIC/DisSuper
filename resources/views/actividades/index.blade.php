@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Actividades</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <!-- Botón de agregar centrado -->
                <div class="text-center">
                <form action="{{ route('actividades.store') }}" method="POST" class="form-inline">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" id="clave_actividad" name="clave_actividad"  placeholder="Clave de la actividad" style="width: 35%;">
                        <input class="form-control" id="nombre_actividad" name="nombre_actividad" placeholder="Nombre de la nueva actividad" style="width: 25%;">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-plus"></i> Agregar Actividad
                            </button>
                        </div>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
        <br>


        
        <br>
        <table id="tablContratos" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Clave de actividad</th>
                <th>Nombre</th>
                <th class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades as $actividad)
                <tr>
                    <td class="text-center">{{ $actividad->id }}</td>
                    <td class="text-center">{{ $actividad->clave }}</td>
                    <td class="text-center">{{ $actividad->name }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                        <a href="{{ route('actividades.show', $actividad->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Ver Indicadores
                        </a>
                            <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este contrato?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <br><br><br>
    </div>
</div>
@endsection
