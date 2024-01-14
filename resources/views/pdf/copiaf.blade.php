
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantilla Dissuper 1</title>

    
    <style>
        
        body {
            
            margin: 90px;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        .content {
            page-break-after: always;
            
        }

        #header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 80px;
            padding: 5px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        #footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            padding: 10px;
            width: 100%;
        }

        .text-footer {
            font-size: 10px;
        }

        .text-header {
            width: 62%; /* Ajusta el ancho del contenedor del texto según sea necesario */
            text-align: right;
            display: inline-block;
            vertical-align: top;
            margin-right: 5px; /* Ajusta el margen derecho según sea necesario */
            font-size: 12px;
        }

        .L_Header img{
            float: left;
            margin-right: 0%;
            width: 38%;
        }

        .datos_Documento {
            text-align: right;
            size: 11;
            
        }

        .datos_Empleado {
            text-align: left;
            size: 11;
        }

    </style>
</head>

<?php
$nombreImagen = public_path('dist/img/cfe_Logo.jpg');

$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
?>
<body>
    <div id="header">
        <div class="L_Header">
            <img src="<?php echo $imagenBase64 ?>" alt="CFE Logo">
        </div>
        
        <label class="text-header">
            <b>
            División de Distribución Jalisco<br>
            Gerencia Divisional<br>
            Departamento Comercial<br>
            Agencia TOLUQUILLA<br>
            Zona Metropolitana Reforma
            </b>
        </label>
    </div>

    <div id="footer">
        <label class="text-footer">
            AV ADOLF HORN 3513, Col. Lopéz Cotilla C.P.45654, Tlaquepaque, Jalisco<br>
            Tel.: (33) 36 78 85 04 y 36 78 85 90   <a href="https://www.cfe.gob.mx" target="_blank">www.cfe.gob.mx</a><br>
            <br>
            Por un uso responsable del papel, los comunicados internos se envían por correo electrónico y los comunicados externos se envían en papel.
        </label>
    </div>

    <div class="datos_Documento">
        <b>
        Lugar, {{now()}}<br><br>
        Asunto:<br>
        Actividad Supervisada:<br>
        Fecha de Actividad:<br>
        Fecha de Supervision: {{$datosFormulario['Fecha_Supervision']}}<br><br>
        </b>

    </div>

    <div class="datos_Empleado">
        <!--{{$empleado->nombre_Empleado}}--><br>
        Auxiliar Comercial <br>
        R.T.T <!--{{$empleado->RPE_Empleado}}--><br>
        Centro de Integración de Consumo Toluquilla<br>
        Presenta<br><br>


    </div>

    <div>
        Se realizó supervisión al ciclo <b>"Ciclo" Tarea {{$datosFormulario['Actividad']}}</b> asignada al <b>C. <!--{{$empleado->nombre_Empleado}}--></b>, R.P.E <b><!--{{$empleado->RPE_Empleado}}--></b> realizado el día 18  de Octubre del 2023.
    </div>

    <div class="content">
        <h1>Plantilla Dissuper 1</h1>
        <p><strong>Autor:</strong> JESUS EDUARDO QUINTERO GOMEZ</p>
        <p><strong>Fecha:</strong> December 2023</p>

        <h2>Introduction</h2>
        <p>Este es un texto de ejemplo.</p>
    </div>

    <div class="content">
        <h2>Lipsum</h2>
        <label class="col-sm-2 col-form-label">Introducción:</label>
        <!-- Lipsum content shortened for brevity -->
    </div>

    <div class="content">
        <h2>Lipsum</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
    </div>
    
</body>
</html>