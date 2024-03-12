<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h3>Listado de empleados</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <!-- Botón de agregar centrado -->
                <a href="/empleado/create">
                    <button class="btn btn-primary btn-block" type="button">
                        <i class="fas fa-plus"></i> Agregar Empleado
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
                    <th>Tipo de contrato</th>
                    <th>Zona</th>
                    <th>Fecha de ingreso</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="
                <?php if($empleado->documentos->where('Status_Documento', 'ENVIADO')->isNotEmpty() && Auth::id() === $empleado->documentos->where('Status_Documento', 'ENVIADO')->first()->Id_Usuario_Revisar): ?>
                    bg-custom
                <?php elseif($empleado->documentos->where('Status_Documento', 'ACEPTADO')->isNotEmpty() && Auth::id() === $empleado->documentos->where('Status_Documento', 'ACEPTADO')->first()->Id_Usuario_Autor): ?>
                    bg-custom2
                <?php elseif($empleado->documentos->where('Status_Documento', 'EN EDICION')->isNotEmpty() && Auth::id() === $empleado->documentos->where('Status_Documento', 'EN EDICION')->first()->Id_Usuario_Autor): ?>
                    bg-custom3
                <?php endif; ?>
            ">
                    <td class="text-center"><?php echo e($empleado->id); ?></td>
                    <td class="text-center"><?php echo e($empleado->RPE_Empleado); ?></td>
                    <td class="text-center"><?php echo e($empleado->nombre_Empleado); ?></td>
                    <td class="text-center"><?php echo e($empleado->contrato->name); ?></td>
                    <td class="text-center">
                        <?php $__currentLoopData = $empleado->zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($zona->nombre_zona); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="text-center"><?php echo e($empleado->fecha_ingreso); ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="/empleado/<?php echo e($empleado->id); ?>" type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Ver perfil
                            </a>
                            <form action="/empleado/<?php echo e($empleado->id); ?>" method="POST" style="display: inline-block;">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center">No se encontraron empleados.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>


       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views/index.blade.php ENDPATH**/ ?>