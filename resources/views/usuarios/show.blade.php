@extends('layouts.nav')
  @section('content')


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/user_confirmation.js') }}"></script>
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

                <h3 class="profile-username text-center">Nombre: {{ $usuario->name }}</h3> <!-- Agregar "Nombre:" aquí -->

                <p class="text-muted text-center">Rol: {{ $usuario->roles->first()->name }}</p> <!-- Mostrar el primer rol del usuario -->

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Zona de Trabajo</b>
                  </li>
                  <li class="list-group-item">
                    <b>Encargado de la Zona</b> 
                  </li>
                  <li class="list-group-item">
                    <b>Fecha de Ingreso: {{ $usuario->fecha_registro }}</b> <!-- Muestra la fecha de ingreso -->
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            {{-- <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Documentos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Rendición de Cuentas</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                          <b>Llamadas de Atención</b> <a class="float-right">0</a>
                        </li>
                        <li class="list-group-item">
                          <b>Actas Administrativas</b> <a class="float-right">0</a>
                        </li>
                      </ul>
                </div>
                <!-- /.card-body -->
              </div> --}}
            <!-- /.card -->
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


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="GenerarRC">
                    <form class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Indicador</label>
                          <div class="col-sm-10">
                            <input type="string" class="form-control" id="inputIndicador" placeholder="Nombre del Indicador">
                          </div>
                        </div>
  
                        <div class="form-group row">
                          <label for="inputCargo" class="col-sm-2 col-form-label">Texto</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Explique el Fallo del Indicador"></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="customFile">Custom File</label> -->
                            <label for="inputCargo" class="col-sm-2 col-form-label">Evidencia</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Imagen de Evidencia</label>
                                    </div>
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
                  <h2>Modificar Usuario: {{ strtoupper($usuario->name) }}</h2><br><br>
                  <form method="POST" id="tuFormularioId2" action="{{ route('usuario.update', $usuario->id) }}">
                  
                    @csrf
                    @method('PATCH')
                    <label for="contrato_id"><i ></i> Nombre:</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Nombre completo"  value="{{ $usuario->name }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('name'))
                            <span class="error-message">{{ $errors->first('name') }}</span>
                        @endif

                        <label for="contrato_id"><i ></i> Email:</label><br>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Correo Electrónico"  value="{{ $usuario->email }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="error-message">{{ $errors->first('email') }}</span>
                        @endif
                        <label for="contrato_id"><i ></i> RPE:</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="RPE_Empleado" placeholder="RPE (max. 5 caracteres)" maxlength="5" value="{{ $usuario->RPE_Empleado }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('RPE_Empleado'))
                            <span class="error-message">{{ $errors->first('RPE_Empleado') }}</span>
                        @endif
                        <label for="contrato_id"><i ></i> Fecha de registro:</label><br>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="fecha_registro" placeholder="Fecha de ingreso"  value="{{ $usuario->fecha_registro }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-calendar"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('fecha_registro'))
                            <span class="error-message">{{ $errors->first('fecha_registro') }}</span>
                        @endif
                        <label for="contrato_id"><i></i> Tipo de contrato:</label><br>
                        <div class="input-group mb-3">
                        <select name="contrato" id="contrato" class="form-control">
                              @foreach($contratos as $contrato)
                                  <option value="{{ $contrato->id }}" {{ $usuario->contrato_id == $contrato->id ? 'selected' : '' }}>
                                      {{ $contrato->name }}
                                  </option>
                              @endforeach
                          </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-file-contract"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('contrato'))
                            <span class="error-message">{{ $errors->first('contrato') }}</span>
                        @endif

                       
                        <label for="contrato_id"><i ></i> Tipo de rol:</label><br>
                        <div class="input-group mb-3">
                        <select name="rol" id="rol" class="form-control">
                                  @foreach($roles as $rol)
                                      <option value="{{ $rol->id }}" {{ $usuario->roles->contains('id', $rol->id) ? 'selected' : '' }}>
                                          {{ $rol->name }}
                                      </option>
                                  @endforeach
                              </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-users"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('role'))
                            <span class="error-message">{{ $errors->first('role') }}</span>
                        @endif

                        
                            
                            <div class="col-4">
                              <button type="submit" id="submitButton2" class="btn btn-danger">Guardar cambios</button>
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
     @endsection
     @section('scripts')
    <script src="{{ asset('js/usuario/modificar_alert.js') }}"></script>
    @endsection