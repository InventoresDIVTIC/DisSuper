@extends('layouts.nav')
  @section('content')

  <script src="{{ asset('js/empleado_confirmation.js') }}"></script>
  @vite(['resources/js/newIndicador.js'])
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
                  <li class="nav-item" style="width: 15%"><a class="nav-link active text-center" href="#InformacionGeneral" data-toggle="tab">Información General</a></li>
                  <li class="nav-item" style="width: 18%"><a class="nav-link text-center" href="#ListadoDocumentos" data-toggle="tab">Listado de Documentos</a></li>
                  <li class="nav-item" style="width: 18%"><a class="nav-link text-center" href="#GenerarRC" data-toggle="tab">Rendición de Cuentas</a></li>
                  <li class="nav-item" style="width: 18%"><a class="nav-link text-center" href="#GenerarLlA" data-toggle="tab">Llamada de Atención</a></li>
                  <li class="nav-item" style="width: 18%"><a class="nav-link text-center" href="#GenerarAA" data-toggle="tab">Acta Administrativa</a></li>
                  <li class="nav-item" style="width: 13%"><a class="nav-link text-center" href="#ModInfo" data-toggle="tab">Modificar</a></li>
                </ul>
              </div><!-- /.card-header -->

            <!-- Tabla -->
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
                        {{-- <div class="color-palette-set">
                          <div class="bg-gray color-palette"> --}}
                            <h4 class="text-center">Ultimos Documentos Registrados</h4>
                          {{-- </div>
                        </div> --}}
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

                  {{-- Listado de Documentos --}}
                  <div class="tab-pane" id="ListadoDocumentos">
                    
                    <!-- /.card-header -->
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


                  <!-- Generar rendición de cuentas -->
                  <div class="tab-pane" id="GenerarRC">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <div class="text-primary col-md-12"> 
                          <label class="col-sm-12 text-center"> Generar Llamada de Atención</label>
                        </div>
                      </div>

                        <div class="form-group row">

                          <label class="col-sm-1.8 col-form-label">N. Llamada</label>
                          <div class="col-sm-3">
                            <input type="number" class="form-control" id="inputNLlamada" placeholder="N. llamada">
                          </div>

                          <label class="col-sm-1.5 col-form-label">Ciclo</label>
                          <div class="col-sm-3">
                            <input type="number" class="form-control" id="inputCiclo" placeholder="Ciclo">
                          </div>

                          <label class="col-sm-1.5 col-form-label">Fecha</label>
                          <div class="col-sm-3">
                            <input type="date" class="form-control" id="inputDate" placeholder="Fecha">
                          </div>
                          
                        </div>
  
                        <div class="form-group row">
                          <label for="inputCargo" class="col-sm-12 col-form-label">Motivo de la Rendición de Cuentas</label>
                          <div class="col-sm-12">
                            <textarea class="form-control" rows="3" placeholder="Explique el Motivo de la Rendición de Cuentas"></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <!-- <label for="customFile">Custom File</label> -->
                          <label for="inputCargo" class="col-sm-2 col-form-label">Evidencia</label>
                          <div class="col-sm-10">
                              <div class="input-group">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="ImagenMotivo">
                                      <label class="custom-file-label" for="customFile">Evidencia del Motivo de la Rendición de Cuentas</label>
                                  </div>
                              </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputCargo" class="col-sm-12 col-form-label">Fundamento de la Rendición de Cuentas</label>
                          <div class="col-sm-12">
                            <textarea class="form-control" rows="3" placeholder="Explique su Fundamento"></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <!-- <label for="customFile">Custom File</label> -->
                          <label for="inputCargo" class="col-sm-2 col-form-label">Evidencia</label>
                          <div class="col-sm-10">
                              <div class="input-group">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="imagenFundamento">
                                      <label class="custom-file-label" for="customFile">Evidencia del Fundamento</label>
                                  </div>
                              </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-11 text-center col-form-label">Indicadores</label>
                          <div class="row text-right">
                            <div class="col-md-2">
                              <button class="btn add-btn btn-info" id="addIndicador">+</button>
                            </div>
                          </div>
                        </div>

                          <div class="Indicadores">

                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Nombre del Indicador 1</label>
                              <div class="col-md-9">
                                <input type="string" class="form-control" placeholder="Nombre del Indicador">
                                
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Actividad</label>
                              <div class="col-md-9">
                                <textarea rows="3" class="form-control" placeholder="Explique la actividad a realizar"> </textarea>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Hallazgo</label>
                              <div class="col-md-9">
                                <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"> </textarea>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Sistemas de Referencia</label>
                              <div class="col-md-9">
                                <input type="string" class="form-control" placeholder="Sistemas de Referenciar">
                                
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Normas Incumplidas</label>
                              <div class="col-md-9">
                                <input type="string" class="form-control" placeholder="Normas Incumplidas">
                                
                              </div>
                            </div>

                            <!--  MENSAJE DE AVISO
                            <div class="form-group row">
                              <div class="text-info col-md-12"> 
                                <label class="col-sm-12 text-center"> Proximamente se incluirán Sistemas de Referencia y las Normas Incumplidas por indicador</label>
                              </div>
                            </div>
                            -->

                          </div>

                          <div class="form-group row">
                            <label for="inputCargo" class="col-sm-4 col-form-label">Usuario a mandar a revisión</label>
                            <div class="col-sm-8">
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
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
  
                      </form>
                  </div>
                  <!-- /.tab-pane -->

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
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<script src="js/newIndicador.js"></script>
@endsection