<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Juego;
use App\Models\Usuario;

class GenerarPartidas extends Component
{
    use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    
    public $juegos=NULL;
    public $supervisores=NULL;
    public $selectedJuego=NULL;
    public $selectedSupervisor=NULL;
    public $horaInicio=NULL;
    public $selectedfecha=NULL;

    public function generarPartidas()
    {
        session()->flash('success', 'Se han generado las partidas con éxito.');

    }

    public function llenarCombox(){
        $this->juegos = Juego::all();
        $this->supervisores = Usuario::whereHas('rol', function ($query) {
            $query->where('nombre_rol', 'Supervisor');
        })->get();
    }
    public function render()
    {
        $this->llenarCombox();
        return view('livewire.generar-partidas', [
            'juegos' =>  $this->juegos,
            'supervisores' => $this->supervisores,
        ]);
    }
}
