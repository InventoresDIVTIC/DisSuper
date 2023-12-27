@extends('layouts.nav')

@section('content')
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($usuario->photo)
                                <img id="profile-image" class="profile-user-img img-fluid img-circle"
                                    src="{{ $photoUrl }}" alt="Foto de perfil">
                            @else
                                <img id="profile-image" class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('dist/img/D.png') }}" alt="Foto de perfil por defecto">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">Nombre: {{ $usuario->name }}</h3>
                        <p class="text-muted text-center">Rol: {{ $usuario->roles->first()->name }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Zona de Trabajo:</b>
                                @if ($usuario->zonas->count() > 0)
                                    @foreach ($usuario->zonas as $zona)
                                        {{ $zona->nombre_zona }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @else
                                    Sin zona asignada
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Encargado de la Zona:</b>
                                @if ($usuario->zonas->count() > 0 && $usuario->zonas->first()->encargado)
                                    {{ $usuario->zonas->first()->encargado->name }}
                                @else
                                    Sin encargado asignado
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Fecha de Ingreso: {{ $usuario->fecha_registro }}</b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

                <!-- Contenido Principal -->
            <div class="col-md-9">
                <div class="card">
                    
                        
                    <div class="card-body">
                        <div class="tab-content">
                           

                            
                                <h2>Modificar Usuario: {{ strtoupper($usuario->name) }}</h2><br><br>
                                <form method="POST" id="tuFormularioId2" action="{{ route('usuario.update', $usuario->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <label for="contrato_id"><i ></i> Foto de perfil:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="file" name="photo" id="photo" accept="image/*"
                                            value="{{ $usuario->pho }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="contrato_id"><i ></i> Nombre:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Nombre completo"
                                            value="{{ $usuario->name }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="error-message">{{ $errors->first('name') }}</span>
                                    @endif
                                    <label for="contrato_id"><i ></i> Email:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Correo Electrónico"
                                            value="{{ $usuario->email }}">
                                        <div class="input-group-append">
                                            <div class= "input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="error-message">{{ $errors->first('email') }}</span>
                                    @endif
                                    <label for="contrato_id"><i ></i> RPE:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="RPE_Empleado" placeholder="RPE (max. 5 caracteres)" maxlength="5" value="{{ $usuario->RPE_Empleado }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('RPE_Empleado'))
                                        <span class="error-message">{{ $errors->first('RPE_Empleado') }}</span>
                                    @endif
                                    <label for="contrato_id"><i ></i> Fecha de registro:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="fecha_registro" placeholder="Fecha de ingreso" value="{{ $usuario->fecha_registro }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('fecha_registro'))
                                        <span class="error-message">{{ $errors->first('fecha_registro') }}</span>
                                    @endif
                                    <label for="contrato_id"><i ></i> Tipo de contrato:</label><br>
                                    <div class="input-group mb-3">
                                        <select name="contrato" id="contrato" class="form-control">
                                            @foreach($contratos as $contrato)
                                                <option value="{{ $contrato->id }}" {{ $usuario->contrato_id == $contrato->id ? 'selected' : '' }}>
                                                    {{ $contrato->name }}
                                                </option>
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
                                    <label for="contrato_id"><i ></i> Tipo de rol:</label><br>
                                    <div class="input-group mb-3">
                                        <select name="rol" id="rol" class="form-control">
                                            @foreach($roles as $rol)
                                                <option value="{{ $rol->id }}" {{ $usuario->roles->contains('id', $rol->id) ? 'selected' : '' }}>
                                                    {{ $rol->name }}
                                                </option>
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
                                    <label for="zonas"><i ></i> Selecciona una Zona:</label><br>
                                    <div class="input-group mb-3">
                                        <select id="zonas" name="zonas[]" class="form-control @error('zona') is-invalid @enderror">
                                            @foreach ($zonas as $zona)
                                                <option value="{{ $zona->id }}" {{ in_array($zona->id, $usuario->zonas->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $zona->nombre_zona }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-users"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('zona'))
                                        <span class="error-message">{{ $errors->first('zona') }}</span>
                                    @endif
                                    <div class="col-4">
                                        <button type="submit" id="submitButton2" class="btn btn-danger">Guardar cambios</button>
                                    </div>
                                </form>
                            </div> <!-- /.tab-pane -->
                        </div> <!-- /.tab-content -->
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
  <!-- /.container-fluid -->
</section>
@endsection