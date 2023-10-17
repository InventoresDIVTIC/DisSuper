@extends('layouts.nav')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Contratos<h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <!-- Botón de agregar centrado -->
                <div class="text-center">
                    <form action="{{ route('contratos.store') }}" method="POST" class="form-inline">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" id="nombreNuevoContrato" name="nombreNuevoContrato" placeholder="Nombre del Nuevo Contrato" style="width: 500px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-plus"></i> Agregar contrato
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
            @foreach ($contratos as $contrato)
                <tr>
                    <td class="text-center">{{ $contrato->id }}</td>
                    <td class="text-center">{{ $contrato->name }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <form action="{{ route('contratos.destroy', $contrato->id) }}" method="POST" style="display: inline-block;">
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