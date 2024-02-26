<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comprobante;
use App\Models\Ingreso;
use App\Models\Egreso;
use App\Models\Juego;
use Illuminate\Support\Facades\DB;

class DatosApi extends Controller
{
    public function Carreras()
    {
        $personasPorCarrera = DB::table('usuarios')
            ->join('comprobantes', 'usuarios.id', '=', 'comprobantes.id_usuarios')
            ->distinct() 
            ->select('usuarios.carrera', DB::raw('count(distinct usuarios.id) as total')) 
            ->groupBy('usuarios.carrera')
            ->get();

        return response()->json($personasPorCarrera);
    }

    public function ingresos()
    {
        $datosingresos = Ingreso::select(
            DB::raw('SUM(Valor) as total'),
            DB::raw('DATE_FORMAT(Fecha, "%Y-%m-%d") as fecha'),
        )
            ->groupBy('fecha')
            ->get();

        return response()->json($datosingresos);
    }

    public function egresos()
    {
        $datosegresos = Egreso::select(
            DB::raw('SUM(Valor) as total'),
            DB::raw('DATE_FORMAT(Fecha, "%Y-%m-%d") as fecha'),
        )
            ->groupBy('fecha')
            ->get();

        return response()->json($datosegresos);
    }

    public function inscritosPorJuego()
    {
        $inscritosPorJuego = DB::table('comprobantes')
            ->join('juegos', 'comprobantes.id_juegos', '=', 'juegos.id')
            ->select('juegos.nombre', DB::raw('count(*) as total'))
            ->groupBy('juegos.nombre')
            ->get();

        return response()->json($inscritosPorJuego);
    }

    public function personasInscritasPorModalidad()
    {
        $inscritosPorModalidad = Comprobante::join('juegos', 'comprobantes.id_juegos', '=', 'juegos.id')
        ->select('juegos.modalidad', DB::raw('count(*) as total'))
        ->groupBy('juegos.modalidad')
        ->get();

        return response()->json($inscritosPorModalidad);
    }

    public function totalInscritos()
    {
        // Obtener el número total de comprobantes
        $totalInscritos = Comprobante::count();

        // Devolver como JSON
        return response()->json(['totalInscritos' => $totalInscritos]);
    }

    public function totalJuegos()
    {
        // Obtener el número total de juegos
        $totalJuegos = Juego::count();

        // Devolver como JSON
        return response()->json(['totalJuegos' => $totalJuegos]);
    }

    public function saldo()
    {
        // Obtener el total de ingresos
        $totalIngresos = Ingreso::sum('Valor');

        // Obtener el total de egresos
        $totalEgresos = Egreso::sum('Valor');

        // Calcular el saldo
        $saldo = $totalIngresos - $totalEgresos;

        // Devolver como JSON
        return response()->json(['saldo' => $saldo]);
    }
}
