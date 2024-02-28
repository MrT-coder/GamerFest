<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public $tabla_seleccionada, $columnas_seleccionadas = [], $orden = 'asc', $columna_orden, $resultadosConsulta;
    public function generatePDF(Request $request)
    {
        // Obtener la cadena de texto de la consulta y decodificarla
        $dataString = urldecode($request->input('data'));
        $dataReceived = json_decode(base64_decode($dataString), true);

        $this->tabla_seleccionada = $dataReceived['tabla_seleccionada'];
        $this->columna_orden = $dataReceived['columna_orden'];
        $this->orden = $dataReceived['orden'];
        $columnas_seleccionadas = $dataReceived['columnas_seleccionadas'];

        $data = [
            'tabla_seleccionada' => $this->tabla_seleccionada,
            'resultadosConsulta' => $this->resultadosConsulta = DB::table($this->tabla_seleccionada)
            ->orderBy($this->columna_orden, $this->orden)
            ->get(),
            'columnas_seleccionadas' => $columnas_seleccionadas,
        ];
        // Generar el PDF utilizando la vista y los datos
        $pdf = PDF::loadView('livewire.reportes.pdf_modal_view', $data);
        return $pdf->download('Reporte.pdf');
    }
}

?>
