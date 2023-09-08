// empleado_confirmation.js
document.addEventListener('DOMContentLoaded', function () {
    // Obtén una referencia al botón "Guardar cambios"
    var submitButton = document.getElementById('submitButton2');
    
    // Agrega un controlador de eventos click al botón
    submitButton.addEventListener('click', function (e) {
        // Evita el envío del formulario de forma predeterminada
        e.preventDefault();

        // Muestra la alerta de confirmación
        var confirmation = window.confirm('¿Seguro que deseas guardar los cambios?');

        // Si el usuario confirma, envía el formulario
        if (confirmation) {
            // Obtiene el formulario por su ID
            var form = document.getElementById('tuFormularioId2');
            // Envía el formulario de forma programática
            form.submit();
        }
    });
});