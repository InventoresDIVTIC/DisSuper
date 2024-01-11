<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plantilla Dissuper 1</title>
  <link rel="stylesheet" href="{{ public_path('dist/css/pdfStyles.css') }}">
  <link rel="icon" href="{{ asset('dist/img/cfe_Logo.jpg') }}" type="image/x-icon">
  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    }

    header {
    text-align: center;
    padding: 10px;
    background-color: #f2f2f2;
    }
    section {
    margin: 20px;
    }
    img {
    width: 5cm;
    }
    footer {
    text-align: center;
    background-color: #f2f2f2;
    padding: 10px;
    }

    .content {
        page-break-after: always;
    }

    .R_Header {
        text-align: right;
        font-size: 10;
        color: red;
    }

    .L_Header {
        text-align: left;
    }

    </style>

</head>
<body>

<header>
  <div class="L-Header">
    <img src="{{ public_path('dist/img/D.png')}}" alt="">
  </div>
  <div class="R-Header">
    División de Distribución Jalisco<br>
    Gerencia Divisional<br>
    Departamento Comercial<br>
    Agencia TOLUQUILLA<br>
    Zona Metropolitana Reforma
  </div>
</header>

  <h1>Plantilla Dissuper 1</h1>
  <p><strong>Autor:</strong> JESUS EDUARDO QUINTERO GOMEZ</p>
  <p><strong>Fecha:</strong> December 2023</p>

  <h2>Introduction</h2>
  <p>Este es un texto de ejemplo.</p>
<div class="content">
  <h2>Lipsum</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
  <!-- Lipsum content shortened for brevity -->
</div>

<div class="content">
    <h2>Lipsum</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
    <!-- Lipsum content shortened for brevity -->
  </div>
  


<footer>
  AV ADOLF HORN 3513, Col. Lopéz Cotilla C.P.45654, Tlaquepaque, Jalisco<br>
  Tel.: (33) 36 78 85 04 y 36 78 85 90   <a href="https://www.cfe.gob.mx" target="_blank">www.cfe.gob.mx</a><br>
  <br>
  Por un uso responsable del papel, los comunicados internos se envían por correo electrónico y los comunicados externos se envían en papel.
</footer>

</body>
</html>