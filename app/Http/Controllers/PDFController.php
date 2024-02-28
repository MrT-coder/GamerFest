<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        // Obtener el HTML de la consulta
        $html = urldecode($request->input('html'));
        $pdf = Pdf::loadHTML($html);
        return $pdf->download('Reporte.pdf');
    }
}

?>
