
@extends('layouts.nav')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Jefaturas</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        
        <div class="row">
            <div class="col-md-12">
                
                <br>
                
          
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>R.P.E. ó R.T.T.</th>
                            <th>Nombre</th>
                            <th>Clave de puesto</th>
                            <th>Correo Electronico</th>
                            <th>Fecha de ingreso</th>
                            <th>Contrato</th>
                            <th>Modalidad</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($jefaturas as $usuario)
                    <tr>
                        <td>{{ $usuario->RPE_Empleado }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>por ahora no</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->fecha_registro }}</td>
                        <td>{{ $usuario->contrato->name }}</td>
                        <td>pendiente</td>
                    </tr>
                @endforeach
            </tbody>
                </table>
            </div>

        
        </div>
    </div>
</div>

@endsection
   