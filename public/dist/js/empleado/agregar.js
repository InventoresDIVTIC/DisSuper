document.addEventListener("DOMContentLoaded", function() {
    var formEmpleado = document.getElementById("form-empleado");
    var fechaIngresoInput = document.getElementById("fecha_ingreso");
    
    // Obtener laFecha actual del sistema
    var fechaActual = new Date();
    var dia = String(fechaActual.getDate()).padStart(2, '0');
    var mes = String(fechaActual.getMonth() + 1).padStart(2, '0');
    var anio = fechaActual.getFullYear();
    var fechaFormateada = anio + '-' + mes + '-' + dia;
    
    // Establecer la fecha actual en el campo de fecha de ingreso
    fechaIngresoInput.value = fechaFormateada;
    
    // Inicializar el selector de fecha utilizando Bootstrap Datepicker
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      todayBtn: 'linked',
      clearBtn: true,
      language: 'es',
      autoclose: true
    });
  
    formEmpleado.addEventListener("submit", function(event) {
      event.preventDefault();
  
      // Validar el formulario y mostrar la alerta de éxito
      var rpeInput = document.getElementById("RPE_Empleado");
      var nombreInput = document.getElementById("nombre_Empleado");
      
      if (rpeInput.value === "" || nombreInput.value === "") {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Por favor, complete todos los campos',
        });
        return;
      }
  
      // Enviar el formulario de forma manual
      formEmpleado.submit();
  
      // Mostrar alerta de éxito
      Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: 'El formulario se envió correctamente',
          timer: 3000,  // Duración en milisegundos
          timerProgressBar: true,  // Mostrar barra de progreso
          showConfirmButton: false  // Ocultar botón de confirmación
      });
    });
  });