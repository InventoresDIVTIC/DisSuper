<?php $__env->startSection('content'); ?>
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


<div class="col-md-9">
    <div class="card card-primary card-outline">
        <div class="row">
            <div class="col-md-1">
            </div>


            <div class="col-md-10" >

                <form action="<?php echo e(route('guardar_edicion', ['id' => $documento->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="text-primary col-md-12">
                            <!-- Encabezado del formulario -->
                            <label class="col-sm-12 text-center"><h3><br>Generar Documento</h3></label>
                        </div>
                    </div>
                
                    
                    <div class="form-group row">
                        <label class="col-sm-1.8 col-form-label">N. Documento</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="N_Llamada" name="N_Llamada" placeholder="N. llamada" value="<?php echo e($documento->N_Llamada); ?>">
                        </div>

                        <label class="col-sm-1.5 col-form-label">Actividad</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="Actividad" name="Actividad" placeholder="Actividad"value="<?php echo e($documento->Actividad); ?>">
                        </div>

                        <label class="col-sm-1.5 col-form-label">Fecha</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="Fecha_Actividad" name="Fecha_Actividad" placeholder="Fecha" value="<?php echo e($documento->Fecha_Actividad); ?>">
                        </div>
                    </div>


                    <input type="hidden" name="Id_Empleado" id="Id_Empleado" value="<?php echo e($empleado->id); ?>">
                    <input type="hidden" name="Tipo_Documento" id="Tipo_Documento" value="LLAMADA DE ATENCION"value="<?php echo e($documento->Tipo_Documento); ?>">
                    <input type="hidden" name="Status_Documento" id="Status_Documento" value="ENVIADO" >
                    
                    <!-- Introducción del primer indicador -->
                    
                    <div class="form-group row">
                        <label for="inputCargo" class="col-sm-10 col-form-label">Introducción</label>
                        
                        <div class="col-sm-10 text-center">
                            <textarea class="form-control"id="Introduccion"name="Introduccion" rows="3" placeholder="Explique de manera general el motivo de la Rendición de Cuentas"><?php echo e($documento->Introduccion); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCargo" class="col-sm-12 col-form-label">Contenido</label>
                        <div class="col-sm-12">
                            <textarea class="form-control"id="contenido"name="contenido" rows="11" placeholder="Explique de manera detallada y especifica el motivo de la Rendición de Cuentas"><?php echo e($documento->contenido); ?></textarea>
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <label for="inputCargo" class="col-sm-2 col-form-label">Usuario a mandar a revisión</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                            <select class="form-control" id="Id_Usuario_Revisar" name="Id_Usuario_Revisar">
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($usuario->id !== auth()->user()->id && $usuario->id !== 1 &&$usuario->RPE_Empleado !== $empleado->RPE_Empleado): ?> 
                                    <option value="<?php echo e($usuario->id); ?>" <?php if($usuario->id === $documento->Id_Usuario_Revisar): ?> selected <?php endif; ?>><?php echo e($usuario->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\empleados\editar_llamada.blade.php ENDPATH**/ ?>