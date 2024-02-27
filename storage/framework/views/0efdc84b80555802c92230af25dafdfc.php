<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(secure_asset('dist/css/form_empleado.css')); ?>">
<!-- CSS de SweetAlert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

<body class="hold-transition sidebar-mini">
  <div class="container">
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-user-plus"></i> Modificar Zona</h3>

              
            </div>
                  <div class="card-body">
                      <form action="<?php echo e(route('zonas.update', $zona->id)); ?>" method="post">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('PUT'); ?>
                          <div class="form-group">
                              <label for="nombre_Zona">Nombre de la Zona</label>
                              <input type="text" class="form-control" id="nombre_Zona" name="nombre_Zona" value="<?php echo e($zona->nombre_zona); ?>">
                          </div>
                          <?php if($errors->has('nombre_Zona')): ?>
                            <span class="error-message"><?php echo e($errors->first('nombre_Zona')); ?></span>
                        <?php endif; ?>
                          <div class="form-group">
                              <label for="EncargadoZona">Encargado</label>
                              <select class="form-control" id="EncargadoZona" name="EncargadoZona">
                                  <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($usuario->id); ?>" <?php echo e($usuario->id == $zona->Encargado ? 'selected' : ''); ?>>
                                          <?php echo e($usuario->name); ?>

                                      </option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                          </div>
                          <button type="submit" class="btn btn-primary" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">Guardar cambios</button>
                      </form>
                  </div>
                  

          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- JS de SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>




  <!-- Agregar esta sección antes de la etiqueta </body> -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var formZonasEdit = document.getElementById("form-zonasEdit");

      formZonasEdit.addEventListener("submit", function(event) {
        event.preventDefault();

        // Validar el formulario y mostrar la alerta de éxito
        var nombreZonaInput = document.getElementById("nombre_zona");
        var encargadoZonaInput = document.getElementById("EncargadoZona");

        if (nombreZonaInput.value === "" || encargadoZonaInput.value === "") {
          swal({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos',
          });
          return;
        }

        // Enviar el formulario de forma manual
        formZonasEdit.submit();

        // Mostrar alerta de éxito
        swal({
          icon: 'success',
          title: 'Éxito',
          text: 'El formulario se envió correctamente',
          timer: 3000,
          buttons: false
        });
      });
    });
  </script>
<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\zonas\modificarZonas.blade.php ENDPATH**/ ?>