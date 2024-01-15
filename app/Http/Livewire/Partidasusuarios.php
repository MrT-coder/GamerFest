<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partidasusuario;

class Partidasusuarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_partidas, $id_usuarios, $gana;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.partidasusuarios.view', [
            'partidasusuarios' => Partidasusuario::latest()
						->orWhere('id_partidas', 'LIKE', $keyWord)
						->orWhere('id_usuarios', 'LIKE', $keyWord)
						->orWhere('gana', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_partidas = null;
		$this->id_usuarios = null;
		$this->gana = null;
    }

    public function store()
    {
        $this->validate([
		'id_partidas' => 'required',
		'id_usuarios' => 'required',
		'gana' => 'required',
        ]);

        Partidasusuario::create([ 
			'id_partidas' => $this-> id_partidas,
			'id_usuarios' => $this-> id_usuarios,
			'gana' => $this-> gana
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Partidasusuario Successfully created.');
    }

    public function edit($id)
    {
        $record = Partidasusuario::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_partidas = $record-> id_partidas;
		$this->id_usuarios = $record-> id_usuarios;
		$this->gana = $record-> gana;
    }

    public function update()
    {
        $this->validate([
		'id_partidas' => 'required',
		'id_usuarios' => 'required',
		'gana' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Partidasusuario::find($this->selected_id);
            $record->update([ 
			'id_partidas' => $this-> id_partidas,
			'id_usuarios' => $this-> id_usuarios,
			'gana' => $this-> gana
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Partidasusuario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Partidasusuario::where('id', $id)->delete();
        }
    }
}