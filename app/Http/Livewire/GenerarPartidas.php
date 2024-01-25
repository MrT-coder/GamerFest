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

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->juegos = Juego::all();
        $this->loadSupervisors();
    }

    public function loadSupervisors()
    {
        // Obtener supervisores (usuarios con rol de supervisor)
        
    }

    public function generarPartidas()
    {
        // Aquí puedes implementar la lógica para generar partidas con los datos seleccionados
        // Puedes usar $this->selectedJuego, $this->selectedSupervisor, $this->horaInicio, etc.

        // Después de generar las partidas, puedes mostrar un mensaje de éxito
        session()->flash('success', 'Se han generado las partidas con éxito.');
    }

    public function render()
    {
        //$this->loadData();
        $this->juegos = Juego::all();
        $this->supervisores = Usuario::whereHas('rol', function ($query) {
            $query->where('nombre_rol', 'Supervisor');
        })->get();
        //print_r($this->juegos);
        
        return view('livewire.generar-partidas', [
            'juegos' =>  $this->juegos,
            'supervisores' => $this->supervisores,
        ]);
    }
}
