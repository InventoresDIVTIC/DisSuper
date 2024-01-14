@extends('layouts.nav')
@section('content')
<div class="row">
<div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                    src="../../dist/img/D.png"
                    alt="User profile picture">
                
            </div>

            <h3 class="profile-username text-center">Nombre: {{ $empleado->nombre_Empleado }}</h3>
            <p class="text-muted text-center">RPE:{{ $empleado->RPE_Empleado }}
            
            </p>
            <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Zona de Trabajo: </b>
                @if ($empleado->zonas->count() > 0)
                                @foreach ($empleado->zonas as $zona)
                                    {{ $zona->nombre_zona }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            @else
                                Sin zona asignada
                            @endif
            </li>
            <li class="list-group-item">
                <b>Encargado de la Zona: </b> 
                @if ($empleado->zonas->count() > 0 && $empleado->zonas->first()->encargado)
                                {{ $empleado->zonas->first()->encargado->name }}
                            @else
                                Sin encargado asignado
                            @endif
            </li>
            <li class="list-group-item">
            <b>Fecha de Ingreso: {{ $empleado->fecha_ingreso }}</b>
            </li>
            </ul>
        </div>
      <!-- /.card-body -->
    </div>
</div>


<div class="col-md-9">
    <div class="card card-primary card-outline">
        <div class="row">
            <div class="col-md-1">
            </div>


            <div class="col-md-10" >

                <form action="{{ route('guardar_edicion', ['id' => $documento->id]) }}" method="POST">
                @csrf
                    <div class="form-group row">
                        <div class="text-primary col-md-12">
                            <!-- Encabezado del formulario -->
                            <label class="col-sm-12 text-center"><h3><br>Generar Documento</h3></label>
                        </div>
                    </div>
                
                    
                    <div class="form-group row">
                        <label class="col-sm-1.8 col-form-label">N. Documento</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="N_Llamada" name="N_Llamada" placeholder="N. llamada" value="{{ $documento->N_Llamada }}">
                        </div>

                        <label class="col-sm-1.5 col-form-label">Actividad</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="Actividad" name="Actividad" placeholder="Actividad"value="{{ $documento->Actividad }}">
                        </div>

                        <label class="col-sm-1.5 col-form-label">Fecha</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="Fecha_Actividad" name="Fecha_Actividad" placeholder="Fecha" value="{{ $documento->Fecha_Actividad }}">
                        </div>
                    </div>


                    <input type="hidden" name="Id_Empleado" id="Id_Empleado" value="{{$empleado->id}}">
                    <input type="hidden" name="Tipo_Documento" id="Tipo_Documento" value="LLAMADA DE ATENCION"value="{{ $documento->Tipo_Documento }}">
                    <input type="hidden" name="Status_Documento" id="Status_Documento" value="ENVIADO" >
                    
                    <!-- Introducción del primer indicador -->
                    
                    <div class="form-group row">
                        <label for="inputCargo" class="col-sm-10 col-form-label">Introducción</label>
                        
                        <div class="col-sm-10 text-center">
                            <textarea class="form-control"id="Introduccion"name="Introduccion" rows="3" placeholder="Explique de manera general el motivo de la Rendición de Cuentas">{{ $documento->Introduccion }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCargo" class="col-sm-12 col-form-label">Contenido</label>
                        <div class="col-sm-12">
                            <textarea class="form-control"id="contenido"name="contenido" rows="11" placeholder="Explique de manera detallada y especifica el motivo de la Rendición de Cuentas">{{ $documento->contenido }}</textarea>
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <label for="inputCargo" class="col-sm-2 col-form-label">Usuario a mandar a revisión</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                            <select class="form-control" id="Id_Usuario_Revisar" name="Id_Usuario_Revisar">
                                @foreach($usuarios as $usuario)
                                    @if($usuario->id !== auth()->user()->id && $usuario->id !== 1 &&$usuario->RPE_Empleado !== $empleado->RPE_Empleado) 
                                    <option value="{{ $usuario->id }}" @if($usuario->id === $documento->Id_Usuario_Revisar) selected @endif>{{ $usuario->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            
                            <button type="submit" class="btn btn-danger">Guardar cambios</button>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>
</div>
                    
@endsection