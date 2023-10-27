@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Funciones de Puestos</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <!-- Botón de agregar centrado -->
                <a href="/addFunciones">
                    <button class="btn btn-primary btn-block" type="button">
                        <i class="fas fa-plus"></i> Agregar Funciones
                    </button>
                </a>
            </div>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Tipo de Funcion</th>

                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <br><br><br>
    </div>
</div>
@endsection
