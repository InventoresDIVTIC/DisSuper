<!DOCTYPE html>
<html>
<head>
    <title>Llamada de atención a revisión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 80px;
            margin-bottom: 10px;
        }
        h1 {
            color: #1877f2;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            line-height: 1.6;
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
        }
        .footer {
            border-top: 1px solid #ddd;
            padding-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Llamada de atención a revisión</h1>
        </div>
        <p>Hola <strong>{{ $nombreUsuario }}</strong>,</p>
        <p>Espero que te encuentres bien. Queremos informarte que has recibido una llamada de atención para revisión. </p>
        <p>Detalles del documento:</p>
        <ul>
            <li>ID del documento: <strong>{{ $idDocumento }}</strong></li>
            <li>Empleado asociado: <strong>{{ $Id_Empleado }}</strong></li>
            <!-- Agrega más detalles del documento según sea necesario -->
        </ul>
        <p>Si tienes alguna pregunta o necesitas más detalles, no dudes en contactar al administrador.</p>
        <p>Atentamente,<br><strong>{{ $usuarioAutor }}</strong></p>
        <div class="footer">
            <p>Por favor, no respondas a este correo electrónico. Si necesitas asistencia, ponte en contacto con el soporte.</p>
        </div>
    </div>
</body>
</html>