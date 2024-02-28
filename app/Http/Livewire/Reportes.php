<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Reportes extends Component
{
    public $tabla_seleccionada, $columnas_seleccionadas = [], $orden = 'asc', $columna_orden, $tabla_seleccionada2, $columnas_seleccionadas2 = [], $columna_orden2;

    public $tablasConColumnas = [
        'Comprobantes' => ['Usuario', 'Juego', 'Estado de Pago'],
        'Egresos' => ['Detalle', 'Valor', 'Fecha'],
        'Integrantes' => ['Usuario', 'Equipo', 'Lider'],
        'Equipos' => ['Nombre'],
        'Ingresos' => ['Detalle', 'Valor', 'Fecha'],
        'Juegos' => ['Nombre', 'Modalidad', 'Costo', 'Descripcion'],
        'Partidas' => ['Juego', 'Usuario', 'Salon', 'Fecha', 'Hora Inicio', 'Hora Fin', 'Estado'],
        'Partidas - Usuarios' => ['Partida', 'Usuario', 'Gana'],
        'Roles' => ['Nombre'],
        'Usuarios' => ['Rol', 'Nombre', 'Apellido', 'Telefono', 'Universidad', 'Carrera', 'Semestre', 'Email', 'Activo'],
    ];

    public $tablasConColumnas2 = [
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
    }

    public function setColumnaOrdenamiento()
    {
        if ($this->columna_orden == null) {
            $this->columna_orden = $this->columnas_seleccionadas[0];
        }
    }

    public function getTableModal()
    {
        $this->columnas_seleccionadas2 = 

        $tabla = DB::table($this->tabla_seleccionada)->select($this->columnas_seleccionadas)->orderBy($this->columna_orden, $this->orden)->get();
    }



    public function render()
    {
        return view('livewire.reportes.view', [
            'tablasConColumnas' => $this->tablasConColumnas,
        ]);
    }
}