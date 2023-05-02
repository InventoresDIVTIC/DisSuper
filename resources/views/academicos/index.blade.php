<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academicos</title>
</head>
<body>
    
    <h1>Academicos</h1>
    <a href ="/academico/create">Agregar Academico</a><br>
    
    @foreach($academico as $academico)
        <h4>Academico No.{{$academico->id}}</h4>
        <ul>
            <li><b>Nombre:</b>{{ $academico->nombrep }}</li>
            <li><b>Fecha: </b> {{ $academico->fecha }}</li>
            <li><b>observaciones:</b>  {{ $academico->observaciones }}</li>
            <li><b>no_acta:</b>  {{ $academico->no_acta }}</li>
            <a href="/academico/{{ $academico->id }}">Ver Detalle</a><br>
            <a href="/academico/{{ $academico->id}}/edit">Editar</a><br>
           
            
           
        </ul>
        
    @endforeach

</body>
</html>