<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dist/css/form_empleado.css')); ?>">
<!-- CSS de SweetAlert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

<body class="hold-transition sidebar-mini">
  <div class="container">
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-user-plus"></i> Registrar Empleado</h3>
            </div>
            <form action="<?php echo e(route('empleado.store')); ?>" method="post" id="form-empleado">
              <?php echo csrf_field(); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="RPE_Empleado"><i class="fas fa-id-card"></i> RPE:</label>
                  <input type="text" class="form-control" id="RPE_Empleado" name="RPE_Empleado" maxlength="5" placeholder="RPE">
                </div>
                <?php if($errors->has('RPE_Empleado')): ?>
                    <span class="error-message"><?php echo e($errors->first('RPE_Empleado')); ?></span>
                <?php endif; ?>
                <div class="form-group">
                  <label for="nombre_Empleado"><i class="fas fa-user"></i> Nombre:</label>
                  <input type="text" class="form-control" id="nombre_Empleado" name="nombre_Empleado" placeholder="Nombre">
                </div>
                <?php if($errors->has('nombre_Empleado')): ?>
                    <span class="error-message"><?php echo e($errors->first('nombre_Empleado')); ?></span>
                <?php endif; ?>
                <div class="form-group">
                  <label for="contrato_id"><i class="fas fa-file-contract"></i> Contrato:</label>
                  <select name="contrato_id" id="contrato_id" class="form-control">
                    <?php $__currentLoopData = $contratos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($contrato->id); ?>"><?php echo e($contrato->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="fecha_ingreso"><i class="fas fa-calendar"></i> Fecha Ingreso:</label>
                  <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required>
                </div>
                <?php if($errors->has('fecha_ingreso')): ?>
                    <span class="error-message"><?php echo e($errors->first('fecha_ingreso')); ?></span>
                <?php endif; ?>

                <div class="form-group">
                    <label for="id_zona">Zona:</label>
                    <select class="form-control" name="id_zona" id="id_zona" required>
                        <?php $__currentLoopData = $zonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($zona->id); ?>"><?php echo e($zona->nombre_zona); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php if($errors->has('id_zona')): ?>
                    <span class="error-message"><?php echo e($errors->first('id_zona')); ?></span>
                <?php endif; ?>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS de SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  

 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views/empleados/agregar.blade.php ENDPATH**/ ?>