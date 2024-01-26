<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Juego;
use App\Models\Usuario;
use App\Models\Partida; // Agregamos el modelo Partida

class GenerarPartidas extends Component
{
    public $juegos;
    public $supervisores ;
    public $selectedJuego;
    public $selectedSupervisor;
    public $horaInicio;
    public $selectedfecha;

    public function mount()
    {
    $this->juegos = Juego::all();
    $this->supervisores = Usuario::whereHas('rol', function ($query) {
        $query->where('nombre_rol', 'Supervisor');
    })->get();
    }

    public function render()
    {
        return view('livewire.generar-partidas', [
            'juegos' => $this->juegos,
            'supervisores' => $this->supervisores,
        ]);
    }
    

    public function generarPartidas()
    {
        exit();
        // Valida los datos
        // $this->validate([
        //     'selectedJuego' => 'required',
        //     'selectedSupervisor' => 'required',
        //     'horaInicio' => 'required',
        //     'selectedfecha' => 'required',
        // ]);

        // // Crea la partida
        // $partida = new Partida();
        // $partida->juego_id = $this->selectedJuego;
        // $partida->supervisor_id = $this->selectedSupervisor;
        // $partida->hora_inicio = $this->horaInicio;
        // $partida->fecha = $this->selectedfecha; // Agregamos la fecha
        // $partida->save();

        // // Muestra el mensaje de éxito
        //   session()->flash('success', 'Se han generado las partidas con éxito.');

        // // Opcional: Limpiar los campos del formulario
        // $this->selectedJuego = null;
        // $this->selectedSupervisor = null;
        // $this->horaInicio = null;
        // $this->selectedfecha = null;
       
    }
}
