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
              <h3 class="card-title"><i class="fas fa-user-plus"></i> Registrar Empleado</h3>
            </div>
            <form action="{{ route('empleado.store') }}" method="post" id="form-empleado">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="RPE_Empleado"><i class="fas fa-id-card"></i> RPE:</label>
                  <input type="text" class="form-control" id="RPE_Empleado" name="RPE_Empleado" maxlength="5" placeholder="RPE">
                </div>
                <div class="form-group">
                  <label for="nombre_Empleado"><i class="fas fa-user"></i> Nombre:</label>
                  <input type="text" class="form-control" id="nombre_Empleado" name="nombre_Empleado" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="contrato_id"><i class="fas fa-file-contract"></i> Contrato:</label>
                  <select name="contrato_id" id="contrato_id" class="form-control">
                    @foreach($contratos as $contrato)
                      <option value="{{ $contrato->id }}">{{ $contrato->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="fecha_ingreso"><i class="fas fa-calendar"></i> Fecha Ingreso:</label>
                  <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required>
                </div>

                
                <div class="form-group">
                    <label for="id_zona">Zona:</label>
                    <select class="form-control" name="id_zona" id="id_zona" required>
                        @foreach ($zonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->nombre_zona }}</option>
                        @endforeach
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
