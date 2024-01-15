@extends('layouts.nav')
  @section('content')

  <style src="{{asset('dist/css/hallazgosIndicadores.css')}}"></style>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/logo.png"
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

          


          <!-- Contenido Principal -->
          <div class="col-md-9">
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
                  </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <h4 class="text-center">Ultimos Documentos Registrados</h4>
                        </div>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Id</th>
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
                                  <td>{{ $documento->id }}</td>
                                  <td>{{ $documento->Fecha_Actividad }}</td>
                                  <td>{{ $documento->Tipo_Documento }}</td>
                                  <td>{{ $documento->emisor->name }}</td>
                                  <td>{{ $documento->receptor->name }}</td>
                                  <td>{{ $documento->Status_Documento }}</td>
                                  <td>
                                      <form action="{{ route('download.pdf', ['id' => $documento->id]) }}" method="POST">
                                          @csrf
                                          <button type="submit" class="btn btn-block btn-primary btn-sm">
                                              <i class="fas fa-download"></i> Descargar
                                          </button>
                                      </form>
                                  </td>
                                  <td>
                                    <button onclick="copiarDatos('{{ $documento->contenido }}', '{{ $documento->Introduccion }}')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-copy"></i> Copiar
                                    </button>
                                  </td>
                                  <td>
                                      @if($documento->Status_Documento !== 'ACEPTADO' && Auth::id() === $documento->Id_Usuario_Revisar && $documento->Status_Documento !== 'EN EDICION')
                                          <form action="{{ route('cambiar.estado', ['id' => $documento->id]) }}" method="POST">
                                              @csrf
                                              <button type="submit" class="btn btn-success btn-sm">
                                                  Aceptar
                                              </button>
                                          </form>
                                      @elseif($documento->Status_Documento === 'ACEPTADO' && Auth::id() === $documento->Id_Usuario_Revisar)
                                          <!-- Si el documento ya está aceptado, mostrar un mensaje o simplemente un texto -->
                                          <span>Documento aceptado</span>
                                      @else
                                          <!-- Otro mensaje si el usuario no es el destinatario -->
                                         
                                      @endif
                                  </td>
                                  <td>
                                      @if($documento->Status_Documento !== 'EN EDICION' && Auth::id() === $documento->Id_Usuario_Revisar && $documento->Status_Documento !== 'ACEPTADO' )
                                          <form action="{{ route('rechazar.documento', ['id' => $documento->id]) }}" method="POST">
                                              @csrf
                                              <button type="submit" class="btn btn-danger btn-sm">
                                                  Rechazar
                                              </button>
                                          </form>
                                      @elseif($documento->Status_Documento === 'EN EDICION' && Auth::id() === $documento->Id_Usuario_Revisar)
                                          <!-- Si el documento ya está aceptado, mostrar un mensaje o simplemente un texto -->
                                          <span>Documento enviado a revisión</span>
                                      @else
                                          <!-- Otro mensaje si el usuario no es el destinatario -->
                                         
                                      @endif
                                  </td>
                                  <td>
                                  @if($documento->Status_Documento === 'EN EDICION' && Auth::id() === $documento->Id_Usuario_Autor)
                                      <!-- Si el documento está en EDICION y el usuario es el autor, mostrar botón de Editar -->
                                      <a href="{{ route('editar.documento', ['id' => $documento->id]) }}" class="btn btn-primary btn-sm">
                                          Editar
                                      </a>
                                  @else
                                      <!-- Otro mensaje si el usuario no es el destinatario -->
                                  @endif
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                  <script>
                      function copiarDatos(contenido,Introduccion) {
                          // Captura los datos de la fila y guárdalos en una variable global (por ejemplo, 'datosCopiados')
                          window.datosCopiados = {
                            contenido,
                            Introduccion
                          };
                          alert('Datos copiados.'); // Puedes eliminar esta alerta si lo prefieres
                      }
                  </script>

                  <div class="tab-pane" id="Documentos">
                    <div class="card bg-black color-palette">
                    <ul class="nav navtabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item" style="width: 20%"><a class="nav-link text-center text-muted" href="#ListadoDocumentos" data-toggle="tab">Listado de Documentos</a></li>
                    <li class="nav-item" style="width: 20%"><a class="nav-link text-center text-muted" href="#Subir_Doc" data-toggle="tab">Subir Documento</a></li>
                    <li class="nav-item" style="width: 20%"><a class="nav-link text-center text-muted" href="#GenerarRC" data-toggle="tab">Rendición de Cuentas</a></li>
                    <li class="nav-item" style="width: 20%"><a class="nav-link text-center text-muted" href="#GenerarLlA" data-toggle="tab">Llamada de Atención</a></li>
                    <li class="nav-item" style="width: 20%"><a class="nav-link text-center text-muted" href="#GenerarAA" data-toggle="tab">Acta Administrativa</a></li>
                    </ul>
                    </div>

                    <div class="tab-content" id="custom-below-tabContent">
                      <div class="active tab-pane" id="ListadoDocumentos">
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
                                  <td>{{ $documento->emisor->name }}</td>
                                  <td>{{ $documento->receptor->name }}</td>
                                  <td>{{ $documento->Status_Documento }}</td>
                                  <td>
                                    <a href="{{ asset($documento->nombre_archivo) }}">Descargar</a>

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

                      <div class="tab-pane" id="Subir_Doc">

                      <form method="POST" action="/guardar-documento" enctype="multipart/form-data">
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
                                <select class="form-control" id="Tipo_Documento" name="Tipo_Documento" placeholder="Tipo de Documento">
                                    <option>RENDICION DE CUENTAS</option>
                                    <option>LLAMADA DE ATENCION</option>
                                    <option>ACTA ADMINISTRATIVA</option>
                                </select>
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
                    </form>

                      </div>





















                      <div class="tab-pane" id="GenerarLlA">
                    <form action="{{ url('/procesar-formulario') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <div class="text-primary col-md-12">
                                <!-- Encabezado del formulario -->
                                <label class="col-sm-12 text-center"><h3>Generar Llamada de Atención</h3></label>
                            </div>
                        </div>
                    
                        <button type="button" onclick="pegarDatos()" class="btn btn-primary">Pegar Datos</button><br><br>

                        <!-- Campos del primer indicador -->
                        <div class="form-group row">
                            <label class="col-sm-1.8 col-form-label">N. Llamada</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="N_Llamada" name="N_Llamada" placeholder="N. llamada">
                            </div>

                            <label class="col-sm-1.5 col-form-label">Actividad</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="Actividad" name="Actividad" placeholder="Actividad">
                            </div>

                            <label class="col-sm-1.5 col-form-label">Fecha</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="Fecha_Actividad" name="Fecha_Actividad" placeholder="Fecha">
                            </div>
                        </div>


                        <input type="hidden" name="Id_Empleado" id="Id_Empleado" value="{{$empleado->id}}">
                        <input type="hidden" name="Tipo_Documento" id="Tipo_Documento" value="LLAMADA DE ATENCION">
                        <input type="hidden" name="Status_Documento" id="Status_Documento" value="ENVIADO">
                        
                        <!-- Introducción del primer indicador -->
                        <div class="form-group row">
                            <label for="inputCargo" class="col-sm-12 col-form-label">Introducción</label>
                            <div class="col-sm-12">
                                <textarea class="form-control"id="Introduccion"name="Introduccion" rows="3" placeholder="Explique de manera general el motivo de la Rendición de Cuentas"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCargo" class="col-sm-12 col-form-label">Explicación</label>
                            <div class="col-sm-12">
                                <textarea class="form-control"id="contenido"name="contenido" rows="11" placeholder="Explique de manera detallada y especifica el motivo de la Rendición de Cuentas"></textarea>
                            </div>
                        </div>

                      

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
                                
                                <button type="submit" class="btn btn-danger">Enviar</button>
                            </div>
                        </div>
                      
                    </form>
                    <script>
                        function pegarDatos() {
                            if (window.datosCopiados) {
                                document.getElementById('contenido').value = window.datosCopiados.contenido || '';
                                document.getElementById('Introduccion').value = window.datosCopiados.Introduccion || '';
                            } else {
                                alert('No se han copiado datos aún.');
                            }
                        }
                    </script>

    
    
</div><!-- /.tab-pane -->




















                    </div><!-- /.tab-content -->
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="ModInfo">
                  
                    <form method="POST"id="tuFormularioId" action="{{ route('empleado.update', $empleado->id) }}">
                      @csrf
                      @method('PATCH')
                        <div class="form-group">
                          <label for="RPE_Empleado"><i class="fas fa-id-card"></i> RPE:</label>
                          <input type="text" class="form-control" id="RPE_Empleado" maxlength="5" value="{{ $empleado->RPE_Empleado }}" name="RPE_Empleado" placeholder="RPE">
                        </div>

                        <div class="form-group">
                          <label for="nombre_Empleado"><i class="fas fa-user"></i> Nombre:</label>
                          <input type="text" class="form-control" id="nombre_Empleado" name="nombre_Empleado"value="{{ $empleado->nombre_Empleado }}" placeholder="Nombre">
                        </div>

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


                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" id="submitButton">Guardar cambios</button>
                          </div>
                        </div>

                    </form>
                  </div> <!-- /.tab-pane -->
                </div> <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
              <!-- /.card -->
          </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<script src="{{ asset('dist/js/slidebar.js') }}"></script>
<script src="{{asset('dist/js/mostrarHallazgos.js')}}"></script>
@endsection