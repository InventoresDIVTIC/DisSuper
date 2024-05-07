@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Funciones de Puestos: {{ $puestos->nombre }}</h3> <!-- Aquí se agrega el nombre del puesto -->
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
            <div class="col-md-6 offset-md-3 text-center">
            <form action="{{ route('puestos.update', $puestos->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <select name="actividad" id="actividad" class="form-control">
                        <option value="" disabled selected>Elige una nueva función</option>
                        @foreach ($actividad as $actividades)
                            <option value="{{ $actividades->id }}">{{ $actividades->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-plus"></i> Agregar Función
                        </button>
                    </div>
                </div>
            </form>
            </div>
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
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($actividadesAsociadas as $actividad)
                    <tr>
                        <td>{{ $actividad->clave }}</td>
                        <td>{{ $actividad->name }}</td>
                        <td class="text-center">
                            <form action="{{ route('puestos.detach', ['puesto' => $puestos->id, 'actividad' => $actividad->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">Eliminar Relación</button>
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
