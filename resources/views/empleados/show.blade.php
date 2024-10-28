@extends('layouts.nav')
  @section('content')
  <style src="{{asset('dist/css/hallazgosIndicadores.css')}}"></style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
                <div class="col-md-12">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="../../dist/img/logo.png"
                                    alt="User profile picture">
                                    
                                </div>
                                <h3 class="profile-username text-center">Nombre: {{ $empleado->nombre_Empleado }}</h3>
                                <p class="text-muted text-center">RPE:{{ $empleado->RPE_Empleado }}</p>
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
                        </div><!-- /.card-body -->
                </div>
                <!-- Contenido Principal -->
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                            <li class="nav-item" style="width: 25%"><a class="nav-link active text-center" href="#InformacionGeneral" data-toggle="tab">Información General</a></li>
                            <li class="nav-item" style="width: 25%"><a class="nav-link text-center" href="#Documentos" data-toggle="tab">Documentos</a></li>
                            <li class="nav-item" style="width: 25%"><a class="nav-link text-center" href="#ModInfo" data-toggle="tab">Modificar</a></li>
                            </ul>
                        </div>

                    <div class="card-body">
                        <div class="tab-content">
                        {{-- Informacion General --}}
                            <div class="active tab-pane" id="InformacionGeneral">
                                <div class="card-body">
                                    {{-- Contador de Documentos --}}
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">Rendición de Cuentas</span>
                                                    <span class="info-box-number text-center text-muted mb-0">{{ $contadorRendicionCuentas }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">Llamadas de Atención</span>
                                                    <span class="info-box-number text-center text-muted mb-0">{{ $contadorLlamadasAtencion }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">Actas Administrativas</span>
                                                    <span class="info-box-number text-center text-muted mb-0">{{ $contadorActasAdministrativas }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- ROW -->

                                    <div class="row justify-content-center">
                                        <div class="col-sm-12">
                                            <h4 class="text-center">Ultimos Documentos Registrados</h4>

                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th>Id</th>
                                                        <th style="width: 180px">Fecha</th>
                                                        <th>Tipo Documento</th>
                                                        <th>Emitido por</th>
                                                        <th>Eviado a</th> 
                                                        <th>Estado</th>
                                                        <th>Tiempo Restante</th>
                                                        <th></th> 
                                                        <th style="width: 120px"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($documentos as $documento)
                                                        <tr>
                                                            <td>{{ $documento->id }}</td>
                                                            <td>{{ $documento->Fecha_Actividad }}</td>
                                                            <td>{{ $documento->Tipo_Documento }}</td>
                                                            <td>{{ $documento->emisor->name ??'' }}</td>
                                                            <td>{{ $documento->receptor->name ??'' }}</td>
                                                            <td>{{ $documento->Status_Documento }}</td>
                                                            <td id="contador_{{ $documento->id }}"></td>
                                                            <td>
                                                                <form action="{{ route('download.pdf', ['id' => $documento->id]) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary btn-sm btn-block">
                                                                        <i class="fas fa-download"></i> Descargar
                                                                    </button>
                                                                </form>
                                                                @if($documento->subido_hecho === 1 )
                                                                    <button onclick="copiarDatos('{{ $documento->contenido }}', '{{ $documento->Introduccion }}')" class="btn btn-danger btn-sm btn-block">
                                                                        <i class="fas fa-copy"></i> Copiar
                                                                    </button>
                                                                @endif
                                                            </td>
                                                            
                                                        

                                                            <td>
                                                                @if($documento->Status_Documento !== 'ACEPTADO' && $documento->Status_Documento !== 'CANCELADO' && Auth::id() === $documento->Id_Usuario_Revisar && $documento->Status_Documento !== 'EN EDICION')
                                                                    <form action="{{ route('cambiar.estado', ['id' => $documento->id]) }}" method="POST">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-success btn-sm">
                                                                            <i class="fas fa-check"></i> Aceptar
                                                                        </button>
                                                                    </form>
                                                                @elseif($documento->Status_Documento === 'ACEPTADO' && Auth::id() === $documento->Id_Usuario_Revisar)
                                                                    <!-- Si el documento ya está aceptado, mostrar un mensaje o simplemente un texto -->
                                                                    <span><i class="fas fa-check-circle"></i> Documento aceptado</span>
                                                                @else
                                                                    <!-- Otro mensaje si el usuario no es el destinatario -->
                                                                @endif

                                                                @if($documento->Status_Documento === 'CANCELADO' && (Auth::id() === $documento->Id_Usuario_Autor || Auth::id() === $documento->Id_Usuario_Revisar))
                                                                    <!-- Botón para ver el comentario cancelado -->
                                                                    <button class="btn btn-info btn-sm" onclick="verComentarioCancelado('{{ $documento->comentario_cancelado }}')">
                                                                        <i class="fas fa-comment"></i> Ver comentario
                                                                    </button>

                                                                    <!-- Script para mostrar el comentario cancelado en una alerta -->
                                                                    <script>
                                                                        function verComentarioCancelado(comentario) {
                                                                            // Muestra una alerta con el comentario cancelado
                                                                            alert("Comentario Cancelado: " + comentario);
                                                                        }
                                                                    </script>
                                                                @endif

                                                                @if($documento->Status_Documento !== 'EN EDICION' && $documento->Status_Documento !== 'CANCELADO' && Auth::id() === $documento->Id_Usuario_Revisar && $documento->Status_Documento !== 'ACEPTADO' )
                                                                    <form id="formRechazarDocumento_{{ $documento->id }}" action="{{ route('rechazar.documento', ['id' => $documento->id]) }}" method="POST" onsubmit="return validarRechazoFormulario('{{ $documento->id }}')">
                                                                        @csrf
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="toggleComentario('{{ $documento->id }}')">
                                                                            <i class="fas fa-times"></i> Rechazar
                                                                        </button>
                                                                        <div id="comentarioContainer_{{ $documento->id }}" style="display: none;">
                                                                            <label for="comentarioRechazo_{{ $documento->id }}">Comentario de rechazo:</label>
                                                                            <textarea name="comentarioRechazo" placeholder="Escriba aquí el motivo por el que está rechazando el documento" id="comentarioRechazo_{{ $documento->id }}" rows="4" cols="50" required></textarea>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-danger btn-sm" id="btnRechazar_{{ $documento->id }}" style="display: none;">
                                                                            <i class="fas fa-times"></i> Confirmar Rechazo
                                                                        </button>
                                                                    </form>
                                                                @elseif($documento->Status_Documento === 'EN EDICION' && Auth::id() === $documento->Id_Usuario_Revisar)
                                                                    <!-- Si el documento ya está en edición, mostrar un mensaje o simplemente un texto -->
                                                                    <span><i class="fas fa-edit"></i> Documento enviado a revisión</span>
                                                                @else
                                                                    <!-- Otro mensaje si el usuario no es el destinatario -->
                                                                @endif

                                                                <script>
                                                                    function toggleComentario(documentoId) {
                                                                        var comentarioContainer = document.getElementById('comentarioContainer_' + documentoId);
                                                                        var btnRechazar = document.getElementById('btnRechazar_' + documentoId);

                                                                        if (comentarioContainer.style.display === 'none') {
                                                                            // Ocultar contenedores de comentario y botones de rechazo en todas las filas
                                                                            ocultarTodosComentarios();

                                                                            // Mostrar contenedor de comentario y botón de rechazo solo para la fila específica
                                                                            comentarioContainer.style.display = 'block';
                                                                            btnRechazar.style.display = 'inline';
                                                                        } else {
                                                                            // Ocultar contenedor de comentario y botón de rechazo
                                                                            comentarioContainer.style.display = 'none';
                                                                            btnRechazar.style.display = 'none';
                                                                        }
                                                                    }

                                                                    function ocultarTodosComentarios() {
                                                                        // Ocultar contenedores de comentario y botones de rechazo en todas las filas
                                                                        var comentarioContainers = document.querySelectorAll('[id^="comentarioContainer_"]');
                                                                        var btnRechazars = document.querySelectorAll('[id^="btnRechazar_"]');

                                                                        comentarioContainers.forEach(function(container) {
                                                                            container.style.display = 'none';
                                                                        });

                                                                        btnRechazars.forEach(function(btn) {
                                                                            btn.style.display = 'none';
                                                                        });
                                                                    }

                                                                    function validarRechazoFormulario(documentoId) {
                                                                        // Validar que el campo de comentario no esté vacío
                                                                        var comentarioRechazo = document.getElementById('comentarioRechazo_' + documentoId).value;
                                                                        if (comentarioRechazo.trim() === "") {
                                                                            alert('Debes escribir un comentario para rechazar el documento.');
                                                                            return false;
                                                                        }

                                                                        return true;
                                                                    }
                                                                </script>
                                                                @if($documento->Status_Documento === 'ACEPTADO' && Auth::id() === $documento->Id_Usuario_Autor)
                                                                    <form id="formArchivo_{{ $documento->id }}" action="{{ route('documento.cambiar-archivo', $documento->id) }}" method="post" enctype="multipart/form-data">
                                                                        @csrf

                                                                        <!-- Botón para mostrar el input -->
                                                                        <button type="button" class="btn btn-primary" onclick="mostrarInput('{{ $documento->id }}')">Terminar</button>

                                                                        <!-- Campo del nuevo archivo (inicialmente oculto) -->
                                                                        <input type="file" name="nuevo_archivo" id="nuevo_archivo_{{ $documento->id }}" accept=".pdf, .doc, .docx" style="display: none;" required>

                                                                        <!-- Botón para enviar el formulario -->
                                                                        <button type="button" class="btn btn-success" onclick="enviarFormulario('{{ $documento->id }}')" style="display: none;">Enviar</button>

                                                                        <!-- Botón para cerrar el input -->
                                                                        <button type="button" class="btn btn-danger" onclick="cerrarInput('{{ $documento->id }}')" style="display: none;">X</button>
                                                                    </form>

                                                                    <script>
                                                                        function mostrarInput(documentoId) {
                                                                            var input = document.getElementById('nuevo_archivo_' + documentoId);
                                                                            var botonEnviar = document.querySelector('#formArchivo_' + documentoId + ' button.btn-success');
                                                                            var botonCerrar = document.querySelector('#formArchivo_' + documentoId + ' button.btn-danger');

                                                                            // Cambiar la visibilidad del input y de los botones
                                                                            input.style.display = 'block';
                                                                            botonEnviar.style.display = 'inline';
                                                                            botonCerrar.style.display = 'inline';
                                                                        }

                                                                        function cerrarInput(documentoId) {
                                                                            var input = document.getElementById('nuevo_archivo_' + documentoId);
                                                                            var botonEnviar = document.querySelector('#formArchivo_' + documentoId + ' button.btn-success');
                                                                            var botonCerrar = document.querySelector('#formArchivo_' + documentoId + ' button.btn-danger');

                                                                            // Ocultar el input y los botones
                                                                            input.style.display = 'none';
                                                                            botonEnviar.style.display = 'none';
                                                                            botonCerrar.style.display = 'none';
                                                                        }

                                                                        function enviarFormulario(documentoId) {
                                                                            var input = document.getElementById('nuevo_archivo_' + documentoId);

                                                                            // Verificar si el campo de archivo está vacío
                                                                            if (input.files.length === 0) {
                                                                                alert('Debes seleccionar un archivo antes de enviar.');
                                                                            } else {
                                                                                // Enviar el formulario
                                                                                document.forms['formArchivo_' + documentoId].submit();
                                                                            }
                                                                        }
                                                                    </script>
                                                                @endif
                                                                <!--Fin de boton de terminar de documento -->

                                                                <!--boton de redirigir de documento -->
                                                                <div class="container1">
                                                                    @if($documento->Status_Documento === 'ENVIADO' && Auth::id() === $documento->Id_Usuario_Revisar)
                                                                        <button type="button" class="btn btn-success btn-sm" onclick="mostrarRedireccion('{{ $documento->id }}')">
                                                                            Redirigir
                                                                        </button>

                                                                        <form id="formRedireccion_{{ $documento->id }}" action="{{ route('redirigir.documento', ['id' => $documento->id]) }}" method="POST" style="display: none;">
                                                                            @csrf
                                                                            <label for="nuevoIdUsuario">Seleccionar Usuario:</label>
                                                                            <select class="form-control" id="nuevoIdUsuario_{{ $documento->id }}" name="nuevoIdUsuario" required>
                                                                                @foreach($usuarios as $usuario)
                                                                                    @if($usuario->id !== auth()->user()->id && $usuario->id !== 1 && $usuario->RPE_Empleado !== $empleado->RPE_Empleado) 
                                                                                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                            <button type="submit" class="btn btn-success btn-sm">Confirmar Redirección</button>
                                                                        </form>
                                                                        <a href="javascript:void(0);" onclick="cerrarFormRedireccion('{{ $documento->id }}')" id="btnCerrarRedireccion_{{ $documento->id }}" style="font-size: 20px; color: red; text-decoration: none; display: none;">&times;</a>
                                                                    @endif
                                                                </div>
                                                                <script>
                                                                    function mostrarRedireccion(documentoId) {
                                                                        // Oculta otros formularios de redirección si hay alguno visible
                                                                        document.querySelectorAll('[id^="formRedireccion_"]').forEach(form => form.style.display = 'none');
                                                                        // Muestra el formulario específico
                                                                        document.getElementById('formRedireccion_' + documentoId).style.display = 'block';
                                                                        // Muestra el botón de cerrar
                                                                        document.getElementById('btnCerrarRedireccion_' + documentoId).style.display = 'inline';
                                                                    }

                                                                    function cerrarFormRedireccion(documentoId) {
                                                                        // Oculta el formulario y el botón de cerrar
                                                                        document.getElementById('formRedireccion_' + documentoId).style.display = 'none';
                                                                        document.getElementById('btnCerrarRedireccion_' + documentoId).style.display = 'none';
                                                                    }
                                                                </script>
                                                                <!-- Fin de boton de redirigir de documento -->

                                                                @if($documento->Status_Documento === 'EN EDICION' && Auth::id() === $documento->Id_Usuario_Autor)
                                                                    <!-- Si el documento está en EDICION y el usuario es el autor, mostrar botón de Editar -->
                                                                    <a href="{{ route('editar.documento', ['id' => $documento->id]) }}" class="btn btn-primary btn-sm">
                                                                        <i class="fas fa-edit"></i> Editar
                                                                    </a>
                                                                    <!-- Si el documento está RECHAZADO y el usuario es el autor, mostrar enlace para ver el comentario -->
                                                                    <a href="#" class="btn btn-info btn-sm" onclick="verComentario('{{ $documento->comentario_rechazado }}')">
                                                                        <i class="fas fa-comment"></i> Ver Nota
                                                                    </a>

                                                                    <!-- Script para mostrar el comentario en una alerta al hacer clic en el enlace -->
                                                                    <script>
                                                                        function verComentario(comentario) {
                                                                            // Muestra una alerta con el comentario
                                                                            alert("Comentario: " + comentario);
                                                                        }
                                                                    </script>
                                                                @endif

                                                                <div class="container">
                                                                    @if(Auth::user()->roles[0]['nivel_permisos'] < 1 && $documento->Status_Documento !== 'CANCELADO' &&  $documento->Status_Documento !== 'TERMINADO' )
                                                                        <form id="formCancelarDocumento_{{ $documento->id }}" action="{{ route('cancelar.documento', ['id' => $documento->id]) }}" method="POST" onsubmit="return validarFormulario('{{ $documento->id }}')">
                                                                            @csrf
                                                                            <textarea name="comentario" id="comentario_{{ $documento->id }}" placeholder="Escribe aquí el motivo de la cancelación del documento" rows="4" cols="50" style="display: none;"></textarea>
                                                                            <button type="button" class="btn btn-warning btn-sm" onclick="toggleMotivo('{{ $documento->id }}')">
                                                                            Cancelar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-danger btn-sm" id="btnCancelar_{{ $documento->id }}" style="display: none;">Confirmar Cancelación</button>
                                                                            <button type="button" class="btn btn-secondary btn-sm" onclick="toggleMotivo('{{ $documento->id }}')" style="display: none;">X</button>
                                                                        </form>
                                                                    @endif
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
    function copiarDatos(contenido, introduccion) {
        navigator.clipboard.writeText(contenido + "\n" + introduccion)
            .then(function() {
                alert('Datos copiados.');
            })
            .catch(function(err) {
                console.error('Error al copiar los datos: ', err);
            });
    }
</script>

                            <div class="tab-pane" id="Documentos">
                                <div class="card bg-black color-palette">
                                    <ul class="nav navtabs" id="custom-content-below-tab" role="tablist">
                                        <!--
                                        <li class="nav-item" style="width: 20%"><a class="nav-link text-center text-muted" href="#ListadoDocumentos" data-toggle="tab">Listado de Documentos</a></li>
                                        -->
                                        <li class="nav-item" style="width: 20%"><a class="nav-link text-center text-muted" href="#Subir_Doc" data-toggle="tab">Subir Documento</a></li>

                                        @php
                                            $secuencia = ($contadorRendicionCuentas + $contadorLlamadasAtencion + $contadorActasAdministrativas) % 4;
                                        @endphp

                                        @if($secuencia === 0)
                                            <!-- Mostrar Rendición de Cuentas si la secuencia es 0 -->
                                            <li class="nav-item" style="width: 33.3%"><a class="nav-link text-center text-muted" href="#GenerarLlA" data-toggle="tab">Rendición de Cuentas</a></li>
                                        @elseif($secuencia === 1 || $secuencia === 2)
                                            <!-- Mostrar Llamada de Atención si la secuencia es 1 o 2 -->
                                            <li class="nav-item" style="width: 33.3%"><a class="nav-link text-center text-muted" href="#GenerarLlA" data-toggle="tab" id="llamadaAtencionTab">Llamada de Atención</a></li>
                                        @elseif($secuencia === 3)
                                        <!-- Mensaje sobre la necesidad de realizar un Acta Administrativa -->
                                        <li class="nav-item" style="width: 50%"><span class="nav-link text-center text-warning">Subir en el apartado de "Subir Documento" un Acta Administrativa ya que este empleado cuenta con 1 rendicion de cuentas y 2 llamadas de atención</span></li>
                                        @endif
                                    </ul>
                                </div>

                    <div class="tab-content" id="custom-below-tabContent">
                      <div class="tab-pane" id="ListadoDocumentos">
                        <div class="card-body p-0">
                          <table class="table">
                          <thead>
                            <tr>
                              <th style="width: 180px">Fecha</th>
                              <th>Tipo Documento</th>
                              <th>Emitido por</th>
                              <th>Eviado a</th> 
                              <th>Estado</th>
                              <th></th> 
                              <th style="width: 120px"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($documentos as $documento)
                              <tr>
                                  <td>{{ $documento->Fecha_Actividad }}</td>
                                  <td>{{ $documento->Tipo_Documento }}</td>
                                  <td>{{ $documento->emisor->name ??'' }}</td>
                                  <td>{{ $documento->receptor->name ??'' }}</td>
                                  <td>{{ $documento->Status_Documento }}</td>
                                  <td>
                                    <a href="{{ asset($documento->nombre_archivo) }}">Visualizar</a>

                                    </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                
                                        <div class="card-tools">
                                        <ul class="pagination pagination-sm float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                        </ul>
                                        </div>

                                    </div>

                                    <div class="active tab-pane" id="Subir_Doc">

                                        <form method="POST" action="/guardar-documento"id="subirForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="text-primary col-md-12">
                                                    <!-- Encabezado del formulario -->
                                                    <label class="col-sm-12 text-center"><h3>Subir Documento</h3></label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-1.8 col-form-label">Tipo de Documento: </label>
                                                <div class="col-sm-3">
                                                    @php
                                                        $secuenciaDocumento = ($contadorRendicionCuentas + $contadorLlamadasAtencion + $contadorActasAdministrativas) % 4;
                                                    @endphp

                                                    @if($secuenciaDocumento === 0)
                                                        <!-- Mostrar opciones para Rendición de Cuentas -->
                                                        <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" placeholder="Tipo de Documento">
                                                            <option>RENDICION DE CUENTAS</option>
                                                        </select>
                                                    @elseif($secuenciaDocumento === 1 || $secuenciaDocumento === 2)
                                                        <!-- Mostrar opciones para Llamada de Atención -->
                                                        <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" placeholder="Tipo de Documento">
                                                            <option>LLAMADA DE ATENCION</option>
                                                        </select>
                                                    @elseif($secuenciaDocumento === 3)
                                                        <!-- Mostrar opciones para Acta Administrativa -->
                                                        <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" placeholder="Tipo de Documento">
                                                            <option>ACTA ADMINISTRATIVA</option>
                                                        </select>
                                                    @endif
                                                </div>

                                                <label class="col-sm-1.8 col-form-label">Encargado de Revisión: </label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" id="Id_Usuario_Revisar" placeholder="Encargado de Revisión" name="Id_Usuario_Revisar">
                                                        @foreach($usuarios as $index => $usuario)
                                                        @if($usuario->id !== auth()->user()->id && $usuario->id !== 1 &&$usuario->RPE_Empleado !== $empleado->RPE_Empleado) 
                                                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
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
                                    </div>  <!--    TAB-PANE SUBIR DOC -->
                                    <div class="tab-pane" id="GenerarLlA">
                                        <form action="{{ url('/procesar-formulario') }}"id="llamadaAtencionForm" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group row">
                                                <div class="text-primary col-md-12">
                                                    <!-- Encabezado del formulario -->
                                                    <label class="col-sm-12 text-center"><h3>Generar Documento</h3></label>
                                                </div>
                                            </div>
                                        
                                            <button type="button" onclick="pegarDatos()" class="btn btn-primary">Pegar Datos</button><br><br>

                                            <div class="form-group row">
                                            <label class="col-sm-1.8 col-form-label">Tipo de Documento: </label>
                                                <div class="col-sm-3">
                                                    @php
                                                        $secuenciaDocumento = ($contadorRendicionCuentas + $contadorLlamadasAtencion + $contadorActasAdministrativas) % 4;
                                                    @endphp

                                                    @if($secuenciaDocumento === 0)
                                                        <!-- Mostrar opciones para Rendición de Cuentas -->
                                                        <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" placeholder="Tipo de Documento">
                                                            <option>RENDICION DE CUENTAS</option>
                                                        </select>
                                                    @elseif($secuenciaDocumento === 1 || $secuenciaDocumento === 2)
                                                        <!-- Mostrar opciones para Llamada de Atención -->
                                                        <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" placeholder="Tipo de Documento">
                                                            <option>LLAMADA DE ATENCION</option>
                                                        </select>
                                                    @elseif($secuenciaDocumento === 3)
                                                        <!-- Mostrar opciones para Acta Administrativa -->
                                                        <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" placeholder="Tipo de Documento">
                                                            <option>ACTA ADMINISTRATIVA</option>
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="N_Llamada" class="col-sm-1.8 col-form-label">N. Documento</label>
                                                <div class="col-sm-1"> <!-- Cambiado a col-sm-1 para reducir el ancho -->
                                                    <!-- El valor de N. Llamada se autoincrementará y no será modificable -->
                                                    <input type="number" class="form-control" id="N_Llamada" name="N_Llamada" placeholder="N. llamada" value="{{ $ultimoNumeroLlamada + 1 }}" readonly>
                                                </div>

                                                <label class="col-sm-1.5 col-form-label">Actividad</label>
                                                <div class="col-sm-3">
                                                    <!-- El campo de Actividad como un select -->
                                                    <select class="form-control" id="Actividad" name="Actividad">
                                                        <!-- Agregar una opción por defecto si es necesario -->
                                                        <option value="">Selecciona una actividad</option>
                                                        <!-- Iterar sobre las actividades y mostrarlas en el select -->
                                                        @foreach($actividades as $actividad)
                                                            <option value="{{ $actividad->id }}">{{ $actividad->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <label class="col-sm-1.5 col-form-label">Fecha de la supervision</label>
                                                <div class="col-sm-3">
                                                    <!-- El campo de Fecha con la fecha actual y no editable -->
                                                    <input type="date" class="form-control" id="Fecha_Supervision" name="Fecha_Supervision" value="{{ $fechaActual }}" readonly>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-1.5 col-form-label">Fecha de la actividad</label>
                                                <div class="col-sm-3">
                                                    <!-- El campo de Fecha con la fecha actual y editable -->
                                                    <input type="date" class="form-control" id="Fecha_Actividad" name="Fecha_Actividad" value="{{ $fechaActual }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-1.5 col-form-label">Indicadores afectados:</label>
                                                <div class="select-wrapper">
                                                    <select id="nombre_indicador" onchange="agregarFila()">
                                                        @foreach($indicadores as $indicador)
                                                            <option value="{{ $indicador->Nombre_Indicador }}">{{ $indicador->Nombre_Indicador }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <table id="tabla" class="custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Indicador</th>
                                                            <th>Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <script>
                                            function agregarFila() {
                                                var opcionSeleccionada = document.getElementById("nombre_indicador").value;
                                                var tablaBody = document.getElementById("tabla").getElementsByTagName("tbody")[0];
                                                var fila = tablaBody.insertRow();

                                                var celdaOpcion = fila.insertCell(0);
                                                celdaOpcion.textContent = opcionSeleccionada;

                                                // Agregar el valor seleccionado al arreglo de indicadores
                                                var indicadoresInput = document.createElement("input");
                                                indicadoresInput.type = "hidden";
                                                indicadoresInput.name = "nombre_indicador[]";
                                                indicadoresInput.value = opcionSeleccionada;
                                                fila.appendChild(indicadoresInput);

                                                var celdaBoton = fila.insertCell(1);
                                                var deleteIcon = document.createElement("span");
                                                deleteIcon.textContent = "❌";
                                                deleteIcon.className = "delete-icon";
                                                deleteIcon.onclick = function() {
                                                    fila.parentNode.removeChild(fila);
                                                };

                                                celdaBoton.appendChild(deleteIcon);
                                            }
                                            </script>
                                    

                                            <input type="hidden" name="Id_Empleado" id="Id_Empleado" value="{{$empleado->id}}">
                                            
                                            <input type="hidden" name="Status_Documento" id="Status_Documento" value="ENVIADO">
                                    
                                            <!-- Introducción del primer indicador -->
                                            <div class="form-group row">
                                                <label for="inputCargo" class="col-sm-12 col-form-label">Introducción</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control"id="Introduccion"name="Introduccion" rows="3" placeholder="Explique de manera general el motivo de la Rendición de Cuentas"></textarea>
                                                </div>
                                                @if ($errors->has('Introduccion'))
                                                    <span class="error-message">{{ $errors->first('Introduccion') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputCargo" class="col-sm-12 col-form-label">Explicación</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control"id="contenido"name="contenido" rows="11" placeholder="Explique de manera detallada y especifica el motivo de la Rendición de Cuentas"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-1.9 col-form-label">Imágenes de evidencia:</label>
                                                <div class="col-sm-10" style="height: 200px; border: 2px solid #ccc; border-radius: 5px; padding: 10px;">
                                                    <div class="custom-file" style="height: 100%;">
                                                        <input class="custom-file-input" type="file" id="imagen" name="imagen[]" onchange="mostrarNombre()" multiple accept="image/*" style="border: none; height: calc(100% - 2px);">

                                                        <label class="custom-file-label" for="imagen">Arrastra y suelta imágenes aquí, o haz clic para seleccionar...</label>
                                                        <i class="fas fa-cloud-upload-alt" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                                                    </div>
                                                    <span id="ArchivoSeleccionado"></span>
                                                </div>
                                            </div>

                                            <table id="tablaImagenes" class="custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre del archivo</th>
                                                        <th>Quitar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>

                                            <script>
                                                function mostrarNombre() {
                                                    const input = document.getElementById('imagen');
                                                    const files = input.files;
                                                    const tablaImagenes = document.getElementById('tablaImagenes').getElementsByTagName('tbody')[0];

                                                    for (let i = 0; i < files.length; i++) {
                                                        const file = files[i];
                                                        if (file.type.startsWith('image/')) {
                                                            const nombreArchivo = file.name;
                                                            const fila = document.createElement('tr');
                                                            const celdaNombre = document.createElement('td');
                                                            celdaNombre.textContent = nombreArchivo;
                                                            fila.appendChild(celdaNombre);

                                                            const celdaQuitar = document.createElement('td');
                                                            const botonQuitar = document.createElement('button');
                                                            botonQuitar.textContent = "❌";
                                                            botonQuitar.className = "btn-quitar";
                                                            botonQuitar.addEventListener('click', function() {
                                                                fila.remove();
                                                                actualizarContador();
                                                            });
                                                            celdaQuitar.appendChild(botonQuitar);
                                                            fila.appendChild(celdaQuitar);

                                                            // Asignar un ID único a la fila
                                                            fila.id = 'imagen_' + i;

                                                            tablaImagenes.appendChild(fila);
                                                        } else {
                                                            alert('El archivo "' + file.name + '" no es una imagen y no será agregado.');
                                                        }
                                                    }

                                                    // Actualizar el contador de imágenes
                                                    actualizarContador();
                                                }

                                                function actualizarContador() {
                                                    const cantidadImagenes = document.getElementById('tablaImagenes').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
                                                    document.getElementById('ArchivoSeleccionado').innerText = 'Número de archivos: ' + cantidadImagenes;
                                                }
                                            </script>

                                            <div class="form-group row">
                                                <label for="inputCargo" class="col-sm-2 col-form-label">Usuario a mandar a revisión</label>
                                                <div class="col-sm-9">
                                                    <div class="form-group">
                                                        <select class="form-control" id="Id_Usuario_Revisar" name="Id_Usuario_Revisar">
                                                            @foreach($usuarios as $usuario)
                                                                @if($usuario->id !== auth()->user()->id && $usuario->id !== 1 &&$usuario->RPE_Empleado !== $empleado->RPE_Empleado) 
                                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit"  class="btn btn-danger">Enviar</button>
                                                </div>
                                            </div>
                                
                                        </form>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                const form = document.getElementById('llamadaAtencionForm');

                                                form.addEventListener('submit', function (event) {
                                                    const nLlamada = document.getElementById('N_Llamada').value;
                                                    const actividad = document.getElementById('Actividad').value;
                                                    const fechaActividad = document.getElementById('Fecha_Actividad').value;
                                                    const introduccion = document.getElementById('Introduccion').value;
                                                    const contenido = document.getElementById('contenido').value;
                                                    const usuarioRevisar = document.getElementById('Id_Usuario_Revisar').value;

                                                    if (!nLlamada || !actividad || !fechaActividad || !introduccion || !contenido || !imagen || !usuarioRevisar) {
                                                        alert('Por favor, completa todos los campos antes de enviar el formulario.');
                                                        event.preventDefault();
                                                    }
                                                });
                                            });
                                        </script>
                    
                                        <script>
                                            function pegarDatos() {
                                                // Verificar si hay datos copiados
                                                if (window.datosCopiados) {
                                                    // Obtener los datos copiados del objeto global
                                                    var contenido = window.datosCopiados.contenido || '';
                                                    var introduccion = window.datosCopiados.Introduccion || '';
                                                    
                                                    // Asignar los datos a los elementos correspondientes
                                                    document.getElementById('contenido').value = contenido;
                                                    document.getElementById('Introduccion').value = introduccion;
                                                    
                                                    // Notificar al usuario
                                                    alert('Datos pegados.');
                                                } else {
                                                    // Notificar al usuario si no hay datos copiados
                                                    alert('No se han copiado datos aún.');
                                                }
                                            }
                                        </script>
                
                
                                    </div><!-- /.tab-pane Generar Llamada Atencion -->
                                </div><!-- /.tab-content -->
                            </div><!-- /.tab-pane Documentos -->

                            <div class="tab-pane" id="ModInfo">
                        
                                <form method="POST"id="tuFormularioId" action="{{ route('empleado.update', $empleado->id) }}">
                                    @csrf
                                    @method('PATCH')
                                
                                    <input type="hidden" class="form-control" id="RPE_Empleado" maxlength="5" value="{{ $empleado->RPE_Empleado }}" name="RPE_Empleado" placeholder="RPE">
                                

                                    <div class="form-group">
                                        <label for="nombre_Empleado"><i class="fas fa-user"></i> Nombre:</label>
                                        <input type="text" class="form-control" id="nombre_Empleado" name="nombre_Empleado"value="{{ $empleado->nombre_Empleado }}" placeholder="Nombre">
                                    </div>
                                    @if ($errors->has('nombre_Empleado'))
                                        <span class="error-message">{{ $errors->first('nombre_Empleado') }}</span>
                                    @endif

                                    <div class="form-group">
                                        <label for="contrato_id"><i class="fas fa-file-contract"></i> Contrato:</label>
                                        <select name="contrato" id="contrato" class="form-control">
                                            @foreach($contratos as $contrato)
                                                <option value="{{ $contrato->id }}" {{ $empleado->contrato_id == $contrato->id ? 'selected' : '' }}>
                                                    {{ $contrato->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('contrato'))
                                        <span class="error-message">{{ $errors->first('contrato') }}</span>
                                    @endif

                                    <label for="zonas"><i ></i> Selecciona una Zona:</label><br>
                                    <div class="input-group mb-3">
                                        <select id="zonas" name="zonas[]" class="form-control @error('zona') is-invalid @enderror">
                                            @foreach ($zonas as $zona)
                                            <option value="{{ $zona->id }}" {{ in_array($zona->id, $empleado->zonas->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $zona->nombre_zona }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-users"></span>
                                            </div>
                                        </div>
                                </div>
                                @if ($errors->has('zona'))
                                    <span class="error-message">{{ $errors->first('zona') }}</span>
                                @endif

                                    <div class="form-group">
                                        <label for="fecha_ingreso"><i class="fas fa-calendar"></i> Fecha Ingreso:</label>
                                        <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso"value="{{ $empleado->fecha_ingreso }}" required>
                                    </div>
                                    @if ($errors->has('fecha_ingreso'))
                                        <span class="error-message">{{ $errors->first('fecha_ingreso') }}</span>
                                    @endif

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger" id="submitButton">Guardar cambios</button>
                                        </div>
                                    </div>

                                </form>
                            </div> <!-- /.tab-pane -->
                        </div> <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    <script>
// Contador de tiempo
// Variables para almacenar los identificadores de los intervalos de cada contador
// Variables para almacenar los identificadores de los intervalos de cada contador
var intervalosContadores = {};

// Función para calcular el tiempo restante y actualizar el contador para un documento específico
function actualizarContador(documentoId, fechaCreacion, duracionPredeterminada) {
    // Obtener la fecha de expiración sumando la duración al tiempo de creación
    var fechaExpiracion = fechaCreacion + duracionPredeterminada;

    // Obtener la diferencia de tiempo en milisegundos entre la fecha de expiración y la fecha actual
    var diferencia = fechaExpiracion - new Date().getTime();

    // Verificar si la diferencia es menor o igual a cero
    if (diferencia <= 0) {
        // Detener el contador y establecer el tiempo restante en "00h 00m 00s"
        document.getElementById("contador_" + documentoId).innerHTML = "00h 00m 00s";

        // Cambiar el color de la línea a rojo
        document.getElementById("contador_" + documentoId).style.color = "red";

        // Detener el intervalo para este contador
        clearInterval(intervalosContadores[documentoId]);
    } else {
        // Convertir la diferencia a horas, minutos y segundos
        var segundosTotales = Math.floor(diferencia / 1000);
        var horas = Math.floor(segundosTotales / 3600);
        var minutos = Math.floor((segundosTotales % 3600) / 60);
        var segundos = segundosTotales % 60;

        // Formatear el tiempo restante
        var tiempoRestante = (horas < 10 ? '0' : '') + horas + "h " + (minutos < 10 ? '0' : '') + minutos + "m " + (segundos < 10 ? '0' : '') + segundos + "s ";

        // Actualizar el contador en la tabla
        document.getElementById("contador_" + documentoId).innerHTML = tiempoRestante;

        // Cambiar el color del texto a verde
        document.getElementById("contador_" + documentoId).style.color = "green";
    }
}

// Función para iniciar el contador para un documento específico
function iniciarContador(documentoId, fechaCreacion, duracionPredeterminada) {
    // Si la duración predeterminada es negativa, establecerla en cero para evitar valores negativos
    if (duracionPredeterminada < 0) {
        duracionPredeterminada = 0;
    }
    
    // Actualizar el contador cada segundo y almacenar el identificador del intervalo
    intervalosContadores[documentoId] = setInterval(function() {
        actualizarContador(documentoId, fechaCreacion, duracionPredeterminada);
    }, 1000); // 1000 milisegundos = 1 segundo
}

// Llamar a la función inicialmente para iniciar los contadores para cada documento
@foreach($documentos as $documento)
    // Obtener el estado del documento y la fecha de creación en milisegundos
    var estado{{ $documento->id }} = "{{ $documento->Status_Documento }}";
    var fechaCreacion{{ $documento->id }} = new Date("{{ $documento->created_at }}").getTime();
    
    // Definir la duración predeterminada en milisegundos según el estado del documento
    var duracionPredeterminada{{ $documento->id }} = 23 * 60 * 60 * 1000; // Duración predeterminada de 24 horas
    
    // Ajustar la duración según el estado del documento
    if (estado{{ $documento->id }} === 'EN EDICION' ) {
        // Duración de 24 horas para documentos en edición o aceptados
        duracionPredeterminada{{ $documento->id }} = 23 * 60 * 60 * 1000;
    }
    if (estado{{ $documento->id }} === 'ACEPTADO' ) {
        // Duración de 24 horas para documentos en edición o aceptados
        duracionPredeterminada{{ $documento->id }} = 23 * 60 * 60 * 1000;
    }
    
    // Iniciar el contador para el documento actual si cumple con las condiciones
    @if($documento->Status_Documento !== 'CANCELADO' && $documento->Status_Documento !== 'TERMINADO' )
        iniciarContador({{ $documento->id }}, fechaCreacion{{ $documento->id }}, duracionPredeterminada{{ $documento->id }});
    @endif
    
@endforeach




// Cancelar documento
function toggleMotivo(documentoId) {
var comentario = document.getElementById('comentario_' + documentoId);
var btnCancelar = document.getElementById('btnCancelar_' + documentoId);
var btnToggle = document.getElementById('formCancelarDocumento_' + documentoId).querySelector('button[type="button"]');

if (comentario.style.display === 'none') {
    // Mostrar cuadro de texto y botón "X", ocultar botón "Cancelar"
    comentario.style.display = 'block';
    btnCancelar.style.display = 'inline';
    btnToggle.textContent = 'Cancelar';
} else {
    // Ocultar cuadro de texto y botón "X", mostrar botón "Cancelar"
    comentario.style.display = 'none';
    btnCancelar.style.display = 'none';
    btnToggle.textContent = 'Cancelar';
}
}

function validarFormulario(documentoId) {
// Validar que el campo de comentario no esté vacío
var comentario = document.getElementById('comentario_' + documentoId).value;
if (comentario.trim() === "") {
    alert('Debes escribir un comentario para cancelar el documento.');
    return false;
}
return true;
}
</script>
<script src="{{ asset('dist/js/slidebar.js') }}"></script>
<script src="{{asset('dist/js/mostrarHallazgos.js')}}"></script>
@endsection
