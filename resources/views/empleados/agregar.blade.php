@extends('layouts.nav')

@section('content')
<!-- CSS de SweetAlert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<body class="hold-transition register-page">
    <div class="form-container"> <!-- Agrega la clase form-container aquí -->
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                <a href="{{ url('/index') }}" class="h1"><b>Dis</b>Super</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Registrar nuevo Empleado</p>
                    <form action="{{ route('empleado.store') }}" method="post" id="form-empleado">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="RPE_Empleado"><i class="fas fa-id-card"></i> RPE:</label>
                          <input type="text" class="form-control" id="RPE_Empleado" name="RPE_Empleado" maxlength="5" placeholder="RPE">
                        </div>
                        @if ($errors->has('RPE_Empleado'))
                            <span class="error-message">{{ $errors->first('RPE_Empleado') }}</span>
                        @endif
                        <div class="form-group">
                          <label for="nombre_Empleado"><i class="fas fa-user"></i> Nombre:</label>
                          <input type="text" class="form-control" id="nombre_Empleado" name="nombre_Empleado" placeholder="Nombre">
                        </div>
                        @if ($errors->has('nombre_Empleado'))
                            <span class="error-message">{{ $errors->first('nombre_Empleado') }}</span>
                        @endif
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
                        @if ($errors->has('fecha_ingreso'))
                            <span class="error-message">{{ $errors->first('fecha_ingreso') }}</span>
                        @endif

                        <div class="form-group">
                            <label for="id_zona">Zona:</label>
                            <select class="form-control" name="id_zona" id="id_zona" required>
                                @foreach ($zonas as $zona)
                                  <option value="{{ $zona->id }}">{{ $zona->nombre_zona }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('id_zona'))
                            <span class="error-message">{{ $errors->first('id_zona') }}</span>
                        @endif
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Enviar</button>
                      </div>
                    </form>
                   <!-- JS de SweetAlert -->
                   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@endsection
