<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Administrar Roles de Usuarios</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Rol Actual</th>
                    <th>Cambiar Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->role->name); ?></td>
                        <td>
                            <form action="<?php echo e(route('admin.updateRole', $user->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <select name="role_id" class="form-control">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>" <?php echo e($user->role_id == $role->id ? 'selected' : ''); ?>>
                                            <?php echo e($role->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\admin\roles.blade.php ENDPATH**/ ?>