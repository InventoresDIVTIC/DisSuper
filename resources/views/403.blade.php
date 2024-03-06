@extends('layouts.nav')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper d-flex justify-content-center align-items-center">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Error 403</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/index">Inicio</a></li>
            <li class="breadcrumb-item active">Error 403</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-warning"> 403</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Lo sentimos, no tienes acceso a esta página.</h3>

        <p>
          Por favor, contacta a un superior para obtener más información.
          Te sugerimos <a href="/index">regresar a una página segura a la que tengas acceso</a> o intentar de nuevo más tarde.
        </p>
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->
</div>

@endsection
