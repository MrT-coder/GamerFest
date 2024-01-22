<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function mostrarJuegos(){
        $juegos = Juego::select('nombre', 'descripcion','costo','modalidad','ruta_foto_principal','ruta_foto_portada')->get();

        return view('welcome', compact('juegos'));

    }
}
