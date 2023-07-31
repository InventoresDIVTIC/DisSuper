// form_register.js

$(document).ready(function () {
    // Función para habilitar o deshabilitar el botón de envío
    function enableDisableSubmitButton() {
      // Verifica si todos los campos están llenos y el checkbox está marcado
      if (
        $('input[name="name"]').val() !== '' &&
        $('input[name="email"]').val() !== '' &&
        $('input[name="password"]').val() !== '' &&
        $('input[name="password_confirmation"]').val() !== '' &&
        $('#agreeTerms').is(':checked')
      ) {
        // Habilita el botón de envío
        $('#submitButton').prop('disabled', false);
      } else {
        // Deshabilita el botón de envío
        $('#submitButton').prop('disabled', true);
      }
    }
  
    // Escucha el evento de cambio en la casilla de verificación "agree terms"
    $('#agreeTerms').on('change', function () {
      enableDisableSubmitButton();
    });
  
    // Escucha el evento de cambio en los campos de entrada
    $('input[name="name"], input[name="email"], input[name="password"], input[name="password_confirmation"]').on('input', function () {
      enableDisableSubmitButton();
    });
  
    // Escucha el evento submit del formulario
    $('#form-registro').on('submit', function (e) {
      e.preventDefault(); // Evitar el envío normal del formulario
  
      // Enviar el formulario utilizando AJAX
      $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (response) {
          // Mostrar la alerta de SweetAlert
          swal({
            title: 'Usuario Creado',
            text: response.message,
            icon: 'success',
            button: 'Aceptar',
          }).then(() => {
            // Redirigir al usuario a la página deseada después de hacer clic en el botón "Aceptar"
            window.location.href = response.redirectTo;
          });
        },
        error: function (xhr) {
          // Mostrar mensajes de error si ocurre algún problema con la solicitud AJAX
          if (xhr.responseJSON && xhr.responseJSON.errors) {
            $.each(xhr.responseJSON.errors, function (key, value) {
              // Por ejemplo, podrías mostrar los mensajes de error en una alerta o debajo de los campos del formulario
              console.log(key + ': ' + value);
            });
          }
        },
      });
    });
  });