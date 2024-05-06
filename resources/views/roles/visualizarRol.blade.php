@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Roles</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <div class="text-center">
                    <form action="{{ route('roles.store') }}" method="POST" class="form-inline">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" id="NombreNuevoRol" name="NombreNuevoRol" placeholder="Nombre del Nuevo Rol" style="width: 300px;">
                            <input type="number" id="Npermisos" name="Npermisos" min="1" max="5" class="form-control ml-2" style="width: 100px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-plus"></i> Agregar Rol
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
                    <th>Nombre</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                    <tr>
                        <td class="text-center">{{ $rol->id }}</td>
                        <td class="text-center">{{ $rol->name }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" style="display: inline-block;">
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