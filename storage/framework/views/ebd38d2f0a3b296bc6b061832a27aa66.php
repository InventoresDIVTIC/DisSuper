<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Funciones de Puestos</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
            <div class="col-md-6 offset-md-3 text-center">
            <form action="<?php echo e(route('puestos.update', $puestos->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="input-group">
                    <select name="actividad" id="actividad" class="form-control">
                        <option value="" disabled selected>Elige una nueva función</option>
                        <?php $__currentLoopData = $actividad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividades): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($actividades->id); ?>"><?php echo e($actividades->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-plus"></i> Agregar Función
                        </button>
                    </div>
                </div>
            </form>
            </div>
            </div>
            <?php if(session('error')): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $actividadesAsociadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($actividad->clave); ?></td>
                        <td><?php echo e($actividad->name); ?></td>
                        <td class="text-center">
                            <form action="<?php echo e(route('puestos.detach', ['puesto' => $puestos->id, 'actividad' => $actividad->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger"onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">Eliminar Relación</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br><br><br>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\funciones_puestos\viewFuncionesPuestos.blade.php ENDPATH**/ ?>