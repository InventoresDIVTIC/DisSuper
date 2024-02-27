<?php $__env->startSection('content'); ?>
<body class="hold-transition register-page">
    <div class="form-container"> <!-- Agrega la clase form-container aquí -->
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                <a href="<?php echo e(url('/index')); ?>" class="h1"><b>Dis</b>Super</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Registrar nuevo miembro</p>
                    <form action="<?php echo e(route('register')); ?>" method="post" id="form-registro">
                        <?php echo csrf_field(); ?>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Nombre completo" value="<?php echo e(old('name')); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('name')): ?>
                            <span class="error-message"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>

                        
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Correo Electrónico" value="<?php echo e(old('email')); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('email')): ?>
                            <span class="error-message"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="RPE_Empleado" id="RPE_Empleado" placeholder="RPE (max. 5 caracteres)" maxlength="5" value="<?php echo e(old('RPE_Empleado')); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('RPE_Empleado')): ?>
                            <span class="error-message"><?php echo e($errors->first('RPE_Empleado')); ?></span>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="fecha_registro" placeholder="Fecha de ingreso" value="<?php echo e(old('fecha_registro')); ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('fecha_registro')): ?>
                            <span class="error-message"><?php echo e($errors->first('fecha_registro')); ?></span>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <select name="contrato" id="contrato" class="form-control"placeholder="Nombre completo">
                                <?php $__currentLoopData = $contratos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($contrato->id); ?>"><?php echo e($contrato->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-file-contract"></span>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('contrato')): ?>
                            <span class="error-message"><?php echo e($errors->first('contrato')); ?></span>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('password')): ?>
                            <span class="error-message"><?php echo e($errors->first('password')); ?></span>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <select class="form-control" name="role">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($role->id !== 1): ?> <!-- Excluir el rol con ID igual a 1 -->
                                        <option value="<?php echo e($role->id); ?>" <?php echo e(old('role') == $role->id ? 'selected' : ''); ?>>
                                            <?php echo e($role->name); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php if($errors->has('role')): ?>
                            <span class="error-message"><?php echo e($errors->first('role')); ?></span>
                        <?php endif; ?>


                        <div class="input-group mb-3">
                            <select id="zonas" name="zonas" class="form-control <?php $__errorArgs = ['zonas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__currentLoopData = $zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($zona->id); ?>"><?php echo e($zona->nombre_zona); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php if($errors->has('zona_id')): ?>
                            <span class="error-message"><?php echo e($errors->first('zona_id')); ?></span>
                        <?php endif; ?>


                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        Acepto los  <a href="#">términos</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block" id="submitButton" enable>Registrar</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        document.getElementById('form-registro').addEventListener('submit', function(event) {
                            // Verifica si el checkbox de términos y condiciones está marcado
                            if (!document.getElementById('agreeTerms').checked) {
                                // Si no está marcado, evita que el formulario se envíe y muestra un mensaje de error
                                event.preventDefault();
                                alert('Debes aceptar los términos y condiciones antes de enviar el formulario.');
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo e(secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(secure_asset('dist/js/adminlte.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\auth\register.blade.php ENDPATH**/ ?>