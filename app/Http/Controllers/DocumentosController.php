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
use App\Models\IndicadorDocumentos;
use App\Models\Zona;
use App\Models\Actividades;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Exception;




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
            $request->validate([
                'N_Llamada' => 'required',
                'Introduccion' => 'required|string',
                'imagen' => 'required|array', // Validar que 'imagen' sea un array
                'imagen.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar cada imagen individualmente
            ]);
    
            // Obtener el ID del usuario que realiza el documento
            $Id_Usuario_Autor = auth()->id();
            // Obtener el ID del usuario al que se envía a revisión desde el formulario
       
           
            $zonas_usuario = User::find($Id_Usuario_Autor)->zonas[0]["nombre_zona"];
            $puesto_usuario = User::find($Id_Usuario_Autor)->roles[0]['name'];

            $usuario = [
                'nombre' => User::find($Id_Usuario_Autor)->name,
                'rpe' => User::find($Id_Usuario_Autor)->RPE_Empleado
            ];
            

            
            // Obtener los datos del formulario
            $datosFormulario = [
                'nombre_archivo' => $request->input('nombre_archivo'),
                'N_Llamada' => $request->input('N_Llamada'),
                'Actividad' => $request->input('Actividad'),
                'Fecha_Actividad' => $request->input('Fecha_Actividad'),
                'Fecha_Supervision' => $request->input('Fecha_Supervision'),
                'Introduccion' => $request->input('Introduccion'),
                'Id_Usuario_Revisar' => $request->input('Id_Usuario_Revisar'),
                'Id_Empleado' => $request->input('Id_Empleado'),
                'Tipo_Documento' => $request->input('Tipo_Documento'),
                'Status_Documento' => $request->input('Status_Documento'),
                'contenido' => $request->input('contenido'),
                'nombre_indicador' => $request->input('nombre_indicador'),
             
                // Otros campos del formulario según su estructura
                'Zona_Autor' => $zonas_usuario,
                'Puesto_Autor' => $puesto_usuario,
                'nombre_usuario' =>User::find($Id_Usuario_Autor)->name,
                'rpe_usuario' => User::find($Id_Usuario_Autor)->RPE_Empleado,
            ];
            
            
            // Procesar los indicadores seleccionados y convertirlos en una cadena separada por comas
            $indicadores = implode(',', $datosFormulario['nombre_indicador']);

          
    
            // Obtener el nombre del empleado al que se le hizo el documento
            $empleado = Empleado::find($datosFormulario['Id_Empleado']);
            $nombreEmpleado = $empleado->nombre; // Cambiar por el nombre real del empleado
    
            // Crear un nuevo documento
            $documento = new Documentos();
            $documento->N_llamada = $datosFormulario['N_Llamada'];
            $documento->Actividad = $datosFormulario['Actividad'];
            $documento->Fecha_Actividad = $datosFormulario['Fecha_Actividad'];
            $documento->Fecha_Supervision = $datosFormulario['Fecha_Supervision'];
            $documento->Introduccion = $datosFormulario['Introduccion'];
            $documento->Id_Usuario_Autor = $Id_Usuario_Autor;
            $documento->Id_Usuario_Revisar = $datosFormulario['Id_Usuario_Revisar'];
            $documento->Id_Empleado = $datosFormulario['Id_Empleado'];
            $documento->Tipo_Documento = $datosFormulario['Tipo_Documento'];
            $documento->Status_Documento = $datosFormulario['Status_Documento'];
            $documento->contenido = $datosFormulario['contenido'];
            $documento->nombre_indicador = $indicadores;
            $documento->subido_hecho = 1;
   
            // Procesar las imágenes

            // Procesar las imágenes
            $nombresImagenes = []; // Array para almacenar los nombres de las imágenes

            if ($request->hasFile('imagen')) {
                foreach ($request->file('imagen') as $imagen) {
                    if ($imagen->isValid()) {
                        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

                        // Mover la imagen a la carpeta deseada
                        $imagen->move(public_path('dist/img/imagenes_documentos'), $nombreImagen);

                        // Guardar el nombre de la imagen en el array
                        $nombresImagenes[] = $nombreImagen;
                    } else {
                        return redirect()->back()->withInput()->withErrors([
                            'imagen' => 'Uno o más archivos de imagen no son válidos.',
                        ]);
                    }
                }
            }

            $datosFormulario['imagenes_documento'] = $nombresImagenes;


            // Convertir los nombres de las imágenes a una cadena separada por comas
            $cadenaImagenes = implode(',', $nombresImagenes);

            // Asignar la cadena de nombres de imágenes al campo 'imagen'
            $documento->imagen = $cadenaImagenes;
    
    
            // Guardar el documento
            $documento->save();
          
            $notification = new Notification();
            $notification->user_id = $datosFormulario['Id_Usuario_Revisar'];
            $notification->autor = $Id_Usuario_Autor;
            $notification->empleado = $datosFormulario['Id_Empleado'];
            $notification->message = 'Se te ha enviado una llamada de atención para revisión.';
            $notification->read = false;
            
            $documento->notifications()->save($notification);

            
            try{
            // Generar el PDF a partir de la vista del formulario
            $html = view('pdf.formulario', compact('datosFormulario', 'empleado'))->render();
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
            
            if (!File::isDirectory(public_path('dist/archivos'))) {
                dd("No existe el directorio");
            }

            // Guardar el archivo PDF en la ruta especificada
            file_put_contents($rutaGuardado, $pdfOutput);
            $ruta = 'dist/archivos/' . $nombreArchivo;

            // Actualizar el documento con la ruta del archivo PDF
            $documento->nombre_archivo = $ruta;
            $documento->save();
            }catch(\Exception $e){
                $mensaje = 'Error: ' . $e->getMessage();
                dd($mensaje);
            }
            
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
            $documento->subido_hecho = 2;
            // Verificar si hay un archivo enviado
            
           
            // Construye la URL del enlace para actualizar el estado
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
            $notification->autor = $Id_Usuario_Autor;
            $notification->empleado = $datosFormulario['Id_Empleado'];
            $notification->message = 'Se te ha enviado una llamada de atención para revisión.';
            $notification->read = false;
            
            $documento->notifications()->save($notification);





             // Obtener el ID del usuario seleccionado en el formulario
             $Id_Usuario_Revisar = $request->input('Id_Usuario_Revisar');
             $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
             $Id_Documento = $documento->id;
             $Id_Empleado = $documento->Id_Empleado; 
 
             // Obtener el correo electrónico del usuario desde la tabla users
             $usuario = User::find($Id_Usuario_Revisar);
             $usuario2 = User::find($Id_Usuario_Autor);
             $empleado = Empleado::find($Id_Empleado);
            // Obtener el ID del usuario seleccionado en el formulario
            
            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($Id_Usuario_Revisar);
            
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
        $comentarioRechazo = $request->input('comentarioRechazo');

        // Encuentra el documento por su ID y actualiza el estado a "Aceptado"
        $documento = Documentos::findOrFail($id);
        $documento->Status_Documento = 'EN EDICION';
        $documento->comentario_rechazado = $comentarioRechazo;
        $documento->save();

        // Obtener el ID del usuario que creó el documento y otros datos relevantes
        $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
        $Id_Documento = $documento->id;
        $Id_Usuario_Revisar = $documento->Id_Usuario_Revisar; 
        $Id_Empleado = $documento->Id_Empleado; 
        $comentario_rechazado = $documento->comentario_rechazado;

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
                'comentario' => $comentario_rechazado,
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
        $documento = Documentos::findOrFail($id);
         // Si subido_hecho es 1, realiza las acciones existentes
         $empleado = Empleado::find($documento->Id_Empleado);
         $usuarios = User::all();
        if ($documento->subido_hecho == 1) {
            return view('empleados.editar_llamada', compact('empleado', 'documento', 'usuarios'));

        } elseif ($documento->subido_hecho == 2) {
            return view('empleados.editar_llamada2', compact('empleado', 'documento','usuarios'));

        } else {
            // Manejo de otros casos, si es necesario
            abort(404); // O puedes redirigir o manejar según tu lógica
        }
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

