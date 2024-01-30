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
              <h3 class="card-title"><i class="fas fa-user-plus"></i> Modificar Zona</h3>

              
            </div>
                  <div class="card-body">
                      <form action="{{ route('zonas.update', $zona->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                              <label for="nombre_Zona">Nombre de la Zona</label>
                              <input type="text" class="form-control" id="nombre_Zona" name="nombre_Zona" value="{{ $zona->nombre_zona }}">
                          </div>
                          @if ($errors->has('nombre_Zona'))
                            <span class="error-message">{{ $errors->first('nombre_Zona') }}</span>
                        @endif
                          <div class="form-group">
                              <label for="EncargadoZona">Encargado</label>
                              <select class="form-control" id="EncargadoZona" name="EncargadoZona">
                                  @foreach ($usuarios as $usuario)
                                      <option value="{{ $usuario->id }}" {{ $usuario->id == $zona->Encargado ? 'selected' : '' }}>
                                          {{ $usuario->name }}
                                      </option>
                                  @endforeach
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
@endsection






