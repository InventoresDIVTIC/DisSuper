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
                    <th>Tipo de contrato</th>
                    <th>Zona</th>
                    <th>Fecha de ingreso</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($empleados as $empleado)
                    <tr>
                        <td class="text-center">{{ $empleado->id }}</td>
                        <td class="text-center">{{ $empleado->RPE_Empleado }}</td>
                        <td class="text-center">{{ $empleado->nombre_Empleado }}</td>
                        <td class="text-center">{{ $empleado->contrato->name }}</td> <!-- Mostrar el tipo de contrato -->
                        <td class="text-center">
                            @foreach ($empleado->zonas as $zona)
                                {{ $zona->nombre_zona }}
                            @endforeach
                        </td>
                        <td class="text-center">{{ $empleado->fecha_ingreso }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="/empleado/{{ $empleado->id }}" type="button" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Ver perfil
                                </a>
                                <form action="/empleado/{{ $empleado->id }}" method="POST" style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron empleados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        <div style="text-align: center; font-size: 28px; font-weight: bold; color: #0CA7EB; padding: 10px;">
            Listado de empleados sin asociar a usuarios
        </div>
        <table id="example1" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RPE</th>
                    <th>Nombre</th>
                    <th>Tipo de contrato</th>
                    <th>Zona</th>
                    <th>Fecha de ingreso</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($empleadosSinUsuario as $empleado)
                    <tr>
                        <td class="text-center">{{ $empleado->id }}</td>
                        <td class="text-center">{{ $empleado->RPE_Empleado }}</td>
                        <td class="text-center">{{ $empleado->nombre_Empleado }}</td>
                        <td class="text-center">
                            @if ($empleado->contrato)
                                {{ $empleado->contrato->name }}
                            @else
                                Sin contrato
                            @endif
                        </td>
                        <td class="text-center">
                            @foreach ($empleado->zonas as $zona)
                                {{ $zona->nombre_zona }}
                            @endforeach
                        </td>
                        <td class="text-center">{{ $empleado->fecha_ingreso }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="/empleado/{{ $empleado->id }}" type="button" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Ver perfil
                                </a>
                                <form action="/empleado/{{ $empleado->id }}" method="POST" style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron empleados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <br><br><br>
    </div>
</div>
@endsection