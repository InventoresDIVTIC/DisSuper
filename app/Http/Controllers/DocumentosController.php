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
                'contenido' => $request->input('contenido'),

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
            $documento->contenido = $datosFormulario['contenido'];
            
            if ($request->hasFile('imagen')) {
                $photo = $request->file('imagen');
                if ($photo->isValid()) {
                    $imageName = time() . '.' . $photo->getClientOriginalExtension();
                    
                    // Mover la imagen a la carpeta deseada
                    $photo->move(public_path('dist/img/imagenes_documentos'), $imageName);
            
                    // Asignar la ruta de la imagen al campo 'imagen' del documento
                    $documento->imagen = 'dist/img/imagenes_documentos/' . $imageName;
                } else {
                    return redirect()->back()->withInput()->withErrors([
                        'imagen' => 'El archivo de imagen no es válido.',
                    ]);
                }
            }


            // Guardar el documento
            $documento->save();
          
            $notification = new Notification();
            $notification->user_id = $datosFormulario['Id_Usuario_Revisar'];
            $notification->autor = $Id_Usuario_Autor;
            $notification->empleado = $datosFormulario['Id_Empleado'];
            $notification->message = 'Se te ha enviado una llamada de atención para revisión.';
            $notification->read = false;
            
            $documento->notifications()->save($notification);


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
            $nombreArchivo =  'LLamada de atención_' . time() . '.pdf'; // Agregar un sello de tiempo al nombre

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
            $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
            $Id_Documento = $documento->id;
            $Id_Empleado = $documento->Id_Empleado; 

            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($Id_Usuario_Revisar);
            $usuario2 = User::find($Id_Usuario_Autor);
            $empleado = Empleado::find($Id_Empleado);
            // Construye la URL del enlace para actualizar el estado
     

            if ($usuario) {
                $email = $usuario->email;
                

                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name, 
                    'usuarioAutor' => $usuario2->name,
                    'idDocumento' => $Id_Documento,
                    'Id_Empleado' => $empleado->nombre_Empleado,
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



    public function cambiarEstado($id, Request $request)
    {
        // Obtener los datos del formulario
        $datosFormulario = [
            'Id_Usuario_Revisar' => $request->input('Id_Usuario_Revisar'),
            'Id_Empleado' => $request->input('Id_Empleado'),
            'Status_Documento' => $request->input('Status_Documento'),
        ];
    
        // Encuentra el documento por su ID y actualiza el estado a "Aceptado"
        $documento = Documentos::findOrFail($id);
        $documento->Status_Documento = 'ACEPTADO';
        $documento->save();
    
        // Obtener el ID del usuario que creó el documento y otros datos relevantes
        $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
        $Id_Documento = $documento->id;
        $Id_Usuario_Revisar = $documento->Id_Usuario_Revisar; 
        $Id_Empleado = $documento->Id_Empleado; 

        $notification = new Notification();
        $notification->user_id = $Id_Usuario_Revisar;
        $notification->autor = $Id_Usuario_Autor;
        $notification->empleado = $Id_Empleado;
        $notification->message = 'LLamada de atención aceptada';
        $notification->read = false;
        
        $documento->notifications()->save($notification);
    
        // Obtener el correo electrónico del usuario desde la tabla users
        $usuario = User::find($Id_Usuario_Autor);
        $usuario2 = User::find($Id_Usuario_Revisar);
        $empleado = Empleado::find($Id_Empleado);
        if ($usuario) {
            $email = $usuario->email;
    
            // Definir los datos que se pasarán a la vista de correo electrónico
            $datosCorreo = [
                'nombreUsuario' => $usuario->name,
                'idDocumento' => $Id_Documento,
                'Id_Usuario_Revisar' => $usuario2->name,
                'Id_Empleado' => $empleado->nombre_Empleado,
                // Otros datos relevantes para la plantilla de correo
            ];
    
            // Enviar el correo electrónico al usuario
            Mail::send('emails.aceptado', $datosCorreo, function ($message) use ($email) {
                $message->to($email)
                    ->subject('Llamada de atención aceptada');
            });
        }
   
    
        // Redireccionar o responder según lo que necesites
        return redirect()->back()->with('success', 'Estado cambiado exitosamente a Aceptado. Correo enviado al usuario.');
    }
    
    public function rechazarDocumento($id, Request $request)
{
     // Obtener los datos del formulario
     $datosFormulario = [
        'Id_Usuario_Revisar' => $request->input('Id_Usuario_Revisar'),
        'Id_Empleado' => $request->input('Id_Empleado'),
        'Status_Documento' => $request->input('Status_Documento'),
    ];

    // Encuentra el documento por su ID y actualiza el estado a "Aceptado"
    $documento = Documentos::findOrFail($id);
    $documento->Status_Documento = 'EN EDICION';
    $documento->save();

    // Obtener el ID del usuario que creó el documento y otros datos relevantes
    $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
    $Id_Documento = $documento->id;
    $Id_Usuario_Revisar = $documento->Id_Usuario_Revisar; 
    $Id_Empleado = $documento->Id_Empleado; 

    // Obtener el correo electrónico del usuario desde la tabla users
    $usuario = User::find($Id_Usuario_Autor);
    $usuario2 = User::find($Id_Usuario_Revisar);
    $empleado = Empleado::find($Id_Empleado);
    if ($usuario) {
        $email = $usuario->email;

        // Definir los datos que se pasarán a la vista de correo electrónico
        $datosCorreo = [
            'nombreUsuario' => $usuario->name,
            'idDocumento' => $Id_Documento,
            'Id_Usuario_Revisar' => $usuario2->name,
            'Id_Empleado' => $empleado->nombre_Empleado,
            // Otros datos relevantes para la plantilla de correo
        ];

        // Enviar el correo electrónico al usuario
        Mail::send('emails.rechazado', $datosCorreo, function ($message) use ($email) {
            $message->to($email)
                ->subject('Llamada de atención Rechazada');
        });
    }

    // Redireccionar o responder según lo que necesites
    return redirect()->back()->with('success', 'Estado cambiado exitosamente a Aceptado. Correo enviado al usuario.');
}
public function editarDocumento($id)
{
    // Supongo que aquí estás obteniendo el empleado relacionado con el documento.
    // Si no lo has obtenido aún, necesitas hacerlo.
    $documento = Documentos::findOrFail($id);
    $empleado = Empleado::find($documento->Id_Empleado);
    $usuarios = User::all(); // Obtén todos los usuarios
    // Resto de tu lógica para obtener datos relacionados con la edición

    return view('empleados.editar_llamada', compact('empleado', 'documento','usuarios' /* otras variables que necesites pasar a la vista */));
}
    public function guardarEdicion(Request $request, $id)
    {
        // Encuentra el documento por su ID
        $documento = Documentos::findOrFail($id);

        // Actualiza los campos con los datos del formulario
        $documento->N_Llamada = $request->input('N_Llamada');
        $documento->Actividad = $request->input('Actividad');
        $documento->Status_Documento = $request->input('Status_Documento');
        $documento->Fecha_Actividad = $request->input('Fecha_Actividad');
        $documento->Introduccion = $request->input('Introduccion');
        $documento->contenido = $request->input('contenido');
        $documento->Id_Usuario_Revisar = $request->input('Id_Usuario_Revisar');

        // ... Actualiza otros campos según sea necesario ...

        // Guarda los cambios en la base de datos
        $documento->save();


            // Obtener el ID del usuario seleccionado en el formulario
            $Id_Usuario_Revisar = $request->input('Id_Usuario_Revisar');
            $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
            $Id_Documento = $documento->id;
            $Id_Empleado = $documento->Id_Empleado; 

            $notification = new Notification();
            $notification->user_id = $Id_Usuario_Revisar;
            $notification->autor = $Id_Usuario_Autor;
            $notification->empleado = $Id_Empleado;
            $notification->message = 'Se ha corregido una llamada de atención';
            $notification->read = false;

            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($Id_Usuario_Revisar);
            $usuario2 = User::find($Id_Usuario_Autor);
            $empleado = Empleado::find($Id_Empleado);
            // Construye la URL del enlace para actualizar el estado
            if ($usuario) {
                $email = $usuario->email;
        
                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name, 
                    'usuarioAutor' => $usuario2->name,
                    'idDocumento' => $Id_Documento,
                    'Id_Empleado' => $empleado->nombre_Empleado,
                    // Otros datos relevantes para la plantilla de correo
                ];
        
                // Enviar el correo electrónico al usuario
                Mail::send('emails.actualizado', $datosCorreo, function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Llamada de atención actualizada');
                });
    // Asegúrate de obtener el empleado relacionado con el documento
        $empleado = Empleado::find($documento->Id_Empleado);
        // Redirecciona a donde quieras después de guardar la edición
        return redirect()->route('empleado.show', $empleado->id)->with('success', 'Los cambios se han guardado correctamente.');
    }

    
    }
}