
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
            <div class="col-md-4">
                <input class="form-control" id="nombreNuevoContrato" placeholder="Nombre del Nuevo Contrato">
            </div>

            <div class="col-md-4">
                <div class="form-group" data-select2-id="29">
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" data-select2-id="3">Alabama</option>
                    <option data-select2-id="35">Alaska</option>
                    <option data-select2-id="36">California</option>
                    <option data-select2-id="37">Delaware</option>
                    <option data-select2-id="38">Tennessee</option>
                    <option data-select2-id="39">Texas</option>
                    <option data-select2-id="40">Washington</option>
                    </select>
                    
                </div>
            </div>
            
            <div class="col-md-2">
            <button class="btn btn-primary btn-block" type="button">
                <i class="fas fa-plus"></i> Agregar Zona
            </button>
            </div>

                

            <br><br><br>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                
                <table id="tablaZonas" class="table table-bordered table-striped">
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
                        <td>Juan</td>
                        <td>Alberto</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        
        </div>
    </div>
  </div>
@endsection
   