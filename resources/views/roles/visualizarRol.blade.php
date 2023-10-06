@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Roles<h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <!-- Botón de agregar centrado -->
                <div class="input-group">
                    <input class="form-control" id="nombreNuevoRol" placeholder="Nombre del Nuevo Rol">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-block" type="button">
                            <i class="fas fa-plus"></i> Agregar Nuevo Rol
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <br>

        <div class="d-flex justify-content-end">
            <div class="input-group input-group-sm text-right" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <br>

        <table id="tablaRoles" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Rol</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="text-center">ID ROL</td>
                        <td class="text-center">NOMBRE ROL</td> <!-- Mostrar el tipo de contrato -->
                        <td class="text-center">
                            <div class="btn-group">
                                <form action="" method="POST" style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
        <br><br><br>
    </div>
</div>
@endsection