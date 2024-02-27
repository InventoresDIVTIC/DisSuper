<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Indicadores</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
    <div class="row">
    <div class="col-md-6 offset-md-3 text-center">
    <label for="indicador" class="text-center">Elige un nuevo indicador:</label>
        <form action="<?php echo e(route('actividades.update', $actividades->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group text-center">
                
                <div class="input-group">
                    <select name="indicador" id="indicador" class="form-control">
                        <option value="" disabled selected>Selecciona un indicador</option>
                        <?php $__currentLoopData = $indicadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($indicador->id); ?>"><?php echo e($indicador->Nombre_Indicador); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-plus"></i> Agregar Indicador
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
        
        <br>
        <br>
        <table id="tablContratos" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Clave de actividad</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $indicadoresAsociados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($indicador->id); ?></td>
                        <td><?php echo e($indicador->Clave_Indicador); ?></td>
                        <td><?php echo e($indicador->Nombre_Indicador); ?></td>
                        <td class="text-center">
                        <form action="<?php echo e(route('actividades.eliminarIndicador', ['actividad' => $actividades->id, 'indicador' => $indicador->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta relación?')">Eliminar Relación</button>
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
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\actividades\viewIndicadores.blade.php ENDPATH**/ ?>