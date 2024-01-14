<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;

class Equipos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_equ, $nombre_equ;


    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.equipos.view', [
            'equipos' => Equipo::latest()
						->orWhere('nombre_equ', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre_equ = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_equ' => 'required',
        ]);

        Equipo::create([ 
			'nombre_equ' => $this-> nombre_equ
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Equipo Successfully created.');
    }

    public function edit($id)
    {
        $record = Equipo::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_equ = $record-> nombre_equ;
    }

    public function update()
    {
        $this->validate([
		'nombre_equ' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Equipo::find($this->selected_id);
            $record->update([ 
			'nombre_equ' => $this-> nombre_equ
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Equipo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Equipo::where('id', $id)->delete();
        }
    }
}