<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class OpenAIController extends Controller
{
    public function mostrarFormulario()
    {
        return view('formulario');
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
                // Agrega aquí otros campos del formulario según su estructura
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

            // Descargar el PDF generado
            return $dompdf->stream('prueba.pdf');
        } catch (\Exception $e) {
            // Manejar cualquier otra excepción o error
            return response("Error al procesar la solicitud: " . $e->getMessage(), 500);
        }
    }
}