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

    protected $rules = [
        'nombre_rol' => 'required|min:3|max:100|unique:rols,nombre_rol',
    ];

    protected $messages = [
        'required' => 'Campo requerido.',
        'nombre_rol.min' => 'Escribe al menos 3 caracteres.',
        'nombre_rol.max' => 'Escribe menos de 100 caracteres.',
        'nombre_rol.unique' => 'El rol ya existe.',
    ];

    public function updated($id)
    {
        $this->validateOnly($id, [
            'nombre_rol' => 'required|min:3|max:100|unique:rols,nombre_rol',
        ]);
    }

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
        $this->validate();

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
        $this->validate();

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

    public function delete($id)
    {
        $record = Rol::findOrFail($id);
        $this->selected_id = $id;
    }

    public function destroy()
    {
        if ($this->selected_id) {
            $record = Rol::find($this->selected_id);
            $record->delete();
            
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Rol eliminado correctamente.');
        }
    }
}
