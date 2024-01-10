@extends('layouts.nav')
  @section('content')
    <div class="tab-pane" id="GenerarLlA">
            <form action="{{ route('guardar_edicion', ['id' => $documento->id]) }}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <div class="text-primary col-md-12">
                                <!-- Encabezado del formulario -->
                                <label class="col-sm-12 text-center"><h3>Generar Llamada de Atención</h3></label>
                            </div>
                        </div>
                    
                      

                        <!-- Campos del primer indicador -->
                        <div class="form-group row">
                            <label class="col-sm-1.8 col-form-label">N. Llamada</label>
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
                            <label for="inputCargo" class="col-sm-12 col-form-label">Introducción</label>
                            <div class="col-sm-12">
                                <textarea class="form-control"id="Introduccion"name="Introduccion" rows="3" placeholder="Explique de manera general el motivo de la Rendición de Cuentas">{{ $documento->Introduccion }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCargo" class="col-sm-12 col-form-label">Explicación</label>
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
                    
@endsection