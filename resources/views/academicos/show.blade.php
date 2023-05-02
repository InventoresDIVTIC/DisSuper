<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>
<body>
    <h1>Detalles del Academico</h1>
    <h3>{{ $academico->nombrep }}</h3>
    <h3>{{ $academico->fecha }}</h3>
    <h3>{{ $academico->observaciones }}</h3>
    <h3>{{ $academico->no_acta }}</h3>

    <form method="POST" action="/academico/{{ $academico->id }}">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
        
</body>
</html>