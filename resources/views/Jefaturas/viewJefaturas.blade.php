
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
            <div class="col-md-12 mx-auto">
                <form id="agregarZonaForm" method="POST" action="{{ route('zonas.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-3 form-group">
                            <label for="nombre_jefatura">Nombre de la Jefatura:</label>
                            <input type="text" class="form-control" id="nombre_jefatura" name="nombre_jefatura" placeholder="Nombre de la Jefatura">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="Encargado">Encargado:</label>
                            <select class="form-control" id="Encargado" name="Encargado">
                                    <option value=""></option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="Modalidad">Modalidad:</label>
                            <input type="text" class="form-control" id="modalidad_jefatura" name="modalidad_jefatura" placeholder="Modalidad">
                        </div>
                        <div class="col-md-3 ">
                            <br> 
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-plus"></i> Agregar Jefatura
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <br>
                
          
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Encargado</th>
                            <td>Modalidad</td>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>id</td>
                            <td>nombre</td>
                            <td>encargado</td>
                            <td>Modalidad</td>
                            <td class="text-center">
                            <form action="" method="POST" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta Jefatura?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                                <a href="/zonas/edit">
                                <button class="btn btn-info btn-sm" type="submit">
                                    <i class="fas"></i> Modificar
                                </button>
                                </a>
                            </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        
        </div>
    </div>
</div>

@endsection
   