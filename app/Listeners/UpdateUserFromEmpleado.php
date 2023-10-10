<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\EmpleadoUpdated;
use App\Models\User;
use App\Models\Zona;


class UpdateUserFromEmpleado implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(EmpleadoUpdated $event)
    {
        $empleado = $event->empleado;

        // Buscar un usuario existente con el mismo RPE_Empleado
        $user = User::where('RPE_Empleado', $empleado->RPE_Empleado)->first();

        // Si se encuentra un usuario existente, actualiza sus atributos con los del empleado
        if ($user) {
            // Llama a la función para actualizar los atributos del usuario
            $this->updateUserAttributes($user, $empleado);
            
            // Llama a la función para sincronizar las zonas del usuario
            $this->syncUserZonas($user, $empleado);
        }
    }

    // Función para actualizar los atributos del usuario
    private function updateUserAttributes(User $user, $empleado)
    {
        $user->name = $empleado->nombre_Empleado;
        $user->contrato_id = $empleado->contrato_id;
        $user->fecha_registro = $empleado->fecha_ingreso;
        
        $user->save();
    }

    // Función para sincronizar las zonas del usuario
    private function syncUserZonas(User $user, $empleado)
    {
        // Obtener las nuevas zonas del empleado
        $nuevasZonas = $empleado->zonas()->pluck('zonas.id')->toArray();

        // Sincronizar las zonas del usuario eliminando las anteriores y agregando las nuevas
        $user->zonas()->sync($nuevasZonas, ['detach' => true]);
        
    }
}