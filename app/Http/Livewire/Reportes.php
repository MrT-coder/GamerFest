<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class Reportes extends Component
{
    public $tabla_seleccionada, $columnas_seleccionadas = [], $orden = 'asc', $columna_orden, $resultadosConsulta;

    public $tablasConColumnas = [
        'comprobantes' => ['id_usuarios', 'id_juegos', 'estado_pago'],
        'egresos' => ['Detalle', 'Valor', 'Fecha'],
        'equipointegrantes' => ['id_usu', 'id_equ', 'isLider'],
        'equipos' => ['nombre_equ'],
        'ingresos' => ['Detalle', 'Valor', 'Fecha'],
        'juegos' => ['nombre', 'modalidad', 'costo', 'descripcion'],
        'partidas' => ['id_juegos', 'id_usuarios', 'salon', 'fecha', 'hora_inicio', 'hora_fin', 'estado'],
        'partidasusuarios' => ['id_partidas', 'id_usuarios', 'gana'],
        'rols' => ['nombre_rol'],
        'usuarios' => ['id_rol', 'nombre', 'apellido', 'telefono', 'universidad', 'carrera', 'semestre', 'email', 'activo'],
    ];

    public function setDefaults()
    {
        $this->columnas_seleccionadas = [];
        $this->orden = 'asc';
        $this->columna_orden = null;
        $this->resultadosConsulta = null;
    }

    public function setDefaultsAll()
    {
        $this->tabla_seleccionada = null;
        $this->columnas_seleccionadas = [];
        $this->orden = 'asc';
        $this->columna_orden = null;
        $this->resultadosConsulta = null;
    }

    public function setResultadosConsultaNull()
    {
        $this->resultadosConsulta = null;
    }

    public function setColumnaOrdenamiento()
    {
        if ($this->columna_orden == null) {
            $this->columna_orden = $this->columnas_seleccionadas[0];
        }
        $this->setResultadosConsultaNull();
    }

    public function getTableModal()
    {
        $this->resultadosConsulta = DB::table($this->tabla_seleccionada)
            ->orderBy($this->columna_orden, $this->orden)
            ->get();
    }

    public function generatePDFModalData()
    {
        $data = [
            'tabla_seleccionada' => $this->tabla_seleccionada,
            'columna_orden' => $this->columna_orden,
            'orden' => $this->orden,
            'columnas_seleccionadas' => $this->columnas_seleccionadas,
        ];

        $dataString = base64_encode(json_encode($data));

        // Pasar la cadena de texto como parámetro en la URL
        return Redirect::to('/generate-pdf?data=' . urlencode($dataString));
    }


    public function render()
    {
        return view('livewire.reportes.view', [
            'tablasConColumnas' => $this->tablasConColumnas,
        ]);
    }
}