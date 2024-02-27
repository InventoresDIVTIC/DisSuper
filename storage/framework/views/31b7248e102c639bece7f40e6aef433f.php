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
                <!-- Botón de agregar centrado -->
                <a href="/indicadores/create">
                    <button class="btn btn-primary btn-block" type="button">
                        <i class="fas fa-plus"></i> Agregar indicador
                    </button>
                </a>
            </div>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="10%">Clave</th>
                    <th width="50%">Nombre</th>
                    <th width="10%">Valor Aceptable</th>


                    <th class="text-center" width="20%">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $indicador; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicadores): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($indicadores->Clave_Indicador); ?></td>
                        <td><?php echo e($indicadores->Nombre_Indicador); ?></td>
                        <td><?php echo e($indicadores->Valor_Aceptable); ?>%</td>
                        <td class="text-center">
                        <div class="btn-group">
                            <a href="<?php echo e(route('indicadores.edit', $indicadores->id)); ?>"type="button" class="btn btn-primary btn-sm">

                                <i class="fas fa-eye"></i> Modificar
                            </a>
                            <form action="<?php echo e(route('indicadores.destroy', $indicadores->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este Indicador de forma permanente?')">
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

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\indicadores\index.blade.php ENDPATH**/ ?>