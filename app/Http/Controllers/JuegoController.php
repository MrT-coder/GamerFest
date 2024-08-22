<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function mostrarJuegos()
    {
        $juegos = Juego::select('nombre', 'descripcion', 'costo', 'modalidad', 'ruta_foto_principal', 'ruta_foto_portada')->get();
        return view('welcome', compact('juegos'));
    }

    public function registrarJuego(Request $request)
    {
        // Lógica para registrar al usuario en un juego
        $validated = $request->validate([
            'juego_id' => 'required|exists:juegos,id',
        ]);

        // Aquí iría la lógica para registrar al usuario en el juego.
        // Supongamos que guardamos el registro en una tabla llamada `registro_juegos`.

        \DB::table('registro_juegos')->insert([
            'usuario_id' => auth()->id(),
            'juego_id' => $validated['juego_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Usuario registrado en el juego'], 201);
    }
}
