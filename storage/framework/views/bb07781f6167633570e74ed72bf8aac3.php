<!DOCTYPE html>
<html>
<head>
    <title>Documento cancelado</title>
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
            color: #e74c3c; /* Cambia el color a uno que refleje la cancelación */
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
    <div class="container"><!DOCTYPE html>
<html>
<head>
    <title>Documento rechazado</title>
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
            color: #e74c3c; /* Cambia el color a uno que refleje el rechazo */
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
            <h1>Documento cancelado</h1>
        </div>
        <!-- Mensaje personalizado usando los datos proporcionados -->
        <p>Hola <strong><?php echo e($nombreUsuario); ?></strong>,</p>
        <p>Lamentamos informarte que el documento con ID <strong><?php echo e($idDocumento); ?></strong> que le corresponde al empleado <strong><?php echo e($Id_Empleado); ?></strong>y que fue emitido por <strong><?php echo e($Id_Usuario_Revisar); ?></strong> ha sido cancelado por <strong><?php echo e($Usercancelado); ?></strong>.</p>
        <p>Este fuer el comentario de <strong><?php echo e($Usercancelado); ?></strong> por el cual ha cancelado el documento:  <br> <strong><?php echo e($comentario); ?></strong></p>
        <p>Si tienes alguna pregunta o necesitas más información, por favor, ponte en contacto con el administrador para revisar los cambios necesarios.</p>
        <div class="footer">
            <p>Por favor, no respondas a este correo electrónico. Si necesitas asistencia, ponte en contacto con el soporte.</p>
        </div>
    </div>
</body>
</html>



            

 
<?php /**PATH C:\laragon\www\DisSuper\resources\views\emails\canceladoR.blade.php ENDPATH**/ ?>