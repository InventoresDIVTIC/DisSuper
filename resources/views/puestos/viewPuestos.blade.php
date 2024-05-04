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
              <h3 class="card-title"><i class="fas fa-user-plus"></i>Puestos</h3>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <!-- Botón de agregar centrado -->
                    <a href="/puestos/create">
                        <button class="btn btn-primary btn-block" type="button">
                            <i class="fas fa-plus"></i> Agregar Puestos
                        </button>
                    </a>
                </div>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Clave</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Empresa-Proceso</th>
                        <th class="text-center">Area de Responsabilidad</th>
                        <th class="text-center">Rama de Actividad</th>
                        <th class="text-center">Especialidad</th>
                        <th class="text-center">Zona</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($puestos as $puesto)
                        <tr>
                            <td>{{ $puesto->id }}</td>
                            <td>{{ $puesto->clave_puesto }}</td>
                            <td>{{ $puesto->nombre }}</td>
                            <td>{{ $puesto->empresa_proceso }}</td>
                            <td>{{ $puesto->area_responsabilidad }}</td>
                            <td>{{ $puesto->rama_actividad }}</td>
                            <td>{{ $puesto->especialidad }}</td>
                            <td>{{ $puesto->zona ? $puesto->zona->nombre_zona : 'N/A' }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('puestos.show', $puesto->id) }}" type="button" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> Ver Funciones
                                    </a>
                                    <form action="{{ route('puestos.destroy', $puesto->id) }}" method="POST" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este puesto?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS de SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  


@endsection
