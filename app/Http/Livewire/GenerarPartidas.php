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

    protected $rules = [
        'selectedJuego' => 'required',
        'selectedSupervisor' => 'required',
        'horaInicio' => 'required',
        'selectedfecha' => 'required',
    ];

    protected $messages = [
        'required' => 'Campo requerido.',
    ];

    public function mount()
    {
        $this->juegos = Juego::all();
        $this->supervisores = Usuario::whereHas('rol', function ($query) {
            $query->where('nombre_rol', 'Supervisor');
        })->get();
        $this->validate(); // Mueve la llamada al método validate aquí

    }

    public function render()
    {
        return view('livewire.generar-partidas.view');
    }
    

    public function generarPartidas()
    {
        console.log();
    //     if ($this->validate()) {
    //         // ... código para generar las partidas ...
    
    //         session()->flash('success', 'Se han generado las partidas con éxito.');
    //    }
    }
    
}
