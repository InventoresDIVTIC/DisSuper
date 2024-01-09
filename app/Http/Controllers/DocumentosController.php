<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User; 
use App\Models\Empleado; 
use App\Models\Notification; 
use Illuminate\Support\Facades\Mail;
use App\Models\IndicadorDocumento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

use function Laravel\Prompts\alert;

class DocumentosController extends Controller
{
    


    public function mostrarFormulario()
    {
        return view('formulario');
    }

    public function showFormulario()
    {
       
     
        $usuarios = User::all(); // Obtén todos los usuarios

        return view('empleados.show', compact('usuarios','contadorRendicionCuentas', 'contadorLlamadasAtencion', 'contadorActasAdministrativas'));
    }


    public function subir_Documento(Request $request)
    {
        try {
            // Obtener el ID del usuario que realiza el documento
            $Id_Usuario_Autor = auth()->id();
            // Obtener el ID del usuario al que se envía a revisión desde el formulario

            // Obtener los datos del formulario
            $datosFormulario = [
                'Documento' => $request->file('Documento'),
                'Id_Usuario_Revisar' => $request->input('Id_Usuario_Revisar'),
                'Id_Empleado' => $request->input('Id_Empleado'),
                'Tipo_Documento' => $request->input('Tipo_Documento'),
                'Status_Documento' => $request->input('Status_Documento'),
                
            ];
            //dd($datosFormulario);


            $documento = new Documentos();
            $documento->Documento = $datosFormulario['Documento'];
            $documento->Id_Usuario_Autor = $Id_Usuario_Autor;
            $documento->Id_Usuario_Revisar = $datosFormulario['Id_Usuario_Revisar'];
            $documento->Id_Empleado = $datosFormulario['Id_Empleado'];
            $documento->Tipo_Documento = $datosFormulario['Tipo_Documento'];
            $documento->Status_Documento = $datosFormulario['Status_Documento'];

           
            // Guardar el documento
            $documento->save();

            $notification = new Notification();
            $notification->user_id = $datosFormulario['Id_Usuario_Revisar'];
            $notification->message = 'Se te ha enviado una llamada de atención para revisión.';
            $notification->read = false;
            
            $documento->notifications()->save($notification);

            // Obtener el ID del usuario seleccionado en el formulario
            $Id_Usuario_Revisar = $request->input('Id_Usuario_Revisar');

            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($Id_Usuario_Revisar);
            // Construye la URL del enlace para actualizar el estado
     
            if ($usuario) {
                $email = $usuario->email;
                

                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name, 
                    
                ];
                
                
                // Enviar el correo electrónico al usuario seleccionado
                Mail::send('emails.llamada_revision', $datosCorreo, function ($message) use ($email, $documento) {
                    $message->to($email)
                        ->subject('Llamada de atención a revisión')
                        ->attachData($documento->Documento, 'documento.pdf');
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
            // Obtener el nombre del empleado al que se le hizo el documento
            $empleado = Empleado::find($datosFormulario['Id_Empleado']);
            $nombreEmpleado = $empleado->nombre; // Cambiar por el nombre real del empleado

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
          
            $notification = new Notification();
            $notification->user_id = $datosFormulario['Id_Usuario_Revisar'];
            $notification->message = 'Se te ha enviado una llamada de atención para revisión.';
            $notification->read = false;
            
            $documento->notifications()->save($notification);


            $documentoId = $documento->id;
            $indicadorDocumento = new IndicadorDocumento();
            $indicadorDocumento->Sistemas_Referencia = $datosFormulario['Sistemas_Referencia'];
            $indicadorDocumento->Id_Documento = $documentoId; // Asociar el ID del documento 
            $indicadorDocumento->Valor_Alcanzado = $datosFormulario['valorAlcanzado']; 
            $indicadorDocumento->Afectaciones = $datosFormulario['Afectaciones'];
            $indicadorDocumento->Normas_Incumplidas = $datosFormulario['Normas_Incumplidas'];
            $indicadorDocumento->save();

            
            


            // Generar el PDF a partir de la vista del formulario
            $html = view('pdf.formulario', compact('datosFormulario'))->render();
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $pdfOutput = $dompdf->output();

            // Generar un nombre único para el archivo PDF
            $nombreArchivo =  'LLamada de atención.pdf';

            // Ruta donde se guardará el archivo
            $rutaGuardado = public_path('dist/archivos/' . $nombreArchivo);
            // Guardar el archivo PDF en la ruta especificada
            file_put_contents($rutaGuardado, $pdfOutput);
            $ruta = 'dist/archivos/' . $nombreArchivo;

            // Actualizar el documento con la ruta del archivo PDF
            $documento->nombre_archivo = $ruta;
            $documento->save();







            
            // Obtener el ID del usuario seleccionado en el formulario
            $Id_Usuario_Revisar = $request->input('Id_Usuario_Revisar');

            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($Id_Usuario_Revisar);
            // Construye la URL del enlace para actualizar el estado
     

            if ($usuario) {
                $email = $usuario->email;
                

                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name, 
                    
                ];
                
                
                // Enviar el correo electrónico al usuario seleccionado
                Mail::send('emails.llamada_revision', $datosCorreo, function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Llamada de atención a revisión');
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


    public function procesarFormulario2(Request $request)
    {
        try {
          
            // Obtener el ID del usuario que realiza el documento
            $Id_Usuario_Autor = auth()->id();
            // Obtener el ID del usuario al que se envía a revisión desde el formulario
       
           
            // Crear una instancia de Carbon con la fecha actual
            $fecha_actual = Carbon::now()->toDateString();

            // Obtener los datos del formulario
            $datosFormulario = [
               
                'Id_Usuario_Revisar' => $request->input('Id_Usuario_Revisar'),
                'Id_Empleado' => $request->input('Id_Empleado'),
                'Tipo_Documento' => $request->input('Tipo_Documento'),
                'Status_Documento' => $request->input('Status_Documento'),
            
            ];
            


            $documento = new Documentos();
            $documento->Id_Usuario_Autor = $Id_Usuario_Autor;
            $documento->Fecha_Actividad = $fecha_actual;
            $documento->Id_Usuario_Revisar = $datosFormulario['Id_Usuario_Revisar'];
            $documento->Id_Empleado = $datosFormulario['Id_Empleado'];
            $documento->Tipo_Documento = $datosFormulario['Tipo_Documento'];
            $documento->Status_Documento = $datosFormulario['Status_Documento'];
            // Verificar si hay un archivo enviado
            
            if ($request->hasFile('Documento')) {
                $file = $request->file('Documento'); // Cambiado de $nombre_archivoe a $file
                $nombreArchivo =  $file->getClientOriginalName(); // Obtener el nombre original del archivo
            
                $file->move(public_path('dist/archivos'), $nombreArchivo);
                $documento->nombre_archivo = 'dist/archivos/' . $nombreArchivo; // Cambiado de $documento->file a $documento->nombre_archivo
            }
          
            // Guardar el documento
            $documento->save();
            

            $notification = new Notification();
            $notification->user_id = $datosFormulario['Id_Usuario_Revisar'];
            $notification->message = 'Se te ha enviado una llamada de atención para revisión.';
            $notification->read = false;
            $documento->notifications()->save($notification);

            




            
            // Obtener el ID del usuario seleccionado en el formulario
            $Id_Usuario_Revisar = $request->input('Id_Usuario_Revisar');
            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($Id_Usuario_Revisar);
            // Construye la URL del enlace para actualizar el estado
            if ($usuario) {
                $email = $usuario->email;
                

                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name, 
                    
                ];
                
                
                // Enviar el correo electrónico al usuario seleccionado
                Mail::send('emails.llamada_revision', $datosCorreo, function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Llamada de atención a revisión');
                       
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


    public function downloadPDF($id)
{
    $documento = Documentos::find($id);

    // Verificar si el documento existe
    if (!$documento) {
        return response()->json(['message' => 'Documento no encontrado'], 404);
    }

    $rutaDocumento = public_path($documento->nombre_archivo);

    // Verificar si el archivo existe en la ruta proporcionada
    if (!file_exists($rutaDocumento)) {
        return response()->json(['message' => 'Archivo no encontrado'], 404);
    }

    // Extraer solo el nombre del archivo del campo nombre_archivo
    $nombreArchivo = pathinfo($documento->nombre_archivo, PATHINFO_BASENAME);

    // Preparar la respuesta para la descarga
    return response()->download($rutaDocumento, $nombreArchivo);
}

    
   
}
