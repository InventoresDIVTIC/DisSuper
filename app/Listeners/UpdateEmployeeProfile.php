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

    public function handle(UserUpdated $event)
    {
        $user = $event->user;
        
        // Buscar un empleado existente con el mismo RPE_Empleado
        $empleado = Empleado::where('RPE_Empleado', $user->RPE_Empleado)->first();

       // Si no se encuentra, crea un nuevo empleado
       if (!$empleado) {
            $empleado = new Empleado();
            $empleado->RPE_Empleado = $user->RPE_Empleado;
        }
         
        $empleado->nombre_Empleado = $user->name;
        $empleado->contrato_id = $user->contrato_id;
        
        // Verificar y adjuntar las zonas solo si el usuario tiene zonas asociadas
        // Verificar si el usuario tiene zonas asociadas
        if ($user->zonas()->count() > 0) {
            $zonas = $user->zonas()->pluck('zonas.id');
            
            // Sincronizar las zonas, esto eliminará las relaciones existentes y adjuntará las nuevas
            $empleado->zonas()->sync($zonas);
        } else {
            // Si el usuario no tiene zonas asociadas, elimina todas las zonas existentes
            $empleado->zonas()->detach();
        }
        $empleado->fecha_ingreso = $user->fecha_registro;
        $empleado->save();

        $user->empleado_id = $empleado->id;
        $user->save();
     
        // Limpia la caché de consultas de Laravel
        DB::flushQueryLog();
    }
}