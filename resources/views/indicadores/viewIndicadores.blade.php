@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Indicadores</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="10%">Clave</th>
                    <th width="50%">Nombre</th>
                    <th width="10%">Valor Aceptable</th>
                    <th width="10%">ID Funcion</th>

                    <th class="text-center" width="20%">Opciones</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <br><br><br>
    </div>
</div>
@endsection
