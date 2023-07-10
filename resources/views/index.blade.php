@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h3>Listado de empleados</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <!-- Botón de agregar centrado -->
                <a href="/empleado/create">
                    <button class="btn btn-primary btn-block" type="button">
                        <i class="fas fa-plus"></i> Agregar Empleado
                    </button>
                </a>
            </div>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RPE</th>
                    <th>Nombre</th>
                    <th>Fecha de ingreso</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                // Obtener todos los empleados de la tabla "empleados"
                $empleados = \App\Models\Empleado::all();

                // Verificar si hay empleados
                if ($empleados->count() > 0) {
                // Iterar sobre los empleados y generar las filas de la tabla
                foreach ($empleados as $empleado) {
                echo '<tr>';
                echo '<td class="text-center">' . $empleado->id . '</td>';
                echo '<td class="text-center">' . $empleado->RPE_Empleado . '</td>';
                echo '<td class="text-center">' . $empleado->nombre_Empleado . '</td>';
                echo '<td class="text-center">' . $empleado->fecha_ingreso . '</td>';
                echo '<td class="text-center">';
                echo '<div class="btn-group">';
                echo '<a href="/empleado/' . $empleado->id . '" type="button" class="btn btn-primary btn-sm">';
                echo '<i class="fas fa-eye"></i> Ver perfil';
                echo '</a>';
                echo '<form action="/empleado/' . $empleado->id . '" method="POST" style="display: inline-block;">';
                echo '<input type="hidden" name="_method" value="DELETE">';
                echo '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                echo '<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este empleado?\')">';
                echo '<i class="fas fa-trash"></i> Eliminar';
                echo '</button>';
                echo '</form>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
                }
                } else {
                echo '<tr><td colspan="5" class="text-center">No se encontraron empleados.</td></tr>';
                }
                @endphp
            </tbody>
        </table>
        <br><br><br>
    </div>
</div>
@endsection
