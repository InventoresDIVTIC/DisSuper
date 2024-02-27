<?php $__env->startSection('content'); ?>
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <?php if($usuario->photo): ?>
                                <img id="profile-image" class="profile-user-img img-fluid img-circle"
                                    src="<?php echo e($photoUrl); ?>" alt="Foto de perfil">
                            <?php else: ?>
                                <img id="profile-image" class="profile-user-img img-fluid img-circle"
                                    src="<?php echo e(secure_asset('dist/img/D.png')); ?>" alt="Foto de perfil por defecto">
                            <?php endif; ?>
                        </div>

                        <h3 class="profile-username text-center">Nombre: <?php echo e($usuario->name); ?></h3>
                        <p class="text-muted text-center">Rol: <?php echo e($usuario->roles->first()->name); ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Zona de Trabajo:</b>
                                <?php if($usuario->zonas->count() > 0): ?>
                                    <?php $__currentLoopData = $usuario->zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <b>Encargado de la Zona:</b>
                                <?php if($usuario->zonas->count() > 0 && $usuario->zonas->first()->encargado): ?>
                                    <?php echo e($usuario->zonas->first()->encargado->name); ?>

                                <?php else: ?>
                                    Sin encargado asignado
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item">
                                <b>Fecha de Ingreso: <?php echo e($usuario->fecha_registro); ?></b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

                <!-- Contenido Principal -->
            <div class="col-md-9">
                <div class="card">
                    
                        
                    <div class="card-body">
                        <div class="tab-content">
                           

                            
                                <h2>Modificar Usuario: <?php echo e(strtoupper($usuario->name)); ?></h2><br><br>
                                <form method="POST" id="tuFormularioId2" action="<?php echo e(route('usuario.update', $usuario->id)); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <label for="contrato_id"><i ></i> Foto de perfil:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="file" name="photo" id="photo" accept="image/*"
                                            value="<?php echo e($usuario->pho); ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="contrato_id"><i ></i> Nombre:</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="name" placeholder="Nombre completo"
                                                value="<?php echo e($usuario->name); ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="error-message"><?php echo e($errors->first('name')); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div>
                                        <label for="contrato_id"><i ></i> Email:</label><br>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" name="email" placeholder="Correo Electrónico"
                                                value="<?php echo e($usuario->email); ?>">
                                            <div class="input-group-append">
                                                <div class= "input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($errors->has('email')): ?>
                                            <span class="error-message"><?php echo e($errors->first('email')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    
                                   
                                   
                                    <input type="hidden" class="form-control" name="RPE_Empleado" placeholder="RPE (max. 5 caracteres)" maxlength="5" value="<?php echo e($usuario->RPE_Empleado); ?>">
                                        
                                    <div>
                                        <label for="contrato_id"><i ></i> Fecha de registro:</label><br>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" name="fecha_registro" placeholder="Fecha de ingreso" value="<?php echo e($usuario->fecha_registro); ?>" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($errors->has('fecha_registro')): ?>
                                            <span class="error-message"><?php echo e($errors->first('fecha_registro')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div>
                                        <label for="contrato_id"><i ></i> Tipo de contrato:</label><br>
                                        <div class="input-group mb-3">
                                            <select name="contrato" id="contrato" class="form-control">
                                                <?php $__currentLoopData = $contratos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($contrato->id); ?>" <?php echo e($usuario->contrato_id == $contrato->id ? 'selected' : ''); ?>>
                                                        <?php echo e($contrato->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-file-contract"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div>
                                        <label for="contrato_id"><i ></i> Tipo de rol:</label><br>
                                        <div class="input-group mb-3">
                                            <select name="rol" id="rol" class="form-control">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($rol->id); ?>" <?php echo e($usuario->roles->contains('id', $rol->id) ? 'selected' : ''); ?>>
                                                        <?php echo e($rol->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-users"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div>
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
                                                    <option value="<?php echo e($zona->id); ?>" <?php echo e(in_array($zona->id, $usuario->zonas->pluck('id')->toArray()) ? 'selected' : ''); ?>>
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
                                        
                                    </div>
                                 
                                    
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
  <!-- /.container-fluid -->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\usuarios\show.blade.php ENDPATH**/ ?>