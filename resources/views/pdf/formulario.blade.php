<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Llamada de atención</title>

    
    <style>
        
        body {
            
            margin: 90px;
            padding: 0;
        }

        * {
            box-sizing: border-box;
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

        .footer {
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
            text-align: center;
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

        .escalado-horizontal {
            width: 400px;
            height: auto;
        }

        .escalado-vertical {
            width: auto;
            height: 250px;
        }

        .content {
            text-align: justify;
        }

        .images {
            text-align: center;
        }

        .indicadores {
            
        }

    </style>
</head>

<?php
$nombreImagen = public_path('dist/img/cfe_Logo.jpg');

$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));

$i = 0;
$EvidenciaBase64 = [];
$ancho = [];
$alto = [];
foreach ($datosFormulario['imagenes_documento'] as $imagen) {
    $imagenEvidencia = public_path('dist/img/imagenes_documentos/' . $imagen);
    list($ancho[$i], $alto[$i]) = getimagesize($imagenEvidencia);
    $EvidenciaBase64[$i] = "data:image/png;base64," . base64_encode(file_get_contents($imagenEvidencia));
    $i++;
}

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

    <div class="footer">
        <label class="text-footer">
            AV ADOLF HORN 3513, Col. Lopéz Cotilla C.P.45654, Tlaquepaque, Jalisco<br>
            Tel.: (33) 36 78 85 04 y 36 78 85 90   <a href="https://www.cfe.gob.mx" target="_blank">www.cfe.gob.mx</a><br>
            <br>
            Por un uso responsable del papel, los comunicados internos se envían por correo electrónico y los comunicados externos se envían en papel.
        </label>
    </div>

    <div class="datos_Documento">
        <b>
        {{$datosFormulario['Zona_Autor']}}, Jalisco, {{now()->format('d/F/Y')}}<br><br>
        Asunto:{{$datosFormulario['Tipo_Documento']}}<br>
        Actividad Supervisada:{{$datosFormulario['Actividad']}}<br>
        Fecha de Actividad:{{$datosFormulario['Fecha_Supervision']}}<br>
        Fecha de Supervision: {{$datosFormulario['Fecha_Actividad']}}<br><br>
        </b>

    </div>

    <div class="datos_Empleado">
        <b>
        {{$datosFormulario['nombre_usuario']}}<br>
        {{$datosFormulario['Puesto_Autor']}} <br>
        R.T.T {{$datosFormulario['rpe_usuario']}}<br>
        Centro de Integración de Consumo Toluquilla<br>
        Presenta<br><br>
        </b>

    </div>

    <div>
        <p>

        Se realizó supervisión a la actividad<b> {{$datosFormulario['Actividad']}}</b> asignada al <b>C. {{$empleado['nombre_Empleado']}}</b>, R.P.E <b>{{$empleado->RPE_Empleado}} </b>realizado el día 18  de Octubre del 2023.
        </p>
    </div>

    <h2>Introduction</h2>
    <div class="content">
        
        <p>{{$datosFormulario['Introduccion']}}</p>
    </div>

    <h2>Indicadores Afectados</h2>
    <div class="content">
        <ul>
        <?php
        foreach ($datosFormulario['nombre_indicador'] as $indicador) { 
            
            echo nl2br("• ".$indicador . "\n");
            
        }
        ?>
        </ul>
        
    </div>

    <div class="content">
        <h2>Contenido</h2>
        <p>{{$datosFormulario['contenido']}}</p>
    </div>

    <h2>Imagenes de Evidencia:</h2>
    <div class="images">
        
        @for ($im = 0; $im < $i; $im++)
        @if ($ancho[$im] / $alto[$im] > 4000/2500)
        <img src="<?php echo $EvidenciaBase64[$im] ?>" class="escalado-horizontal">
        @else
        <img src="<?php echo $EvidenciaBase64[$im] ?>" class="escalado-vertical">
        @endif
        <br><br>
        @endfor
        
    </div>
    
</body>
</html>