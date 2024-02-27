<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Juego;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Partida;
use App\Models\Partidasusuario;
use Carbon\Carbon; // Importamos Carbon para trabajar con fechas y horas

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
        // Obtener los jugadores
        $rolJugador = Rol::where('nombre_rol', 'Jugador')->first();
        $jugadores = Usuario::where('id_rol', $rolJugador->id)->get();

        // Obtener el supervisor seleccionado
        $supervisor = Usuario::find($this->selectedSupervisor);

        // Obtener la fecha de hoy
        $fecha = Carbon::today();

        // Calcular la hora inicial y final de la primera partida
        $horaInicio = Carbon::createFromTime(9, 0);
        $horaFin = $horaInicio->copy()->addMinutes(15);

        // Iterar sobre los jugadores
        foreach ($jugadores as $jugador) {
            // Crear la partida
            $partida = Partida::create([
                'id_juegos' => $this->juegos->first()->id, // Usamos el primer juego por defecto
                'id_usuarios' => $supervisor->id,
                'salon' => 5, // Salón por defecto
                'fecha' => $fecha,
                'hora_inicio' => $horaInicio,
                'hora_fin' => $horaFin,
                'estado' => 'sin jugar'
            ]);

            // Asignar al jugador a la partida
            Partidasusuario::create([
                'id_partidas' => $partida->id,
                'id_usuarios' => $jugador->id,
                'gana' => 'sin jugar'
            ]);

            // Actualizar las horas para la próxima partida
            $horaInicio = $horaFin->copy();
            $horaFin->addMinutes(15);
        }

        // Mostrar mensaje de éxito
        session()->flash('message', 'Partidas creadas exitosamente.');
    }
}
