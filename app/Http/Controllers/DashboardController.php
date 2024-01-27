<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ingreso;
use App\Models\Egreso;

class DashboardController extends Controller
{
    public function Carreras()
    {
        $personasPorCarrera = DB::table('usuarios')
            ->join('comprobantes', 'usuarios.id', '=', 'comprobantes.id_usuarios')
            ->distinct() // Agrega la función distinct
            ->select('usuarios.carrera', DB::raw('count(distinct usuarios.id) as total')) // Usa distinct en la función count
            ->groupBy('usuarios.carrera')
            ->get();

            return $personasPorCarrera;
    }
    public function ingresos()
    {
        $datosingresos = Ingreso::select(
            DB::raw('SUM(Valor) as total'),
            DB::raw('DATE_FORMAT(Fecha, "%Y-%m-%d") as fecha'),
        )
        ->groupBy('fecha')
        ->get();
        
        return $datosingresos;

    }

    public function egresos()
    {
        $datosegresos = Egreso::select(
            DB::raw('SUM(Valor) as total'),
            DB::raw('DATE_FORMAT(Fecha, "%Y-%m-%d") as fecha'),
        )
        ->groupBy('fecha')
        ->get();
        
        return $datosegresos;
    }


    public function inscritosPorJuego()
{
    $inscritosPorJuego = DB::table('comprobantes')
        ->join('juegos', 'comprobantes.id_juegos', '=', 'juegos.id')
        ->select('juegos.nombre', DB::raw('count(*) as total'))
        ->groupBy('juegos.nombre')
        ->get();

    return $inscritosPorJuego;
}

    public function mostrarDashboard()
    {
        $personasPorCarrera = $this->carreras();
        $datosingresos = $this->ingresos();
        $datosegresos = $this->egresos();
        $inscritosPorJuego = $this->inscritosPorJuego();

        return view('dashboard', compact('personasPorCarrera', 'datosingresos', 'datosegresos', 'inscritosPorJuego'));
    }
}