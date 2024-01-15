<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User; 
use App\Models\Empleado; 
class NotificationController extends Controller
{
    public function mostrarNotificaciones()
    {// Obtén los nombres de los usuarios correspondientes
        $notifications = Notification::with(['documento', 'autor'])->get();
        $userNames = User::whereIn('id', $notifications->pluck('autor'))->pluck('name', 'id');
        $userReceptor = User::whereIn('id', $notifications->pluck('user_id'))->pluck('name', 'id');
        // Obtén los nombres de los usuarios correspondientes a 'empleado'
        $userNamesEmpleado = Empleado::whereIn('id', $notifications->pluck('empleado'))->pluck('nombre_Empleado', 'id');

        return view('emails.index', compact('notifications', 'userNames', 'userNamesEmpleado','userReceptor'));
    }
    public function eliminarNotificaciones(Request $request)
    {
        $notificacionesAEliminar = $request->input('notificaciones');
    
        if ($notificacionesAEliminar) {
            Notification::whereIn('id', $notificacionesAEliminar)->delete();
        }
    
        return redirect()->route('notificaciones.mostrar');
    }
}
