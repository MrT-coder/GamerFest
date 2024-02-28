<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;

class PDFController extends Controller
{

    public $title;

    public function generatePDF()
    {
        $pdfContent = View::make('pdf-content')->render();
        $data = ['title' => $this->title];
        $pdf = Pdf::loadHTML($pdfContent, $data);
        return $pdf->download('document.pdf');
    }
}
