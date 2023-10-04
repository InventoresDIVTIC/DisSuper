<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserCreated;
use App\Models\Empleado;
use Carbon\Carbon; // Importa la clase Carbon para trabajar con fechas


class CreateEmployee implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserCreated $event)
    {
        $user = $event->user; // Obtén el usuario que se acaba de crear
        // Crear y guardar un nuevo empleado relacionado con el usuario
        $empleado = new Empleado();
        $empleado->RPE_Empleado = $user->RPE_Empleado;
        $empleado->nombre_Empleado = $user->name;
        $empleado->contrato_id = $user->contrato_id;
        $empleado->fecha_ingreso = Carbon::now(); // Utiliza Carbon::now() para obtener la fecha y hora actual
        $empleado->save();
    }
}