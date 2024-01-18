<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Documentos;
use App\Mail\TuMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Empleado;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;




class EnviarRecordatorioCorreo extends Command
{
    protected $signature = 'enviar:recordatorio-correo';
    protected $description = 'Envía un recordatorio de correo cada 24 horas';

    public function handle()
    {
        while (true) {
            // Obtener documentos con Status_Documento igual a 'ENVIADO' o 'EN REVISION'
            $documentos = Documentos::whereIn('Status_Documento', ['ENVIADO'])->get();

            if ($documentos->isEmpty()) {
                info('No hay documentos con Status_Documento igual a "ENVIADO" o "EN REVISION".');
                break; // Si no hay documentos para procesar, sal del bucle
            }

            foreach ($documentos as $documento) {
                // Verificar si han pasado 3 minutos desde el último envío
                $tiempoTranscurrido = now()->diffInMinutes($documento->created_at);

                if ($tiempoTranscurrido >= 1440) {
                    // Realizar el envío del correo
                    info('Correo enviado para el documento ' . $documento->id);
                    $this->enviarCorreo($documento);

                    // Si el Status_Documento es "ACEPTADO" o "EN EDICION", salir del bucle
                    if ($documento->Status_Documento == 'ACEPTADO' || $documento->Status_Documento == 'EN EDICION') {
                        info('Documento ' . $documento->id . ' ahora tiene Status_Documento "ACEPTADO" o "EN EDICION".');
                        break 2; // Salir del bucle exterior
                    }
                } else {
                    info('No han pasado 3 minutos desde el último envío para el documento ' . $documento->id);
                }
            }

            // Esperar 3 minutos antes de la próxima iteración
            sleep(86400);
        }
    }


    private function enviarCorreo($documento)
    {
        try {
            $Id_Usuario_Revisar = $documento->Id_Usuario_Revisar;
            $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
            $Id_Documento = $documento->id;
            $Id_Empleado = $documento->Id_Empleado;

            $usuario = User::find($Id_Usuario_Revisar);
            $usuario2 = User::find($Id_Usuario_Autor);
            $empleado = Empleado::find($Id_Empleado);

            if ($usuario) {
                $email = $usuario->email;

                $datosCorreo = [
                    'nombreUsuario' => $usuario->name, 
                    'usuarioAutor' => $usuario2->name,
                    'idDocumento' => $Id_Documento,
                    'Id_Empleado' => $empleado->nombre_Empleado,
                ];

                // Enviar el correo electrónico al usuario seleccionado
                Mail::send('emails.tardado', $datosCorreo, function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Recordatorio de llamada de atención a revisión');
                });
            } else {
                // Manejar el caso en el que no se pueda encontrar el usuario
            }

            // Puedes realizar otras acciones aquí si es necesario

        } catch (\Exception $e) {
            // Manejar cualquier excepción que ocurra durante el envío del correo
            $this->error('Error al enviar el correo: ' . $e->getMessage());
        }
    }
}
