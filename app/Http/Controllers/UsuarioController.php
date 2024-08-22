<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function profile()
    {
        // Lógica para mostrar el perfil de usuario
    }

    public function buscarUsuario(Request $request)
    {
        // Aquí implementamos la lógica para buscar un usuario de manera segura

        $query = $request->input('query');

        // Usamos Eloquent o Query Builder para realizar la búsqueda segura
        $usuarios = Usuario::where('nombre', 'like', "%{$query}%")
                           ->orWhere('email', 'like', "%{$query}%")
                           ->get();

        return response()->json(['usuarios' => $usuarios], 200);
    }
}
