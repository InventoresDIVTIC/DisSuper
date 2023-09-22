<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperación de Contraseña</title>
  <style>
    h2 {
      color: #333333;
      font-size: 24px;
      margin-top: 0;
    }

    p {
      margin-bottom: 10px;
      font-size: 16px;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #f7f7f7;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      background-color: rgba(255, 152, 0, 0.8);
      color: #ffffff;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .btn:hover {
      background-color: rgba(255, 152, 0, 1);
    }

    .btn span {
      font-style: italic;
      font-weight: normal;
      color: #ff0000;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Recuperación de Contraseña <span style="color: #ff0000;">DisSuper</span></h2>
    <p>Estimado(a) Usuario(a),</p>
    <p>Hemos recibido una solicitud para restablecer tu contraseña en <span style="color: #ff0000;">DisSuper</span>. Haz clic en el enlace de abajo para cambiar tu contraseña:</p>
    <p><a href="{{ $resetLink }}">{{ $resetLink }}</a></p>
    <p>Si no has solicitado un restablecimiento de contraseña, puedes ignorar este correo electrónico.</p>
    <p>Gracias,</p>
    <p>El equipo de <span style="color: #ff0000;">DisSuper</span></p>
  </div>
</body>

</html>