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
                            <p class="login-box-msg">Registrate como miembro</p>
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
                                    <input type="text" class="form-control" name="RPE_Empleado" placeholder="RPE" value="{{ old('RPE_Empleado') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('RPE_Empleado'))
                                    <span class="error-message">{{ $errors->first('RPE_Empleado') }}</span>
                                @endif


                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="fecha_registro"  placeholder="Fecha de ingreso" value="{{ old('fecha_registro') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('fecha_registro'))
                                    <span class="error-message">{{ $errors->first('fecha_registro') }}</span>
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
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-users"></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('role'))
                                    <span class="error-message">{{ $errors->first('role') }}</span>
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
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block" id="submitButton" enable>Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>


<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@endsection