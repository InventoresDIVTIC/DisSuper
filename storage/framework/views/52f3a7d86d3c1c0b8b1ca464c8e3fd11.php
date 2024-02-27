<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Puestos</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <!-- Botón de agregar centrado -->
                <a href="/puestos/create">
                    <button class="btn btn-primary btn-block" type="button">
                        <i class="fas fa-plus"></i> Agregar Puestos
                    </button>
                </a>
            </div>
        </div>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Clave</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Empresa-Proceso</th>
                <th class="text-center">Area de Responsabilidad</th>
                <th class="text-center">Rama de Actividad</th>
                <th class="text-center">Especialidad</th>
                <th class="text-center">Zona</th>
                <th class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($puesto->id); ?></td>
                    <td><?php echo e($puesto->clave_puesto); ?></td>
                    <td><?php echo e($puesto->nombre); ?></td>
                    <td><?php echo e($puesto->empresa_proceso); ?></td>
                    <td><?php echo e($puesto->area_responsabilidad); ?></td>
                    <td><?php echo e($puesto->rama_actividad); ?></td>
                    <td><?php echo e($puesto->especialidad); ?></td>
                    <td><?php echo e($puesto->zona->nombre_zona); ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="<?php echo e(route('puestos.show', $puesto->id)); ?>" type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Ver Funciones
                            </a>
                            <form action="<?php echo e(route('puestos.destroy', $puesto->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este puesto?')">
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

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\puestos\viewPuestos.blade.php ENDPATH**/ ?>