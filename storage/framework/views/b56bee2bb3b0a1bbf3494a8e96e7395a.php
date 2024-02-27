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
              <h3 class="card-title"><i class="fas fa-user-plus"></i> Registrar Indicador</h3>
            </div>

            <form action="<?php echo e(route('indicadores.store')); ?>" method="post" id="form-indicadores">

              <?php echo csrf_field(); ?>
              <div class="card-body">

                <div class="form-group">
                  <label for="RPE_Empleado"><i class="fas fa-id-card"></i> CLAVE:</label>
                  <input type="text" class="form-control" id="clave_indicador" name="clave_indicador" maxlength="5" placeholder="Clave del Indicador">
                  <?php if($errors->has('clave_indicador')): ?>
                      <span class="error-message"><?php echo e($errors->first('clave_indicador')); ?></span>
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label for="nombre_Empleado"><i class="fas fa-user"></i> Nombre:</label>
                  <input type="text" class="form-control" id="nombre_indicador" name="nombre_indicador" placeholder="Nombre del Indicador">
                  <?php if($errors->has('nombre_indicador')): ?>
                      <span class="error-message"><?php echo e($errors->first('nombre_indicador')); ?></span>
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label for="contrato_id"><i class="fas fa-file-contract"></i> Valor Mínimo Aceptable:</label>
                  <input type="number" max="100" min="0" class="form-control" id="valorMin_Indicador" name="valorMin_Indicador" placeholder="Valor Mínimo Aceptable en porcentaje de 0-100%">
                  <?php if($errors->has('valorMin_Indicador')): ?>
                      <span class="error-message"><?php echo e($errors->first('valorMin_Indicador')); ?></span>
                  <?php endif; ?>
                </div>
              
                
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
  

  <!-- Agregar esta sección antes de la etiqueta </body> -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var formEmpleado = document.getElementById("form-empleado");

      formEmpleado.addEventListener("submit", function(event) {
        event.preventDefault();

        // Validar el formulario y mostrar la alerta de éxito
        var rpeInput = document.getElementById("RPE_Empleado");
        var nombreInput = document.getElementById("nombre_Empleado");
        var fechaIngresoInput = document.getElementById("fecha_ingreso");

        if (rpeInput.value === "" || nombreInput.value === "" || fechaIngresoInput.value === "") {
          swal({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos',
          });
          return;
        }

        // Enviar el formulario de forma manual
        formEmpleado.submit();

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

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\DisSuper\resources\views\indicadores\create.blade.php ENDPATH**/ ?>