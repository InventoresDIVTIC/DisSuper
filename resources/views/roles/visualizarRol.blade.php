@extends('layouts.nav')

@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/form_empleado.css') }}">
<body class="hold-transition sidebar-mini">
  <div class="container">
    <section class="content">
        <div class="row">
          <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Roles Disponibles</h3>
                </div>

                <div class="card-body">
                  <table id="tablaRoles" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>RPE</th>
                        <th>Nombre</th>
                        <th>Fecha de ingreso</th>
                        <th class="text-center">Opciones</th>
                      </tr>
                    </thead>

                    <tbody>
                      @php
                      $roles = \App\Models\Role::all();

                      if($roles->count() > 0){
                        foreach($empleados as $empleado){
                          
                        }
                      }
                      @endphp
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
    </section>
  </div>

  <!-- Agregar esta sección antes de la etiqueta </body> -->
  <script>
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
  </script>
</body>
  @endsection
