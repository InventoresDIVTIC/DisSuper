<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User; 
use Illuminate\Support\Facades\Mail;
use App\Models\IndicadorDocumento;




class DocumentosController extends Controller
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
            // Obtener el ID del usuario que realiza el documento
            $Id_Usuario_Autor = auth()->id();
            // Obtener el ID del usuario al que se envía a revisión desde el formulario
       
           
            

            // Obtener los datos del formulario
            $datosFormulario = [
                'N_Llamada' => $request->input('N_Llamada'),
                'Actividad' => $request->input('Actividad'),
                'Fecha_Actividad' => $request->input('Fecha_Actividad'),
                'Introduccion' => $request->input('Introduccion'),
                'Id_Usuario_Revisar' => $request->input('Id_Usuario_Revisar'),
                'Id_Empleado' => $request->input('Id_Empleado'),
                'Tipo_Documento' => $request->input('Tipo_Documento'),
                'Status_Documento' => $request->input('Status_Documento'),
                'Sistemas_Referencia' => $request->input('Sistemas_Referencia'),
                'valorAlcanzado' => $request->input('rangoValor'),
                'Normas_Incumplidas' => $request->input('Normas_Incumplidas'),
                'Afectaciones' => $request->input('Afectaciones'),
                // Otros campos del formulario según su estructura
            ];
            //dd($datosFormulario);


            $documento = new Documentos();
            $documento->N_llamada = $datosFormulario['N_Llamada'];
            $documento->Actividad = $datosFormulario['Actividad'];
            $documento->Fecha_Actividad = $datosFormulario['Fecha_Actividad'];
            $documento->Introduccion = $datosFormulario['Introduccion'];
            $documento->Id_Usuario_Autor = $Id_Usuario_Autor;
            $documento->Id_Usuario_Revisar = $datosFormulario['Id_Usuario_Revisar'];
            $documento->Id_Empleado = $datosFormulario['Id_Empleado'];
            $documento->Tipo_Documento = $datosFormulario['Tipo_Documento'];
            $documento->Status_Documento = $datosFormulario['Status_Documento'];

           
            // Guardar el documento
            $documento->save();


            $documentoId = $documento->id;
            $indicadorDocumento = new IndicadorDocumento();
            $indicadorDocumento->Sistemas_Referencia = $datosFormulario['Sistemas_Referencia'];
            $indicadorDocumento->Id_Documento = $documentoId; // Asociar el ID del documento 
            $indicadorDocumento->Valor_Alcanzado = $datosFormulario['valorAlcanzado']; 
            $indicadorDocumento->Afectaciones = $datosFormulario['Afectaciones'];
            $indicadorDocumento->Normas_Incumplidas = $datosFormulario['Normas_Incumplidas'];
            $indicadorDocumento->save();


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
            $Id_Usuario_Revisar = $request->input('Id_Usuario_Revisar');

            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($Id_Usuario_Revisar);

            if ($usuario) {
                $email = $usuario->email;


                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name, 
                    
                ];

                // Enviar el correo electrónico al usuario seleccionado
                Mail::send('emails.llamada_revision', $datosCorreo, function ($message) use ($email, $dompdf) {
                    $message->to($email)
                        ->subject('Llamada de atención a revisión')
                        ->attachData($dompdf->output(), 'prueba.pdf');
                });
            } else {
              
            }

            // Redireccionar de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', 'Formulario procesado correctamente y correo electrónico enviado.');

        } catch (\Exception $e) {
            // Manejar cualquier otra excepción o error y redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        }
    }

}
