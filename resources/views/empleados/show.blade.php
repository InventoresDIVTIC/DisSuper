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
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nombre Empleado</h3>

                <p class="text-muted text-center">Cargo Actual</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Zona de Trabajo</b>
                  </li>
                  <li class="list-group-item">
                    <b>Encargado de la Zona</b> 
                  </li>
                  <li class="list-group-item">
                    <b>Fecha de Ingreso</b> 
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
                              <span class="info-box-number text-center text-muted mb-0">0</span>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Llamadas de Atención</span>
                              <span class="info-box-number text-center text-muted mb-0">0</span>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted"><a>Actas Administrativas</a></span>
                              <span class="info-box-number text-center text-muted mb-0">0</span>
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
                              
                              <th style="width: 180px">Fecha</th>
                              <th>Tipo Documento</th>
                              <th>Emitido por</th>
                              <th>Estado</th>
                              <th style="width: 120px"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              
                              <td>11-7-2014</td>
                              <td>Rendición de Cuentas</td>
                              <td>El Admin</td>
                              <td>Por Revisar</td>
                              <td><button type="button" class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                            </tr>
                            <tr>
                                
                                <td>11-7-2014</td>
                                <td>Acta Administrativa</td>
                                <td>El Admin</td>
                                <td>Revisado</td>
                                <td><button type="button" class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                            </tr>
                            <tr>
                              
                              <td>11-7-2014</td>
                              <td>Llamada de Atención</td>
                              <td>El Admin</td>
                              <td>Cancelado</td>
                              <td><button type="button" class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="Documentos">
                    <div class="card bg-black color-palette">
                    <ul class="nav navtabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item" style="width: 25%"><a class="nav-link text-center text-muted" href="#ListadoDocumentos" data-toggle="tab">Listado de Documentos</a></li>
                    <li class="nav-item" style="width: 25%"><a class="nav-link text-center text-muted" href="#GenerarRC" data-toggle="tab">Rendición de Cuentas</a></li>
                    <li class="nav-item" style="width: 25%"><a class="nav-link text-center text-muted" href="#GenerarLlA" data-toggle="tab">Llamada de Atención</a></li>
                    <li class="nav-item" style="width: 25%"><a class="nav-link text-center text-muted" href="#GenerarAA" data-toggle="tab">Acta Administrativa</a></li>
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
                                <th>Estado</th>
                                <th style="width: 120px"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>11-7-2014</td>
                                <td>Rendición de Cuentas</td>
                                <td>El Admin</td>
                                <td>Por Revisar</td>
                                <td><button type="button" class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                              </tr>
                              <tr>
                                  <td>11-7-2014</td>
                                  <td>Acta Administrativa</td>
                                  <td>El Admin</td>
                                  <td>Revisado</td>
                                  <td><button type="button" class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                              </tr>
                              <tr>
                                <td>11-7-2014</td>
                                <td>Llamada de Atención</td>
                                <td>El Admin</td>
                                <td>Cancelado</td>
                                <td><button type="button" class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                              </tr>
                              <tr>
                                  <td>11-7-2014</td>
                                  <td>Rendición de Cuentas</td>
                                  <td>El Admin</td>
                                  <td>Revisado</td>
                                  <td><button type="button" class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                              </tr>
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





















                      <div class="tab-pane" id="GenerarLlA">
                    <form action="{{ url('/procesar-formulario') }}" method="POST">
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
                <input type="number" class="form-control" id="inputNLlamada" name="inputNLlamada" placeholder="N. llamada">
            </div>

            <label class="col-sm-1.5 col-form-label">Actividad</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputCiclo" placeholder="Actividad">
            </div>

            <label class="col-sm-1.5 col-form-label">Fecha</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="inputDate" placeholder="Fecha">
            </div>
        </div>

        <!-- Introducción del primer indicador -->
        <div class="form-group row">
            <label for="inputCargo" class="col-sm-12 col-form-label">Introducción</label>
            <div class="col-sm-12">
                <textarea class="form-control" rows="3" placeholder="Explique de manera general el motivo de la Rendición de Cuentas"></textarea>
            </div>
        </div>

        <div class="Indicadores" id="indicadores-container">
            <!-- Campos del primer indicador -->
            <div class="hallazgo-container" id="hallazgos-container">
                   <!-- Los hallazgos se agregarán aquí -->
              </div>
            
        </div>

        <div class="form-group row">
            <label for="inputCargo" class="col-sm-2 col-form-label">Usuario a mandar a revisión</label>
            <div class="col-sm-9">
                <div class="form-group">
                    <select class="form-control">
                        <option>Juan Mecanico</option>
                        <option>Doctor Bonilla</option>
                        <option>Eduardo Quintero</option>
                        <option>David Guadalupe</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="button" class="btn add-btn btn-info" id="addIndicador">Agregar Indicador</button>
                <button type="button" class="btn add-btn btn-danger" onclick="eliminarIndicador()" id="removeIndicador">Eliminar Indicador</button>
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </div>
       
    </form>
    
    
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