<?php
namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use App\Events\UserUpdated;
use App\Models\Empleado;
use App\Models\Zona;


class UpdateEmployeeProfile implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {
    $user = $event->user;

    // Buscar al empleado por RPE
    $empleado = Empleado::where('RPE_Empleado', $user->RPE_Empleado)->first();

    if (!$empleado) {
        // Si no tiene un empleado, crear uno
        $empleado = new Empleado();
        $empleado->RPE_Empleado = $user->RPE_Empleado;
    }

    // Actualizar los campos del empleado según los datos del usuario
    $empleado->RPE_Empleado = $user->RPE_Empleado;
    $empleado->nombre_Empleado = $user->name;
    $empleado->contrato_id = $user->contrato_id;
    $empleado->fecha_ingreso = $user->fecha_registro; 
    $empleado->save();

    // Adjunta las zonas al empleado si hay zonas relacionadas con el usuario
    if ($user->zonas()->count() > 0) {
        $zonas = $user->zonas()->pluck('zonas.id');
        $empleado->zonas()->sync($zonas);
    }


    }
}