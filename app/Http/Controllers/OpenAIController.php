<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User; 
use Illuminate\Support\Facades\Mail;

class OpenAIController extends Controller
{
    public function mostrarFormulario()
    {
        return view('formulario');
    }

    public function showFormulario()
    {
        $usuarios = User::all(); // Obtén todos los usuarios

        return view('empleados.show', compact('usuarios'));
    }
    public function procesarFormulario(Request $request)
    {
        try {
            // Obtener los datos del formulario
            $datosFormulario = [
                'inputNLlamada' => $request->input('inputNLlamada'),
                'actividad' => $request->input('actividad'),
                'fecha' => $request->input('fecha'),
                'introduccion' => $request->input('introduccion'),
                // Otros campos del formulario según su estructura
            ];

            // Generar HTML para el PDF utilizando los datos del formulario
            $html = view('pdf.formulario', compact('datosFormulario'))->render();

            // Configurar Dompdf y generar el PDF
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Obtener el ID del usuario seleccionado en el formulario
            $usuario_id = $request->input('usuario_id');

            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($usuario_id);

            if ($usuario) {
                $email = $usuario->email;

                
                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name, // Por ejemplo, el nombre del usuario
                    // Otros datos que desees pasar a la vista
                ];

                // Enviar el correo electrónico al usuario seleccionado
                Mail::send('emails.llamada_revision', $datosCorreo, function ($message) use ($email, $dompdf) {
                    $message->to($email)
                        ->subject('Llamada de atención a revisión')
                        ->attachData($dompdf->output(), 'prueba.pdf');
                });
            } else {
                // Manejar el caso en el que no se encuentra al usuario
                // Puedes lanzar una excepción o manejarlo según tu lógica
            }

            // Redireccionar de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', 'Formulario procesado correctamente y correo electrónico enviado.');

        } catch (\Exception $e) {
            // Manejar cualquier otra excepción o error y redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        }
    }
}