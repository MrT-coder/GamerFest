<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;

class Equipos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_equ;

    protected $rules = [
        'nombre_equ' => 'required|unique:equipos,nombre_equ|min:3|max:100',
    ];

    protected $messages = [
        'required' => 'Campo requerido.',
        'nombre_equ.unique' => 'Ya existe un equipo con ese nombre.',
        'nombre_equ.min' => 'Escribe al menos 3 caracteres.',
        'nombre_equ.max' => 'Escribe menos de 100 caracteres.',
    ];

    public function updated($id)
    {
        $this->validateOnly($id, [
            'nombre_equ' => 'required|unique:equipos,nombre_equ|min:3|max:100',
        ]);
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
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
        $this->validate();

        Equipo::create([
            'nombre_equ' => $this->nombre_equ
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Equipo creado correctamente.');
    }

    public function edit($id)
    {
        $record = Equipo::findOrFail($id);
        $this->selected_id = $id;
        $this->nombre_equ = $record->nombre_equ;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $record = Equipo::find($this->selected_id);
            $record->update([
                'nombre_equ' => $this->nombre_equ
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Equipo actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Equipo::where('id', $id)->delete();
        }

        $this->resetInput();
        session()->flash('message', 'Equipo eliminado correctamente.');
    }
}
