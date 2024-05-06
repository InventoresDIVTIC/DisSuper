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


            <div class="tab-pane" id="Subir_Doc">

            <form action="{{ route('guardar_edicion', ['id' => $documento->id]) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="text-primary col-md-12">
                        <!-- Encabezado del formulario -->
                        <label class="col-sm-12 text-center"><h3>Subir Documento</h3></label>
                    </div>
                </div>
                
                <input type="hidden" class="form-control" id="Fecha_Actividad" name="Fecha_Actividad" placeholder="Fecha" value="{{ $documento->Fecha_Actividad }}">
                

                <div class="form-group row">
                <label class="col-sm-1.8 col-form-label">Tipo de Documento: </label>
                <div class="col-sm-3">
                    

                        <!-- Mostrar opciones para Rendición de Cuentas -->
                        <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" placeholder="Tipo de Documento">
                            <option value="RENDICION DE CUENTAS" {{ old('Tipo_Documento', $documento->Tipo_Documento) == 'RENDICION DE CUENTAS' ? 'selected' : '' }}>
                                RENDICION DE CUENTAS
                            </option>
                            <!-- Opción para Llamada de Atención -->
                            <option value="LLAMADA DE ATENCION" {{ old('Tipo_Documento', $documento->Tipo_Documento) == 'LLAMADA DE ATENCION' ? 'selected' : '' }}>
                                LLAMADA DE ATENCION
                            </option>
                            <!-- Opción para Acta Administrativa -->
                            <option value="ACTA ADMINISTRATIVA" {{ old('Tipo_Documento', $documento->Tipo_Documento) == 'ACTA ADMINISTRATIVA' ? 'selected' : '' }}>
                                ACTA ADMINISTRATIVA
                            </option>
                        </select>
                    
                </div>

                    <label class="col-sm-1.8 col-form-label">Encargado de Revisión: </label>
                    <div class="col-sm-3">
                    <select class="form-control" id="Id_Usuario_Revisar" placeholder="Encargado de Revisión" name="Id_Usuario_Revisar">
                            @foreach($usuarios as $index => $usuario)
                                @if($usuario->id !== auth()->user()->id && $usuario->id !== 1 && $usuario->RPE_Empleado !== $empleado->RPE_Empleado)
                                    <option value="{{ $usuario->id }}" {{ old('Id_Usuario_Revisar', $documento->Id_Usuario_Revisar) == $usuario->id ? 'selected' : '' }}>
                                        {{ $usuario->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-1.9 col-form-label">Documento:  </label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="Documento" name="Documento" onchange="mostrarNombreArchivo()">
                            <label class="custom-file-label" for="Documento">Seleccionar archivo...</label>
                        </div>
                        <span id="nombreArchivoSeleccionado"></span>
                    </div>
                </div>
                <script>
                    function mostrarNombreArchivo() {
                        const input = document.getElementById('Documento');
                        const nombreArchivo = input.files[0].name;
                        const label = document.querySelector('.custom-file-label');
                        label.textContent = nombreArchivo;
                        document.getElementById('nombreArchivoSeleccionado').textContent = 'Nombre del archivo: ' + nombreArchivo;
                    }
                </script>
                <input type="hidden" name="Id_Empleado" id="Id_Empleado" value="{{$empleado->id}}">
                <input type="hidden" name="Status_Documento" id="Status_Documento" value="ENVIADO">

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-info">Enviar</button>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const form = document.querySelector('#subirForm'); // Agregar el "#" para seleccionar por ID

                        form.addEventListener('submit', function (event) {
                            const tipoDocumento = document.getElementById('Tipo_Documento').value;
                            const usuarioRevisar = document.getElementById('Id_Usuario_Revisar').value;
                            const documento = document.getElementById('Documento').value; // Obtener el primer archivo seleccionado

                            if (!tipoDocumento || !usuarioRevisar || !documento) {
                                alert('Por favor, completa todos los campos antes de enviar el formulario.');
                                event.preventDefault();
                            }
                        });
                    });
                </script>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
                    
@endsection