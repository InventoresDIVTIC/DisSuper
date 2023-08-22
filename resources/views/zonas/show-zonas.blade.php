
@extends('layouts.nav')
@section('content')
  <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Zonas</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
              <div class="col-md-6 offset-md-12 text-center">
                <!-- Botón de agregar centrado -->
                <button class="btn btn-primary btn-block" type="button">
                    <i class="fas fa-plus"></i> Agregar Zona
                </button>
              </div>
            </div>
            <br>
        </div>
        <div class="row">
        <table id="view-zonas" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Encargado</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                <td>1</td>
               </tr>
            </tbody>
        </table>
        </div>
        <br><br><br>
    </div>
  </div>
@endsection
   