// ...

    public function cancelarDocumento($id,Request $request)
    {
        try {
            // Encuentra el documento por su ID
            $documento = Documentos::findOrFail($id);

            // Verifica que el usuario tenga permisos para cancelar el documento
            if (auth()->user()->roles[0]['nivel_permisos'] < 1) {
                // Guarda el ID del usuario que canceló el documento
                $Id_Usuario_Cancelacion = auth()->user()->id;
                // Captura el comentario desde el formulario
                $comentario = $request->input('comentario');
                // Cambia el estado del documento a "CANCELADO"
                $documento->Status_Documento = 'CANCELADO';
                $documento->Id_Usuario_Cancelacion = $Id_Usuario_Cancelacion; // Agrega el ID del usuario que canceló
                $documento->comentario_cancelado = $comentario;
                $documento->save();

               
                $usuarioCancelacion = User::find($documento->Id_Usuario_Cancelacion);
                // Obtener el ID del usuario que creó el documento y otros datos relevantes
                $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
                $Id_Documento = $documento->id;
                $Id_Usuario_Cancelacion = $usuarioCancelacion ? $usuarioCancelacion->name : 'Usuario Desconocido';
                $Id_Usuario_Revisar = $documento->Id_Usuario_Revisar; 
                $comentarioCancelado = $documento->comentario_cancelado;
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
                        'Usercancelado' => $Id_Usuario_Cancelacion,
                        'comentario' => $comentarioCancelado,
                        // Otros datos relevantes para la plantilla de correo
                    ];

                    // Enviar el correo electrónico al usuario
                    Mail::send('emails.canceladoA', $datosCorreo, function ($message) use ($email) {
                        $message->to($email)
                            ->subject('Llamada de atención cancelada');
                    });
                }
                $usuario = User::find($Id_Usuario_Revisar);
                $usuario2 = User::find($Id_Usuario_Autor);
                $empleado = Empleado::find($Id_Empleado);
                if ($usuario) {
                    $email = $usuario->email;

                    // Definir los datos que se pasarán a la vista de correo electrónico
                    $datosCorreo = [
                        'nombreUsuario' => $usuario->name,
                        'idDocumento' => $Id_Documento,
                        'Id_Usuario_Revisar' => $usuario2->name,
                        'Id_Empleado' => $empleado->nombre_Empleado,
                        'Usercancelado' => $Id_Usuario_Cancelacion,
                        'comentario' => $comentarioCancelado,
                        // Otros datos relevantes para la plantilla de correo
                    ];

                    // Enviar el correo electrónico al usuario
                    Mail::send('emails.canceladoR', $datosCorreo, function ($message) use ($email) {
                        $message->to($email)
                            ->subject('Llamada de atención cancelada');
                    });
                }
                // Puedes agregar otras acciones o redireccionar a una vista específica
                return redirect()->back()->with('success', 'Documento cancelado exitosamente. Correo enviado al usuario que canceló.');
            } else {
                // Si el usuario no tiene los permisos adecuados, puedes redirigir a una vista de error
                return redirect()->back()->with('error', 'No tienes los permisos para cancelar este documento.');
            }

        } catch (\Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante el proceso
            return redirect()->back()->with('error', 'Error al cancelar el documento: ' . $e->getMessage());
        }
    }

    public function cambiarArchivo(Request $request,$id)
    {
       // Encuentra el documento por su ID
       $documento = Documentos::findOrFail($id);
     
        $request->validate([
            'nuevo_archivo' => 'required|mimes:pdf,doc,docx',
        ]);
        $documento = Documentos::findOrFail($id);
        // Procesar la actualización del archivo
        if ($request->hasFile('nuevo_archivo')) {
            $file = $request->file('nuevo_archivo');
            
            // Eliminar el archivo anterior si existe
            if ($documento->nombre_archivo) {
                // Obtener la ruta completa del archivo
                $rutaCompleta = public_path($documento->nombre_archivo);

                // Verificar si el archivo existe antes de intentar eliminarlo
                if (File::exists($rutaCompleta)) {
                    File::delete($rutaCompleta);
                }
            }

            // Generar un nombre único para el archivo
            $nombreUnico = hash('sha256', $file->getFilename() . time()) . '.' . $file->getClientOriginalExtension();

            // Almacenar el nuevo archivo
            $ruta = $file->storeAs('dist/archivos', $nombreUnico);
            $file->move(public_path('dist/archivos'), $nombreUnico);
        
            // Encuentra el documento por su ID y actualiza el estado a "Aceptado"
            // Actualizar el modelo de documento con la nueva ruta
            $documento->nombre_archivo = 'dist/archivos/' . $nombreUnico;
            $documento->Status_Documento = 'TERMINADO';
            $documento->save();

            
                $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
                $Id_Documento = $documento->id;
                $Id_Usuario_Revisar = $documento->Id_Usuario_Revisar; 
                $comentarioCancelado = $documento->comentario_cancelado;
                $Id_Empleado = $documento->Id_Empleado; 

                // Obtener el correo electrónico del usuario desde la tabla users
                $usuario = User::find($Id_Usuario_Revisar);
                $usuario2 = User::find($Id_Usuario_Autor);
                $empleado = Empleado::find($Id_Empleado);
                if ($usuario) {
                    $email = $usuario->email;

                    // Definir los datos que se pasarán a la vista de correo electrónico
                    $datosCorreo = [
                        'nombreUsuario' => $usuario->name,
                        'idDocumento' => $Id_Documento,
                        'Id_Usuario_Autor' => $usuario2->name,
                        'Id_Empleado' => $empleado->nombre_Empleado,
    
                      
                        // Otros datos relevantes para la plantilla de correo
                    ];

                    // Enviar el correo electrónico al usuario
                    Mail::send('emails.terminado', $datosCorreo, function ($message) use ($email) {
                        $message->to($email)
                            ->subject('documento terminado con éxito');
                    });
                }

            return redirect()->back()->with('success', 'Archivo actualizado correctamente.');
        }

        return redirect()->back()->with('error', 'No se proporcionó un nuevo archivo.');
    }
        public function redirigirDocumento(Request $request, $id)
        {// Encuentra el documento por su ID
            $documento = Documentos::findOrFail($id);
            // Validaciones y lógica necesaria
        
            // Obtener el documento
            $documento = Documentos::findOrFail($id);
        
            // Actualizar los campos
            $documento->Id_Usuario_Revisar2 = $documento->Id_Usuario_Revisar;
            $documento->Id_Usuario_Revisar = $request->input('nuevoIdUsuario');
        
            // Guardar cambios
            $documento->save();


            // Obtener el ID del usuario que creó el documento y otros datos relevantes
            $Id_Usuario_Autor = $documento->Id_Usuario_Autor;
            $Id_Documento = $documento->id;
            $Id_Usuario_Revisar = $documento->Id_Usuario_Revisar; 
            $Id_Usuario_Revisar2 = $documento->Id_Usuario_Revisar2; 
            $Id_Empleado = $documento->Id_Empleado; 

            // Obtener el correo electrónico del usuario desde la tabla users
            $usuario = User::find($Id_Usuario_Autor);
            $usuario2 = User::find($Id_Usuario_Revisar);
            $usuario3 = User::find($Id_Usuario_Revisar2);
            $empleado = Empleado::find($Id_Empleado);
            if ($usuario) {
                $email = $usuario->email;

                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name,
                    'idDocumento' => $Id_Documento,
                    'Id_Usuario_Revisar' => $usuario2->name,
                    'Id_Usuario_Revisar2' => $usuario3->name,
                    'Id_Empleado' => $empleado->nombre_Empleado,
                ];

                // Enviar el correo electrónico al usuario
                Mail::send('emails.redirigirA', $datosCorreo, function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Documento reasignado a revisión');
                });
            }
            $usuario = User::find($Id_Usuario_Revisar);
            $usuario2 = User::find($Id_Usuario_Autor);
            $usuario3 = User::find($Id_Usuario_Revisar2);
            $empleado = Empleado::find($Id_Empleado);
            if ($usuario) {
                $email = $usuario->email;

                // Definir los datos que se pasarán a la vista de correo electrónico
                $datosCorreo = [
                    'nombreUsuario' => $usuario->name,
                    'idDocumento' => $Id_Documento,
                    'Id_Usuario_Revisar' => $usuario2->name,
                    'Id_Usuario_Revisar2' => $usuario3->name,
                    'Id_Empleado' => $empleado->nombre_Empleado,

                    // Otros datos relevantes para la plantilla de correo
                ];

                // Enviar el correo electrónico al usuario
                Mail::send('emails.redirigirR', $datosCorreo, function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Documento reasignado a revisión');
                });
            }



        
            return redirect()->back()->with('success', 'Archivo actualizado correctamente.');
        }

}

