@extends('layouts.nav')

@section('content')
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($usuario->photo)
                                <img id="profile-image" class="profile-user-img img-fluid img-circle"
                                    src="{{ $photoUrl }}" alt="Foto de perfil">
                            @else
                                <img id="profile-image" class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('dist/img/D.png') }}" alt="Foto de perfil por defecto">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">Nombre: {{ $usuario->name }}</h3>
                        <p class="text-muted text-center">Rol: {{ $usuario->roles->first()->name }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Zona de Trabajo:</b>
                                @if ($usuario->zonas->count() > 0)
                                    @foreach ($usuario->zonas as $zona)
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
                                <b>Encargado de la Zona:</b>
                                @if ($usuario->zonas->count() > 0 && $usuario->zonas->first()->encargado)
                                    {{ $usuario->zonas->first()->encargado->name }}
                                @else
                                    Sin encargado asignado
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Fecha de Ingreso: {{ $usuario->fecha_registro }}</b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

                <!-- Contenido Principal -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item" style="width: 15%"><a class="nav-link active text-center" href="#InformacionGeneral" data-toggle="tab">Información General</a></li>
                            <li class="nav-item" style="width: 18%"><a class="nav-link text-center" href="#Documentos" data-toggle="tab">Documentos</a></li>
                            <li class="nav-item" style="width: 13%"><a class="nav-link text-center" href="#ModInfo" data-toggle="tab">Modificar</a></li>
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
                                                    <td><button type="button"
                                                            class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                                                </tr>
                                                <tr>
                                                    <td>11-7-2014</td>
                                                    <td>Acta Administrativa</td>
                                                    <td>El Admin</td>
                                                    <td>Revisado</td>
                                                    <td><button type="button"
                                                            class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                                                </tr>
                                                <tr>
                                                    <td>11-7-2014</td>
                                                    <td>Llamada de Atención</td>
                                                    <td>El Admin</td>
                                                    <td>Cancelado</td>
                                                    <td><button type="button"
                                                            class="btn btn-block btn-primary btn-sm">Abrir</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Listado de Documentos --}}
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
                                    <form class="form-horizontal">
                                      <div class="form-group row">
                                        <div class="text-primary col-md-12"> 
                                          <label class="col-sm-12 text-center"><h3>Generar Llamada de Atención</h3></label>
                                        </div>
                                      </div>
                
                                      <div class="form-group row">
              
                                        <label class="col-sm-1.8 col-form-label">N. Llamada</label>
                                        <div class="col-sm-3">
                                          <input type="number" class="form-control" id="inputNLlamada" placeholder="N. llamada">
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
                  
                                      <div class="form-group row">
                                        <label for="inputCargo" class="col-sm-12 col-form-label">Introducción</label>
                                        <div class="col-sm-12">
                                          <textarea class="form-control" rows="3" placeholder="Explique de manera general el motivo de la Rendición de Cuentas"></textarea>
                                        </div>
                                      </div>
              
                
                                      <div class="row">
                                        <label class="col-md-11 text-center col-form-label">Indicadores</label>
                                        <div class="row text-right">
                                          <div class="col-md-2">
                                            <button class="btn add-btn btn-info" id="addIndicador">+</button>
                                          </div>
                                        </div>
                                      </div>
                
                                      <div class="Indicadores">
            
                                        <div class="form-group row">
                                          <label class="col-sm-2 col-form-label"> Nombre del Indicador 1</label>
                                          <div class="col-md-9">
                                            <input type="string" class="form-control" placeholder="Nombre del Indicador">
                                            
                                          </div>
                                        </div>
            
                                        <div class="row">
                                          <label class="col-md-11 text-center col-form-label">Hallazgos del Indicador</label>
                                          <div class="row text-right">
                                            <div class="col-md-2">
                                              <button class="btn add-btn btn-info" id="addHallazgo">+</button>
                                            </div>
                                          </div>
                                        </div>
            
                                        <div class="Hallazgos">
                                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Hallazgo 1</label>
                                            <div class="col-md-9">
                                              <textarea rows="3" class="form-control" placeholder="Explique sus Hallazgos"> </textarea>
                                            </div>
                                          </div>
                                        
            
                                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Evidencia</label>
                                            <div class="col-sm-9">
                                              <div class="input-group">
                                                <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="customFile">
                                                  <label class="custom-file-label" for="customFile">Imagen de Evidencia</label>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-1">
                                              <button class="btn add-btn btn-danger" id="removeHallazgo">-</button>
                                            </div>
                                          </div>
            
                                          
                                      </div>
            
                                        <div class="form-group row">
                                          <label class="col-sm-2 col-form-label"> Sistemas de Referencia</label>
                                          <div class="col-md-9">
                                            <input type="string" class="form-control" placeholder="Sistemas de Referenciar">
                                            
                                          </div>
                                        </div>
            
                                        <div class="form-group row">
                                          <label class="col-md-2 col-form-label"> Valor Alcanzado</label>
                                          <div class="col-md-7">
                                            <span class="irs irs--round js-irs-3">
                                              <span class="irs">
                                                <span class="irs-line" tabindex="0"></span>
                                                <span class="irs-min" style="visibility: visible;">0</span>
                                                <span class="irs-max" style="visibility: hidden;">100</span>
                                                <span class="irs-from" style="visibility: hidden;">0%</span>
                                                <span class="irs-single" style="left: 91.8725%;">100%</span>
                                              </span>
                                              <span class="irs-grid"></span>
                                              <span class="irs-bar irs-bar--single" style="left: 0px; width: 96.8379%;"></span>
                                              <span class="irs-shadow shadow-single" style="display: none;"></span>
                                              <span class="irs-handle single" style="left: 93.6759%;"><i></i><i></i><i></i></span>
                                            </span>
                                            <input id="range_6" type="text" name="range_6" value="" class="irs-hidden-input" tabindex="-1" readonly="">
                                          </div>
                                          <label class="col-md-2 col-form-label text-right"> Valor Esperado "100"</label>
            
                                        </div>
            
                                        <div class="form-group row">
                                          <label class="col-sm-2 col-form-label"> Afectaciones</label>
                                          <div class="col-md-9">
                                            <textarea rows="3" class="form-control" placeholder="Explique las Afectaciones al Indicador"> </textarea>
                                          </div>
                                        </div>
            
                                        <div class="form-group row">
                                          <label class="col-sm-2 col-form-label"> Normas Incumplidas</label>
                                          <div class="col-md-9">
                                            <input type="string" class="form-control" placeholder="Normas Incumplidas">
                                            
                                          </div>
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
                                          <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                      </div>
                  
                                    </form>
                                  </div><!-- /.tab-pane -->
            
            
                                </div><!-- /.tab-content -->
                            </div><!-- /.tab-pane -->

                            <div class="tab-pane" id="ModInfo">
                                <h2>Modificar Usuario: {{ strtoupper($usuario->name) }}</h2><br><br>
                                <form method="POST" id="tuFormularioId2" action="{{ route('usuario.update', $usuario->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <label for="contrato_id"><i ></i> Foto de perfil:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="file" name="photo" id="photo" accept="image/*"
                                            value="{{ $usuario->pho }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="contrato_id"><i ></i> Nombre:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Nombre completo"
                                            value="{{ $usuario->name }}">
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
                                        <input type="email" class="form-control" name="email" placeholder="Correo Electrónico"
                                            value="{{ $usuario->email }}">
                                        <div class="input-group-append">
                                            <div class= "input-group-text">
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
                                        <input type="date" class="form-control" name="fecha_registro" placeholder="Fecha de ingreso" value="{{ $usuario->fecha_registro }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('fecha_registro'))
                                        <span class="error-message">{{ $errors->first('fecha_registro') }}</span>
                                    @endif
                                    <label for="contrato_id"><i ></i> Tipo de contrato:</label><br>
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
                                    <label for="zonas"><i ></i> Selecciona una Zona:</label><br>
                                    <div class="input-group mb-3">
                                        <select id="zonas" name="zonas[]" class="form-control @error('zona') is-invalid @enderror">
                                            @foreach ($zonas as $zona)
                                                <option value="{{ $zona->id }}" {{ in_array($zona->id, $usuario->zonas->pluck('id')->toArray()) ? 'selected' : '' }}>
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
                                    <div class="col-4">
                                        <button type="submit" id="submitButton2" class="btn btn-danger">Guardar cambios</button>
                                    </div>
                                </form>
                            </div> <!-- /.tab-pane -->
                        </div> <!-- /.tab-content -->
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div>  <!-- /.container-fluid -->
</section>
@endsection