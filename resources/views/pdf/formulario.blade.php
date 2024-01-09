<!DOCTYPE html>
<html>
<head>
    <title>Formulario PDF</title>
    <!-- Estilos opcionales para mejorar la presentación en el PDF -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .col-form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h3>Generar Llamada de Atención</h3>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">N. Llamada:</label>
        <div class="col-sm-10">
            <span>{{ $datosFormulario['inputNLlamada'] ?? '' }}</span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Actividad:</label>
        <div class="col-sm-10">
            <span>{{ $datosFormulario['actividad'] ?? '' }}</span>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Fecha:</label>
        <div class="col-sm-10">
            <span>{{ $datosFormulario['fecha'] ?? '' }}</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Introducción:</label>
        <div class="col-sm-10">
            <p>{{ $datosFormulario['introduccion'] ?? '' }}</p>
        </div>
    </div>
    <!-- Y así sucesivamente para los demás campos -->
</body>
</html>