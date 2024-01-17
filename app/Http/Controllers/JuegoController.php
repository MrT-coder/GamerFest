<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function mostrarJuegos(){
        $juegos = Juego::select('nombre', 'descripcion','costo')->get();

        return view('welcome', compact('juegos'));

    }
}
