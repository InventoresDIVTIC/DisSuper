@extends('layouts.nav')

@section('content')
<body class="hold-transition register-page">
    <div class="form-container"> <!-- Agrega la clase form-container aquí -->
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                <a href="{{ url('/index') }}" class="h1"><b>Dis</b>Super</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Registrar nuevo miembro</p>
                    <form action="{{ route('register') }}" method="post" id="form-registro">
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
                            <input type="email" class="form-control" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}">
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
                            <input type="text" class="form-control" name="RPE_Empleado" id="RPE_Empleado" placeholder="RPE (max. 5 caracteres)" maxlength="5" value="{{ old('RPE_Empleado') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('RPE_Empleado'))
                            <span class="error-message">{{ $errors->first('RPE_Empleado') }}</span>
                        @endif

                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="fecha_registro" placeholder="Fecha de ingreso" value="{{ old('fecha_registro') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-calendar"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('fecha_registro'))
                            <span class="error-message">{{ $errors->first('fecha_registro') }}</span>
                        @endif

                        <div class="input-group mb-3">
                            <select name="contrato" id="contrato" class="form-control"placeholder="Nombre completo">
                                @foreach($contratos as $contrato)
                                <option value="{{ $contrato->id }}">{{ $contrato->name }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-file-contract"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('contrato'))
                            <span class="error-message">{{ $errors->first('contrato') }}</span>
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

                        <div class="input-group mb-3">
                            <select class="form-control" name="role">
                                @foreach($roles as $role)
                                    @if ($role->id !== 1) <!-- Excluir el rol con ID igual a 1 -->
                                        <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('role'))
                            <span class="error-message">{{ $errors->first('role') }}</span>
                        @endif


                        <div class="input-group mb-3">
                            <select id="zonas" name="zonas" class="form-control @error('zonas') is-invalid @enderror">
                                @foreach ($zonas as $zona)
                                    <option value="{{ $zona->id }}">{{ $zona->nombre_zona }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('zona_id'))
                            <span class="error-message">{{ $errors->first('zona_id') }}</span>
                        @endif


                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        Acepto los  <a href="#">términos</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block" id="submitButton" enable>Registrar</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        document.getElementById('form-registro').addEventListener('submit', function(event) {
                            // Verifica si el checkbox de términos y condiciones está marcado
                            if (!document.getElementById('agreeTerms').checked) {
                                // Si no está marcado, evita que el formulario se envíe y muestra un mensaje de error
                                event.preventDefault();
                                alert('Debes aceptar los términos y condiciones antes de enviar el formulario.');
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ secure_asset('dist/js/adminlte.min.js') }}"></script>

@endsection
