@extends('layouts.nav')

@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/form_empleado.css') }}">
<!-- CSS de SweetAlert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

<body class="hold-transition sidebar-mini">
  <div class="container">
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-user-plus"></i> Crear Puesto</h3>
            </div>
            <form action="{{ route('puestos.store') }}" method="post" id="form-puestos">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="ClavePuesto"><i class="fas fa-id-card"></i> Clave del Puesto:</label>
                  <input type="text" class="form-control" id="ClavePuesto" name="ClavePuesto" maxlength="5" placeholder="Clave del Puesto">
                </div>
                <div class="form-group">
                  <label for="nombre_Puesto"><i class="fas fa-user"></i> Nombre:</label>
                  <input type="text" class="form-control" id="nombre_Puesto" name="nombre_Puesto" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="Empresa-Proceso"><i class="fas fa-file-contract"></i> Empresa-Proceso:</label>
                  <select name="Empresa-Proceso" id="Empresa-Proceso" class="form-control">
                    
                      <option value=""></option>
                    
                  </select>
                </div>

                
                <div class="form-group">
                    <label for="AreaResponsabilidad">Area de Responsabilidad:</label>
                    <select class="form-control" name="AreaResponsabilidad" id="AreaResponsabilidad" required>
                        
                        <option value=""></option>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="RamaActividad">Rama de Actividad:</label>
                    <select class="form-control" name="RamaActividad" id="RamaActividad" required>
                        
                        <option value=""></option>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="Especialidad">Especialidad:</label>
                    <select class="form-control" name="Especialidad" id="Especialidad" required>
                        
                        <option value=""></option>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_zona">Zona:</label>
                    <select class="form-control" name="id_zona" id="id_zona" required>
                        
                        <option value=""></option>
                    </select>
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
@endsection
