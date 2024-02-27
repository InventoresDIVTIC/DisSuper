<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h3>Listado de usuarios</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <!-- Botón de agregar centrado -->
                    <a href="/register">
                        <button class="btn btn-primary btn-block" type="button">
                            <i class="fas fa-plus"></i> Agregar Usuario
                        </button>
                    </a>
                </div>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RPE</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo de contrato</th>
                        <th>Rol</th>
                        <th>Zona</th>
                        <th>Fecha de Registro</th>

                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($users->count() > 0): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($user->id); ?></td>
                                <td class="text-center"><?php echo e($user->RPE_Empleado); ?></td>
                                <td class="text-center"><?php echo e($user->name); ?></td>
                                <td class="text-center"><?php echo e($user->email); ?></td>
                                <td class="text-center">
                                    <?php if($user->contrato): ?>
                                        <?php echo e($user->contrato->name); ?>

                                    <?php else: ?>
                                        Sin contrato asignado
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($user->roles->count() > 0): ?>
                                        <?php echo e($user->roles->first()->name); ?>

                                    <?php else: ?>
                                        Sin rol asignado
                                    <?php endif; ?>
                                </td>
                            

                            
                                <td class="text-center">
                                    <?php if($user->zonas->count() > 0): ?>
                                        <?php $__currentLoopData = $user->zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($zona->nombre_zona); ?>

                                            <?php if(!$loop->last): ?>,
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        Sin zonas asignadas
                                    <?php endif; ?>
                                </td>
                                <td class="text-center"><?php echo e($user->fecha_registro); ?></td>
                            
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?php
                                        $showButtons = $index > 0; // Corregimos aquí para que muestre botones solo si NO es el primer usuario
                                        ?>
                                        <?php if($showButtons): ?>
                                        <a href="<?php echo e(route('usuario.show', ['usuario' => $user->id])); ?>" type="button" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i> Ver perfil
                                        </a>
                                            <form action="<?php echo e(route('usuario.destroy', ['usuario' => $user->id])); ?>" method="POST" style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No se encontraron usuarios.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <br><br><br>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/usuarios_index.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views/usuarios/index.blade.php ENDPATH**/ ?>