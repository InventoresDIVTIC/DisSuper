  <?php $__env->startSection('content'); ?>

  <style src="<?php echo e(secure_asset('dist/css/hallazgosIndicadores.css')); ?>"></style>

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
                <h3 class="profile-username text-center">Nombre: <?php echo e($empleado->nombre_Empleado); ?></h3>
                <p class="text-muted text-center">RPE:<?php echo e($empleado->RPE_Empleado); ?>

                   
                </p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Zona de Trabajo: </b>
                    <?php if($empleado->zonas->count() > 0): ?>
                                    <?php $__currentLoopData = $empleado->zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($zona->nombre_zona); ?>

                                        <?php if(!$loop->last): ?>
                                            ,
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    Sin zona asignada
                                <?php endif; ?>
                  </li>
                  <li class="list-group-item">
                    <b>Encargado de la Zona: </b> 
                    <?php if($empleado->zonas->count() > 0 && $empleado->zonas->first()->encargado): ?>
                                    <?php echo e($empleado->zonas->first()->encargado->name); ?>

                                <?php else: ?>
                                    Sin encargado asignado
                                <?php endif; ?>
                  </li>
                  <li class="list-group-item">
                  <b>Fecha de Ingreso: <?php echo e($empleado->fecha_ingreso); ?></b>
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
                  
                  <div class="active tab-pane" id="InformacionGeneral">
                    <div class="card-body">
                      
                      <div class="row">
                      <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                              <div class="info-box-content">
                                  <span class="info-box-text text-center text-muted">Rendición de Cuentas</span>
                                  <span class="info-box-number text-center text-muted mb-0"><?php echo e($contadorRendicionCuentas); ?></span>
                              </div>
                          </div>
                      </div>

                      <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                              <div class="info-box-content">
                                  <span class="info-box-text text-center text-muted">Llamadas de Atención</span>
                                  <span class="info-box-number text-center text-muted mb-0"><?php echo e($contadorLlamadasAtencion); ?></span>
                              </div>
                          </div>
                      </div>

                      <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                              <div class="info-box-content">
                                  <span class="info-box-text text-center text-muted">Actas Administrativas</span>
                                  <span class="info-box-number text-center text-muted mb-0"><?php echo e($contadorActasAdministrativas); ?></span>
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
                            <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($documento->id); ?></td>
                                    <td><?php echo e($documento->Fecha_Actividad); ?></td>
                                    <td><?php echo e($documento->Tipo_Documento); ?></td>
                                    <td><?php echo e($documento->emisor->name); ?></td>
                                    <td><?php echo e($documento->receptor->name); ?></td>
                                    <td><?php echo e($documento->Status_Documento); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('download.pdf', ['id' => $documento->id])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-primary btn-sm btn-block">
                                                <i class="fas fa-download"></i> Descargar
                                            </button>
                                        </form>
                                        <button onclick="copiarDatos('<?php echo e($documento->contenido); ?>', '<?php echo e($documento->Introduccion); ?>')" class="btn btn-danger btn-sm btn-block">
                                            <i class="fas fa-copy"></i> Copiar
                                        </button>
                                    </td>
                                  

                                    <td>
                                        <?php if($documento->Status_Documento !== 'ACEPTADO' && $documento->Status_Documento !== 'CANCELADO' && Auth::id() === $documento->Id_Usuario_Revisar && $documento->Status_Documento !== 'EN EDICION'): ?>
                                            <form action="<?php echo e(route('cambiar.estado', ['id' => $documento->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i> Aceptar
                                                </button>
                                            </form>
                                        <?php elseif($documento->Status_Documento === 'ACEPTADO' && Auth::id() === $documento->Id_Usuario_Revisar): ?>
                                            <!-- Si el documento ya está aceptado, mostrar un mensaje o simplemente un texto -->
                                            <span><i class="fas fa-check-circle"></i> Documento aceptado</span>
                                        <?php else: ?>
                                            <!-- Otro mensaje si el usuario no es el destinatario -->
                                        <?php endif; ?>

                                        <?php if($documento->Status_Documento === 'CANCELADO' && (Auth::id() === $documento->Id_Usuario_Autor || Auth::id() === $documento->Id_Usuario_Revisar)): ?>
                                            <!-- Botón para ver el comentario cancelado -->
                                            <button class="btn btn-info btn-sm" onclick="verComentarioCancelado('<?php echo e($documento->comentario_cancelado); ?>')">
                                                <i class="fas fa-comment"></i> Ver comentario
                                            </button>

                                            <!-- Script para mostrar el comentario cancelado en una alerta -->
                                            <script>
                                                function verComentarioCancelado(comentario) {
                                                    // Muestra una alerta con el comentario cancelado
                                                    alert("Comentario Cancelado: " + comentario);
                                                }
                                            </script>
                                        <?php endif; ?>

                                        <?php if($documento->Status_Documento !== 'EN EDICION' && $documento->Status_Documento !== 'CANCELADO' && Auth::id() === $documento->Id_Usuario_Revisar && $documento->Status_Documento !== 'ACEPTADO' ): ?>
                                            <form action="<?php echo e(route('rechazar.documento', ['id' => $documento->id])); ?>" method="POST" onsubmit="return validarRechazoFormulario()">
                                                <?php echo csrf_field(); ?>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="mostrarComentario()">
                                                    <i class="fas fa-times"></i> Rechazar
                                                </button>
                                                <div id="comentarioContainer" style="display: none;">
                                                    <label for="comentarioRechazo">Comentario de rechazo:</label>
                                                    <textarea name="comentarioRechazo" PLACEHOLDER="Escriba aqui el por que esta rechazando el documento"id="comentarioRechazo" rows="4" cols="50" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-sm" id="btnRechazar" style="display: none;">
                                                    <i class="fas fa-times"></i> Confirmar Rechazo
                                                </button>
                                            </form>
                                        
                                        <?php elseif($documento->Status_Documento === 'EN EDICION' && Auth::id() === $documento->Id_Usuario_Revisar): ?>
                                            <!-- Si el documento ya está en edición, mostrar un mensaje o simplemente un texto -->
                                            <span><i class="fas fa-edit"></i> Documento enviado a revisión</span>
                                        <?php else: ?>
                                            <!-- Otro mensaje si el usuario no es el destinatario -->
                                        <?php endif; ?>
                                        <script>
                                            function mostrarComentario() {
                                                // Muestra el contenedor de comentario y el botón de confirmar rechazo
                                                document.getElementById('comentarioContainer').style.display = 'block';
                                                document.getElementById('btnRechazar').style.display = 'inline';
                                            }

                                            function validarRechazoFormulario() {
                                                // Validar que el campo de comentario no esté vacío
                                                var comentarioRechazo = document.getElementById('comentarioRechazo').value;
                                                if (comentarioRechazo.trim() === "") {
                                                    alert('Debes escribir un comentario para rechazar el documento.');
                                                    return false;
                                                }

                                                return true;
                                            }
                                        </script>

                                        <?php if($documento->Status_Documento === 'EN EDICION' && Auth::id() === $documento->Id_Usuario_Autor): ?>
                                            <!-- Si el documento está en EDICION y el usuario es el autor, mostrar botón de Editar -->
                                            <a href="<?php echo e(route('editar.documento', ['id' => $documento->id])); ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <!-- Si el documento está RECHAZADO y el usuario es el autor, mostrar enlace para ver el comentario -->
                                            <a href="#" class="btn btn-info btn-sm" onclick="verComentario('<?php echo e($documento->comentario_rechazado); ?>')">
                                                <i class="fas fa-comment"></i> Ver Nota
                                            </a>

                                            <!-- Script para mostrar el comentario en una alerta al hacer clic en el enlace -->
                                            <script>
                                                function verComentario(comentario) {
                                                    // Muestra una alerta con el comentario
                                                    alert("Comentario: " + comentario);
                                                }
                                            </script>
                                        <?php endif; ?>

                                        <div class="container">
                                            <?php if(Auth::user()->roles[0]['nivel_permisos'] < 1 && $documento->Status_Documento !== 'CANCELADO' && $documento->Status_Documento !== 'ACEPTADO' && $documento->Status_Documento !== 'EN EDICION'): ?>
                                                <form action="<?php echo e(route('cancelar.documento', ['id' => $documento->id])); ?>" method="POST" onsubmit="return validarFormulario()">
                                                    <?php echo csrf_field(); ?>
                                                   
                                                    <textarea name="comentario" id="comentario"placeholder="Escribe aqui el porque de la cancelación del documento" rows="4" cols="50" required style="display: none;"></textarea>
                                                    <button type="button" class="btn btn-warning btn-sm" onclick="mostrarMotivo()">
                                                        <i class="fas fa-times-circle"></i> Cancelar
                                                    </button>
                                                    <button type="submit" id="btnCancelar" style="display: none;">Confirmar Cancelación</button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                        <script>
                                            function mostrarMotivo() {
                                                // Muestra el cuadro de texto y oculta el botón de cancelar inicial
                                                document.getElementById('comentario').style.display = 'block';
                                                document.getElementById('btnCancelar').style.display = 'inline';
                                            }

                                            function validarFormulario() {
                                                // Validar que el campo de comentario no esté vacío
                                                var comentario = document.getElementById('comentario').value;
                                                if (comentario.trim() === "") {
                                                    alert('Debes escribir un comentario para cancelar el documento.');
                                                    return false;
                                                }

                                                return true;
                                            }
                                        </script>

                                </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td><?php echo e($documento->Fecha_Actividad); ?></td>
                                  <td><?php echo e($documento->Tipo_Documento); ?></td>
                                  <td><?php echo e($documento->emisor->name); ?></td>
                                  <td><?php echo e($documento->receptor->name); ?></td>
                                  <td><?php echo e($documento->Status_Documento); ?></td>
                                  <td>
                                    <a href="<?php echo e(secure_asset($documento->nombre_archivo)); ?>">Descargar</a>

                                  </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                      <form method="POST" action="/guardar-documento"id="subirForm" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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
                                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($usuario->id !== auth()->user()->id && $usuario->id !== 1 &&$usuario->RPE_Empleado !== $empleado->RPE_Empleado): ?> 
                                            <option value="<?php echo e($usuario->id); ?>"><?php echo e($usuario->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <input type="hidden" name="Id_Empleado" id="Id_Empleado" value="<?php echo e($empleado->id); ?>">
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





















                      <div class="tab-pane" id="GenerarLlA">
                    <form action="<?php echo e(url('/procesar-formulario')); ?>"id="llamadaAtencionForm" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="text-primary col-md-12">
                                <!-- Encabezado del formulario -->
                                <label class="col-sm-12 text-center"><h3>Generar Llamada de Atención</h3></label>
                            </div>
                        </div>
                    
                        <button type="button" onclick="pegarDatos()" class="btn btn-primary">Pegar Datos</button><br><br>

                        <!-- Campos del primer indicador -->
                        <div class="form-group row">
                            
                        <label for="N_Llamada" class="col-sm-1.8 col-form-label">N. Llamada</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="N_Llamada" name="N_Llamada" placeholder="N. llamada" value="<?php echo e(old('N_Llamada')); ?>">
                        </div>
                        <?php $__errorArgs = ['N_Llamada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <label class="col-sm-1.5 col-form-label">Actividad</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="Actividad" name="Actividad" placeholder="Actividad">
                            </div>
                            <?php if($errors->has('Actividad')): ?>
                                <span class="error-message"><?php echo e($errors->first('Actividad')); ?></span>
                            <?php endif; ?>

                            <label class="col-sm-1.5 col-form-label">Fecha</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="Fecha_Actividad" name="Fecha_Actividad" placeholder="Fecha">
                            </div>
                        </div>


                        <input type="hidden" name="Id_Empleado" id="Id_Empleado" value="<?php echo e($empleado->id); ?>">
                        <input type="hidden" name="Tipo_Documento" id="Tipo_Documento" value="LLAMADA DE ATENCION">
                        <input type="hidden" name="Status_Documento" id="Status_Documento" value="ENVIADO">
                        
                        <!-- Introducción del primer indicador -->
                        <div class="form-group row">
                            <label for="inputCargo" class="col-sm-12 col-form-label">Introducción</label>
                            <div class="col-sm-12">
                                <textarea class="form-control"id="Introduccion"name="Introduccion" rows="3" placeholder="Explique de manera general el motivo de la Rendición de Cuentas"></textarea>
                            </div>
                            <?php if($errors->has('Introduccion')): ?>
                                <span class="error-message"><?php echo e($errors->first('Introduccion')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group row">
                            <label for="inputCargo" class="col-sm-12 col-form-label">Explicación</label>
                            <div class="col-sm-12">
                                <textarea class="form-control"id="contenido"name="contenido" rows="11" placeholder="Explique de manera detallada y especifica el motivo de la Rendición de Cuentas"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1.9 col-form-label">Imagen de prueba:  </label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                            
                                    <input class="form-control" type="file" id="imagen" name="imagen"onchange="mostrarNombre()" multiple>
                                </div>
                                <span id="ArchivoSeleccionado"></span>
                            </div>
                        </div>
                        <script>
                            function mostrarNombre() {
                                const input2 = document.getElementById('imagen');
                                const nombreArchivo2 = input2.files[0].name;
                                const label2 = document.querySelector('.custom-file-label');
                                label2.innerText = nombreArchivo2;
                                document.getElementById('ArchivoSeleccionado').innerText = 'Nombre del archivo: ' + nombreArchivo2;
                            }
                        </script>







                        <div class="form-group row">
                            <label for="inputCargo" class="col-sm-2 col-form-label">Usuario a mandar a revisión</label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                <select class="form-control" id="Id_Usuario_Revisar" name="Id_Usuario_Revisar">
                                  <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($usuario->id !== auth()->user()->id && $usuario->id !== 1 &&$usuario->RPE_Empleado !== $empleado->RPE_Empleado): ?> 
                                          <option value="<?php echo e($usuario->id); ?>"><?php echo e($usuario->name); ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                  
                    <form method="POST"id="tuFormularioId" action="<?php echo e(route('empleado.update', $empleado->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PATCH'); ?>
                        
                          <input type="hidden" class="form-control" id="RPE_Empleado" maxlength="5" value="<?php echo e($empleado->RPE_Empleado); ?>" name="RPE_Empleado" placeholder="RPE">
                        

                        <div class="form-group">
                          <label for="nombre_Empleado"><i class="fas fa-user"></i> Nombre:</label>
                          <input type="text" class="form-control" id="nombre_Empleado" name="nombre_Empleado"value="<?php echo e($empleado->nombre_Empleado); ?>" placeholder="Nombre">
                        </div>
                        <?php if($errors->has('nombre_Empleado')): ?>
                            <span class="error-message"><?php echo e($errors->first('nombre_Empleado')); ?></span>
                        <?php endif; ?>

                        <div class="form-group">
                          <label for="contrato_id"><i class="fas fa-file-contract"></i> Contrato:</label>
                          <select name="contrato" id="contrato" class="form-control">
                                <?php $__currentLoopData = $contratos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($contrato->id); ?>" <?php echo e($empleado->contrato_id == $contrato->id ? 'selected' : ''); ?>>
                                        <?php echo e($contrato->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php if($errors->has('contrato')): ?>
                              <span class="error-message"><?php echo e($errors->first('contrato')); ?></span>
                          <?php endif; ?>
                        


                        <label for="zonas"><i ></i> Selecciona una Zona:</label><br>
                          <div class="input-group mb-3">
                              <select id="zonas" name="zonas[]" class="form-control <?php $__errorArgs = ['zona'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                  <?php $__currentLoopData = $zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($zona->id); ?>" <?php echo e(in_array($zona->id, $empleado->zonas->pluck('id')->toArray()) ? 'selected' : ''); ?>>
                                      <?php echo e($zona->nombre_zona); ?>

                                  </option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-users"></span>
                                  </div>
                              </div>
                          </div>
                          <?php if($errors->has('zona')): ?>
                              <span class="error-message"><?php echo e($errors->first('zona')); ?></span>
                          <?php endif; ?>




                        <div class="form-group">
                          <label for="fecha_ingreso"><i class="fas fa-calendar"></i> Fecha Ingreso:</label>
                          <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso"value="<?php echo e($empleado->fecha_ingreso); ?>" required>
                        </div>
                        <?php if($errors->has('fecha_ingreso')): ?>
                            <span class="error-message"><?php echo e($errors->first('fecha_ingreso')); ?></span>
                        <?php endif; ?>


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
<script src="<?php echo e(secure_asset('dist/js/slidebar.js')); ?>"></script>
<script src="<?php echo e(secure_asset('dist/js/mostrarHallazgos.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\empleados\show.blade.php ENDPATH**/ ?>