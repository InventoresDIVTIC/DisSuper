<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function mostrarNotificaciones()
    {
        $notifications = Notification::with('documento')->get();

        return view('emails.index', compact('notifications'));
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
