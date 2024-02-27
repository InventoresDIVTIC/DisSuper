<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Contratos<h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <!-- Botón de agregar centrado -->
                <div class="text-center">
                    <form action="<?php echo e(route('contratos.store')); ?>" method="POST" class="form-inline">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <input class="form-control" id="nombreNuevoContrato" name="nombreNuevoContrato" placeholder="Nombre del Nuevo Contrato" style="width: 500px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-plus"></i> Agregar contrato
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        <br>


        
        <br>
        <table id="tablContratos" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $contratos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($contrato->id); ?></td>
                    <td class="text-center"><?php echo e($contrato->name); ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <form action="<?php echo e(route('contratos.destroy', $contrato->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este contrato?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
        <br><br><br>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\contratos\verContratos.blade.php ENDPATH**/ ?>