@extends('layouts.nav')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h3>Listado de usuarios</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <!-- Botón de agregar centrado -->
                    <a href="/register">
                        <button class="btn btn-primary btn-block" type="button">
                            <i class="fas fa-plus"></i> Agregar Usuario
                        </button>
                    </a>
                </div>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RPE</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo de contrato</th>
                        <th>Rol</th>
                        <th>Zona</th>
                        <th>Fecha de Registro</th>

                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->RPE_Empleado }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">
                                    @if ($user->contrato)
                                        {{ $user->contrato->name }}
                                    @else
                                        Sin contrato asignado
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($user->roles->count() > 0)
                                        {{ $user->roles->first()->name }}
                                    @else
                                        Sin rol asignado
                                    @endif
                                </td>
                            

                            
                                <td class="text-center">
                                    @if ($user->zonas->count() > 0)
                                        @foreach ($user->zonas as $zona)
                                            {{ $zona->nombre_zona }}
                                            @if (!$loop->last),
                                            @endif
                                        @endforeach
                                    @else
                                        Sin zonas asignadas
                                    @endif
                                </td>
                                <td class="text-center">{{ $user->fecha_registro }}</td>
                            
                                <td class="text-center">
                                    <div class="btn-group">
                                        @php
                                        $showButtons = $index > 0; // Corregimos aquí para que muestre botones solo si NO es el primer usuario
                                        @endphp
                                        @if ($showButtons)
                                        <a href="{{ route('usuario.show', ['usuario' => $user->id]) }}" type="button" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i> Ver perfil
                                        </a>
                                            <form action="{{ route('usuario.destroy', ['usuario' => $user->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No se encontraron usuarios.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <br><br><br>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ secure_asset('js/usuarios_index.js') }}"></script>
@endsection
