<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Juego;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Partida;
use App\Models\Partidasusuario;

class Generarpartidas extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $juegos; // Variable para almacenar los juegos
    public $supervisores; // Variable para almacenar los supervisores
    public $selectedSupervisor; // Propiedad para almacenar el supervisor seleccionado

    public function mount()
    {
        // Recupera los juegos desde la base de datos
        $this->juegos = Juego::all();

        // Recupera los supervisores desde la base de datos
        $rolSupervisor = Rol::where('nombre_rol', 'Supervisor')->first();
        $this->supervisores = Usuario::where('id_rol', $rolSupervisor->id)->get();
    }

    public function render()
    {
        // Retorna la vista 'livewire.generarpartidas.view' y pasa los juegos y supervisores como parámetros
        return view('livewire.generarpartidas.view', [
            'juegos' => $this->juegos,
            'supervisores' => $this->supervisores
        ]);
    }

    public function asignarJugadoresAPartidas()
    {
        // Obtener todos los usuarios de tipo 'Jugador'
        $rolJugador = Rol::where('nombre_rol', 'Jugador')->first();
        $jugadores = Usuario::where('id_rol', $rolJugador->id)->get();

        // Obtener todas las partidas
        $partidas = Partida::all();

        // Contador para llevar el control de jugadores asignados
        $contadorJugadores = 0;

        // Iterar sobre las partidas y asignar jugadores
        foreach ($partidas as $partida) {
            // Verificar si la partida ya tiene el máximo de jugadores asignados
            if ($contadorJugadores >= 2) {
                break; // Salir del bucle si ya se asignaron 2 jugadores
            }

            // Verificar si la partida ya tiene 2 jugadores asignados
            if ($partida->partidasusuarios->count() >= 2) {
                continue; // Pasar a la siguiente partida si ya tiene 2 jugadores asignados
            }

            // Iterar sobre los jugadores y asignarlos a la partida
            foreach ($jugadores as $jugador) {
                // Verificar si el jugador ya está asignado a alguna partida
                if ($partida->partidasusuarios->where('id_usuarios', $jugador->id)->count() > 0) {
                    continue; // Pasar al siguiente jugador si ya está asignado a la partida
                }

                // Asignar al jugador a la partida
                Partidasusuario::create([
                    'id_partidas' => $partida->id,
                    'id_usuarios' => $jugador->id,
                ]);

                $contadorJugadores++; // Incrementar el contador de jugadores asignados

                if ($contadorJugadores >= 2) {
                    break; // Salir del bucle si ya se asignaron 2 jugadores
                }
            }
        }

        // Redireccionar a la página principal o refrescar la vista según sea necesario
        // Puedes implementar esto según cómo manejes la navegación en tu aplicación
    }
}
