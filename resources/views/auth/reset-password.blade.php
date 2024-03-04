<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Recuperar Contraseña</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Estilos de AdminLTE -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1><b>Dis</b>Super</h1>
      </div>
    <div class="card-body">
      <p class="login-box-msg">Estás a solo un paso de obtener tu nueva contraseña. Recupera tu contraseña ahora.</p>
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      <form id="resetPasswordForm" action="{{ route('password.update') }}" method="post">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="input-group mb-3">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo Electrónico" required>
              @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="input-group mb-3">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required>
              @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="input-group mb-3">
              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" required>
          </div>
          <div class="row">
              <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Cambiar Contraseña</button>
              </div>
          </div>
      </form>

      <script>
        $(document).ready(function() {
            // Selector del formulario
            var resetPasswordForm = $('#resetPasswordForm');

            // Evento de envío del formulario
            resetPasswordForm.on('submit', function(event) {
                event.preventDefault(); // Evitar el envío del formulario por defecto

                // Realizar la petición AJAX para enviar el formulario
                $.ajax({
                    url: resetPasswordForm.attr('action'), // URL del endpoint
                    method: 'POST', // Método HTTP
                    data: resetPasswordForm.serialize(), // Datos del formulario
                    success: function(response) {
                        // Mostrar una alerta de éxito
                        alert('¡La contraseña ha sido cambiada con éxito!');
                        // Redirigir al usuario a la página deseada
                        window.location.href = '/index'; // Cambiar '/' por la ruta deseada
                    },
                    error: function(xhr, status, error) {
                        // Obtener el mensaje de error del servidor si está disponible
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Hubo un problema al cambiar la contraseña. Inténtalo de nuevo.';
                        // Mostrar una alerta de error con el mensaje específico
                        alert(errorMessage);
                        // Limpiar los campos de contraseña
                        resetPasswordForm.find('input[name="password"]').val('');
                        resetPasswordForm.find('input[name="password_confirmation"]').val('');
                    }
                });
            });
        });
    </script>

      <p class="mt-3 mb-1">
        <a href="/login">Iniciar Sesión</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
