<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rol;

class Rols extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_rol;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.rols.view', [
            'rols' => Rol::latest()
                ->orWhere('nombre_rol', 'LIKE', $keyWord)
                ->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->nombre_rol = null;
    }

    public function store()
    {
        $this->validate([
            'nombre_rol' => 'required',
        ]);

        Rol::create([
            'nombre_rol' => $this->nombre_rol
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Rol creado correctamente.');
    }

    public function edit($id)
    {
        $record = Rol::findOrFail($id);
        $this->selected_id = $id;
        $this->nombre_rol = $record->nombre_rol;
    }

    public function update()
    {
        $this->validate([
            'nombre_rol' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Rol::find($this->selected_id);
            $record->update([
                'nombre_rol' => $this->nombre_rol
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Rol actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Rol::where('id', $id)->delete();
        }

        $this->resetInput();
        session()->flash('message', 'Rol eliminado correctamente.');
    }
}
