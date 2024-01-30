@extends('layouts.nav')

@section('content')
<link rel="stylesheet" href="{{ secure_asset('dist/css/form_empleado.css') }}">
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
                  <label for="clave_puesto"><i class="fas fa-id-card"></i> Clave del Puesto:</label>
                  <input type="text" class="form-control" id="clave_puesto" name="clave_puesto" maxlength="5" placeholder="Clave del Puesto">
                  @if ($errors->has('clave_puesto'))
                            <span class="error-message">{{ $errors->first('clave_puesto') }}</span>
                  @endif

                </div>
                <div class="form-group">
                  <label for="nombre_Puesto"><i class="fas fa-user"></i> Nombre:</label>
                  <input type="text" class="form-control" id="nombre_Puesto" name="nombre_Puesto" placeholder="Nombre">
                </div>
                @if ($errors->has('nombre_Puesto'))
                            <span class="error-message">{{ $errors->first('nombre_Puesto') }}</span>
                  @endif
                <div class="form-group">
                  <label for="Empresa-Proceso"><i class="fas fa-file-contract"></i> Empresa-Proceso:</label>
                  <input type="text" class="form-control" id="empresa_proceso" name="empresa_proceso" value="EPS CFE DISTRIBUCION">
                  </select>
                </div>

                
                <div class="form-group">
                    <label for="area_responsabilidad">Area de Responsabilidad:</label>
                    <select class="form-control" name="area_responsabilidad" id="area_responsabilidad" required>
                        <option value="Gerencia de Ventas">GERENCIA SERVICIO AL CLIENTE</option>
                        <option value="Gerencia de Marketing">Gerencia de Marketing</option>
                        <option value="Gerencia de Operaciones">Gerencia de Operaciones</option>
                        <option value="Gerencia de Recursos Humanos">Gerencia de Recursos Humanos</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="RamaActividad">Rama de Actividad:</label>
                    <input type="text" class="form-control" id="rama_actividad" name="rama_actividad" value="SERVICIO AL CLIENTE ">
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="Especialidad">Especialidad:</label>
                    <input type="text" class="form-control" id="especialidad" name="especialidad" value="GESTION COMERCIAL ">
                        
                    </select>
                </div>

                <div class="form-group">
                <label for="Especialidad">Zona:</label>
                    <select id="zona_id" name="zona_id" class="form-control @error('zonas') is-invalid @enderror">
                        @foreach ($zonas as $zona)
                          <option value="{{ $zona->id }}">{{ $zona->nombre_zona }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('zona_id'))
                  <span class="error-message">{{ $errors->first('zona_id') }}</span>
                @endif
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
