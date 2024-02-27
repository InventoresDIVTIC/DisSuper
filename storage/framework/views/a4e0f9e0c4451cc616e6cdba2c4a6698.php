<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 text-center text-info">
                <h3>Zonas</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form id="agregarZonaForm" method="POST" action="<?php echo e(route('zonas.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="nombre_zona">Nombre de la Zona:</label>
                            <input type="text" class="form-control" id="nombre_zona" name="nombre_zona" placeholder="Nombre de la Zona">
                        </div><br>
                        <?php if($errors->has('nombre_zona')): ?>
                            <span class="error-message"><?php echo e($errors->first('nombre_zona')); ?></span>
                        <?php endif; ?>
                        <div class="col-md-6 form-group">
                            <label for="Encargado">Encargado:</label>
                            <select class="form-control" id="Encargado" name="Encargado">
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($usuario->id); ?>"><?php echo e($usuario->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php if($errors->has('Encargado')): ?>
                            <span class="error-message"><?php echo e($errors->first('Encargado')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="col-12"> <!-- Aquí agregamos la clase col-12 -->
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-plus"></i> Agregar Zona
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <br>
                
          
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Encargado</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($zona->id); ?></td>
                            <td><?php echo e($zona->nombre_zona); ?></td>
                            <td><?php echo e($zona->encargado ? $zona->encargado->name : 'Sin encargado'); ?></td>
                            <td class="text-center">
                            <form action="<?php echo e(route('zonas.destroy', $zona->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta zona?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                            
                            <form action="<?php echo e(route('zonas.edit', $zona->id)); ?>" method="GET" style="display: inline-block;">
                                <button class="btn btn-info btn-sm" type="submit">
                                    <i class="fas"></i> Modificar
                                </button>
                                </a>
                            </form>
                            
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        
        </div>
    </div>
</div>

<div class="modal" id="modificar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 text-center text-info">
                            <h3>Modificar Zona</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
   
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\zonas\show-zonas.blade.php ENDPATH**/ ?>