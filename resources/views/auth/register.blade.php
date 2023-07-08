<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ url('/index') }}" class="h1"><b>Dis</b>Super</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrate como miembro</p>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Nombre completo" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('name'))
          <span class="error-message">{{ $errors->first('name') }}</span>
        @endif
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Correo Electronico" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('email'))
          <span class="error-message">{{ $errors->first('email') }}</span>
        @endif
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('password'))
          <span class="error-message">{{ $errors->first('password') }}</span>
        @endif
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
                Acepto los  <a href="#">terminos</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="submitButton" disabled>Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="{{ route('login') }}" class="text-center">Ya soy miembro</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script>
  $(document).ready(function() {
    // Escucha el evento de cambio en la casilla de verificación "agree terms"
    $('#agreeTerms').on('change', function() {
      // Verifica si todos los campos están llenos y el checkbox está marcado
      if ($('input[name="name"]').val() !== '' && $('input[name="email"]').val() !== '' && $('input[name="password"]').val() !== '' && $('input[name="password_confirmation"]').val() !== '' && $(this).is(':checked')) {
        // Habilita el botón de envío
        $('#submitButton').prop('disabled', false);
      } else {
        // Deshabilita el botón de envío
        $('#submitButton').prop('disabled', true);
      }
    });

    // Escucha el evento de cambio en los campos de entrada
    $('input[name="name"], input[name="email"], input[name="password"], input[name="password_confirmation"]').on('input', function() {
      // Verifica si todos los campos están llenos y el checkbox está marcado
      if ($('input[name="name"]').val() !== '' && $('input[name="email"]').val() !== '' && $('input[name="password"]').val() !== '' && $('input[name="password_confirmation"]').val() !== '' && $('#agreeTerms').is(':checked')) {
        // Habilita el botón de envío
        $('#submitButton').prop('disabled', false);
      } else {
        // Deshabilita el botón de envío
        $('#submitButton').prop('disabled', true);
      }
    });
  });
</script>

</body>
</html>
