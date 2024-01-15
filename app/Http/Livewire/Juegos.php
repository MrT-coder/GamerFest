<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Juego;

class Juegos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $modalidad, $costo, $ruta_foto_principal, $ruta_foto_portada, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.juegos.view', [
            'juegos' => Juego::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('modalidad', 'LIKE', $keyWord)
						->orWhere('costo', 'LIKE', $keyWord)
						->orWhere('ruta_foto_principal', 'LIKE', $keyWord)
						->orWhere('ruta_foto_portada', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->modalidad = null;
		$this->costo = null;
		$this->ruta_foto_principal = null;
		$this->ruta_foto_portada = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'modalidad' => 'required',
		'costo' => 'required',
		'ruta_foto_principal' => 'required',
		'ruta_foto_portada' => 'required',
		'descripcion' => 'required',
        ]);

        Juego::create([ 
			'nombre' => $this-> nombre,
			'modalidad' => $this-> modalidad,
			'costo' => $this-> costo,
			'ruta_foto_principal' => $this-> ruta_foto_principal,
			'ruta_foto_portada' => $this-> ruta_foto_portada,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Juego Successfully created.');
    }

    public function edit($id)
    {
        $record = Juego::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->modalidad = $record-> modalidad;
		$this->costo = $record-> costo;
		$this->ruta_foto_principal = $record-> ruta_foto_principal;
		$this->ruta_foto_portada = $record-> ruta_foto_portada;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'modalidad' => 'required',
		'costo' => 'required',
		'ruta_foto_principal' => 'required',
		'ruta_foto_portada' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Juego::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'modalidad' => $this-> modalidad,
			'costo' => $this-> costo,
			'ruta_foto_principal' => $this-> ruta_foto_principal,
			'ruta_foto_portada' => $this-> ruta_foto_portada,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Juego Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Juego::where('id', $id)->delete();
        }
    }
}