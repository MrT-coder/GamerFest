<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comprobante;

class Comprobantes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_usuarios, $id_juegos, $estado_pago, $ruta_comprobante;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.comprobantes.view', [
            'comprobantes' => Comprobante::latest()
						->orWhere('id_usuarios', 'LIKE', $keyWord)
						->orWhere('id_juegos', 'LIKE', $keyWord)
						->orWhere('estado_pago', 'LIKE', $keyWord)
						->orWhere('ruta_comprobante', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_usuarios = null;
		$this->id_juegos = null;
		$this->estado_pago = null;
		$this->ruta_comprobante = null;
    }

    public function store()
    {
        $this->validate([
		'id_usuarios' => 'required',
		'id_juegos' => 'required',
		'estado_pago' => 'required',
		'ruta_comprobante' => 'required',
        ]);

        Comprobante::create([ 
			'id_usuarios' => $this-> id_usuarios,
			'id_juegos' => $this-> id_juegos,
			'estado_pago' => $this-> estado_pago,
			'ruta_comprobante' => $this-> ruta_comprobante
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Comprobante creado correctamente.');
    }

    public function edit($id)
    {
        $record = Comprobante::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_usuarios = $record-> id_usuarios;
		$this->id_juegos = $record-> id_juegos;
		$this->estado_pago = $record-> estado_pago;
		$this->ruta_comprobante = $record-> ruta_comprobante;
    }

    public function update()
    {
        $this->validate([
		'id_usuarios' => 'required',
		'id_juegos' => 'required',
		'estado_pago' => 'required',
		'ruta_comprobante' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Comprobante::find($this->selected_id);
            $record->update([ 
			'id_usuarios' => $this-> id_usuarios,
			'id_juegos' => $this-> id_juegos,
			'estado_pago' => $this-> estado_pago,
			'ruta_comprobante' => $this-> ruta_comprobante
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Comprobante actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Comprobante::where('id', $id)->delete();
        }

        $this->resetInput();
        session()->flash('message', 'Comprobante eliminado correctamente.');
    }
}