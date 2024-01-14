@extends('layouts.nav')

@section('content')
    <!-- Main content -->
    <section class="content">
    <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Inbox</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('notificaciones.eliminar') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="card-body p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>

                                <div class="btn-group">
                                    <!-- Botón para eliminar dentro del formulario -->
                                    <button type="submit" class="btn btn-default btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>

                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <!-- /.float-right -->
                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Mensaje</th>
                                        <th>Estado</th>
                                        <th>Emisor</th>
                                        <th>Receptor</th>
                                        <th>Empleado sancionado</th>
                                        <th>Fecha</th>
                                        <th>Descarga</th>
                                        
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach($notifications as $notification)
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" name="notificaciones[]" value="{{ $notification->id }}" id="check{{ $loop->iteration }}">
                                                        <label for="check{{ $loop->iteration }}"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name">{{ $notification->message }}</td>
                                                <td class="mailbox-subject">{{ $notification->read ? 'Read' : 'Unread' }}</td>
                                                <td class="mailbox-name">{{ $userNames[$notification->autor] }}</td>
                                                <td class="mailbox-name">{{ $userReceptor[$notification->user_id] }}</td>
                                                <td class="mailbox-name">{{ $userNamesEmpleado[$notification->empleado] }}</td>
                                                <td class="mailbox-date">{{ $notification->created_at->diffForHumans() }}</td>
                                                <td class="mailbox-attachment">
                                                    <!-- Botón de descarga -->
                                                    @if($notification->documento)
                                                        <a href="{{ route('descargar.documento', ['id' => $notification->documento->id]) }}" class="btn btn-info btn-sm">Descargar</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                    </form>
                    <div class="card-footer p-0">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                <i class="far fa-square"></i>
                            </button>
                            
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <!-- /.float-right -->
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
    </div>

  

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>


<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    });
     // Reload page on circular arrows and sync button click
     $('.fas.fa-sync-alt, .fas.fa-chevron-left, .fas.fa-chevron-right').click(function () {
      window.location.reload();
    });
    $('.form-control').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        // Aquí puedes añadir la lógica de búsqueda
        // Por ejemplo, obtén el valor del campo de búsqueda y realiza alguna acción con él
        var searchTerm = $(this).val();
        // Realiza alguna acción con searchTerm, como realizar una petición AJAX para buscar o filtrar datos
        // Por ahora, simplemente imprime el término de búsqueda en la consola
        console.log('Término de búsqueda:', searchTerm);
      }
    });
  });
</script>
</body>
@endsection
