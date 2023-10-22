<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listado</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/css/form_register.css') }}">
  <!-- CSS de SweetAlert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

  <!-- Agregar la etiqueta link para el favicon -->
  <link rel="icon" href="{{ asset('dist/img/D.png') }}" type="image/x-icon">
  
  <script>
document.addEventListener("DOMContentLoaded", function() {
    // Obtén los elementos del DOM
    const userContainer = document.getElementById("userContainer");
    const profileOptions = document.getElementById("profileOptions");

    // Oculta las opciones por defecto
    profileOptions.style.display = "none";

    // Muestra las opciones cuando el cursor está sobre el nombre de usuario
    userContainer.addEventListener("mouseenter", function() {
        profileOptions.style.display = "block";
    });

    // Oculta las opciones cuando el cursor sale del nombre de usuario
    userContainer.addEventListener("mouseleave", function() {
        profileOptions.style.display = "none";
    });
});
</script>
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/index" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contacto</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      </li>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notificaciones</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
            <span class="float-right text-muted text-sm">3 minutos</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 solicitudes de amistad
            <span class="float-right text-muted text-sm">12 horas</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 nuevos informes
            <span class="float-right text-muted text-sm">2 días</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link">
      <img src="{{ asset('dist/img/D.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">isSuper</span>
    </a>

      <!-- Sidebar -->
        <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center align-items-center flex-column">
          <div class="image profile-image-container">
              @if(Auth::check() && Auth::user()->photo)
                <img src="{{ asset(Auth::user()->photo) }}" alt="Foto de perfil" class="profile-image rounded-circle w-100" id="profileImage">
              @else
                <img src="{{ asset('dist/img/D.png') }}" alt="Imagen predeterminada" class="profile-image rounded-circle w-100" id="profileImage">
              @endif
          </div>
          <div class="d-block text-center mt-2">
              <div id="userContainer" class="user-container">
                  <label for="profileImage" class="user-label" id="userLabel">{{ Auth::user()->name }}</label>
                  <div class="profile-options" id="profileOptions">
                    <a href="{{ route('usuario.show', ['usuario' => Auth::user()->id]) }}">Ver perfil</a>

                      
                      <form action="/logout" method="POST">
                          @csrf <!-- Agrega el campo CSRF para protección contra ataques CSRF -->
                          <button type="submit">Cerrar sesión</button>
                      </form>
                  </div>
              </div>
              @if(!Auth::check())
                  <a href="/login">Iniciar sesión</a>
              @endif
          </div>
      </div>






      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
   
    <!-- Usuarios -->
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Usuarios
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('usuario.index') }}" class="nav-link {{ Request::is('usuario') ? 'active' : '' }}">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Listado de usuarios</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/register" class="nav-link {{ Request::is('register') ? 'active' : '' }}">
            <i class="fas fa-user-plus nav-icon"></i>
            <p>Registrar usuario</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('usuario/*') && !Request::is('usuario/create*') ? 'active' : '' }}">
            <i class="fas fa-edit nav-icon"></i>
            <p>Modificar Usuario</p>
          </a>
        </li>
      </ul>
    </li>
  
    <!-- Empleados -->
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Empleados
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/index" class="nav-link {{ Request::is('index') ? 'active' : '' }}">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Mi listado</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('empleado/*') && !Request::is('empleado/create*') ? 'active' : '' }}">
            <i class="fas fa-user nav-icon"></i>
            <p>Perfil de empleado</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/empleado/create" class="nav-link {{ Request::is('empleado/create*') ? 'active' : '' }}">
            <i class="fas fa-user-plus nav-icon"></i>
            <p>Agregar Empleado</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Puestos -->
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
          Puestos
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/puestos/show" class="nav-link {{ Request::is('puestos/show') ? 'active' : '' }}">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Listado de Puestos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/puestos" class="nav-link {{ Request::is('puestos') ? 'active' : '' }}">
            <i class="fas fa-user-plus nav-icon"></i>
            <p>Añadir Puestos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/funciones_puestos" class="nav-link {{ Request::is('funciones_puestos') ? 'active' : '' }}">
            <i class="fas fa-user-plus nav-icon"></i>
            <p>Funciones de Puestos</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Zonas -->
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-map-marker"></i>
        <p>
          Zonas
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/zonas" class="nav-link {{ Request::is('zonas') ? 'active' : '' }}">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Listado Zonas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('zonas/*') && !Request::is('zonas/create*') ? 'active' : '' }}">
            <i class="fas fa-edit nav-icon"></i>
            <p>Modificar Zonas</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Otros -->
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Otros
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/contratos" class="nav-link {{ Request::is('contratos') ? 'active' : '' }}">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Contratos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/roles" class="nav-link {{ Request::is('roles') ? 'active' : '' }}">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Roles</p>
          </a>
        </li>
        
      </ul>
    </li>
    
  </ul>
</nav>
<!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> Prueba
    </div>
    <strong>Derechos de autor &copy; 2023 DisSuper</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('js/nav.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>



</body>
</html>
