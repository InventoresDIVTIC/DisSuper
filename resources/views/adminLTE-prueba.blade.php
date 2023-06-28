@extends('adminlte::page')

@section('main-header')
<a href="academico/create">Crear</a>
@endsection

@section('content')
<h1>Crear productos</h1>
    <form action="/academico" method="post">
    @csrf
        <label for="nombrep">Nombre:</label><br>
        <input type="text" name = "nombrep" id = "nombrep" value ="{{old('nombrep')}}"><br><br>
        @error('nombrep')
            <h5>{{ $message }}</h5>
        @enderror

        <br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" name = "fecha" id = "fecha" value ="{{old('fecha')}}"><br><br>
        @error('fecha')
            <h5>{{ $message }}</h5>
        @enderror

        <br>

        <label for="observaciones">Observaciones:</label><br>
        <input type="text" name = "observaciones" id = "observaciones" value ="{{old('observaciones')}}"><br><br>
        @error('observaciones')
            <h5>{{ $message }}</h5>
        @enderror

        <label for="no_acta">No. acta:</label><br>
        <input type="double" name = "no_acta" id = "no_acta" value ="{{old('no_acta')}}"><br><br>
        @error('no_acta')
            <h5>{{ $message }}</h5>
        @enderror

        <br>
        <input type="submit" value="Enviar">
    </form>

    @endsection