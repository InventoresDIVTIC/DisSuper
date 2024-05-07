@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Indicadores: {{ $actividades->name }}</h3> <!-- Aquí se agrega el nombre de la actividad -->
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <label for="indicador" class="text-center">Elige un nuevo indicador:</label>
                <form action="{{ route('actividades.update', $actividades->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group text-center">
                        <div class="input-group">
                            <select name="indicador" id="indicador" class="form-control">
                                <option value="" disabled selected>Selecciona un indicador</option>
                                @foreach ($indicadores as $indicador)
                                    <option value="{{ $indicador->id }}">{{ $indicador->Nombre_Indicador }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-plus"></i> Agregar Indicador
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if(session('error'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        
        <br>
        <br>
        <table id="tablContratos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Clave de actividad</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indicadoresAsociados as $indicador)
                    <tr>
                        <td>{{ $indicador->id }}</td>
                        <td>{{ $indicador->Clave_Indicador }}</td>
                        <td>{{ $indicador->Nombre_Indicador }}</td>
                        <td class="text-center">
                            <form action="{{ route('actividades.eliminarIndicador', ['actividad' => $actividades->id, 'indicador' => $indicador->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta relación?')">Eliminar Relación</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br><br><br>
    </div>
</div>
@endsection
