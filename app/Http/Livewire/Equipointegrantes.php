<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipointegrante;
use Livewire\WithFileUploads;
use App\Models\Usuario;
use App\Models\Equipo;

class Equipointegrantes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_usu, $id_equ, $isLider;

    protected $rules = [
        'id_usu' => 'required',
        'id_equ' => 'required',
        'isLider' => 'required',
    ];

    protected $messages = [
        'required' => 'Campo requerido.',
        'id_usu.required' => 'Selecciona un usuario.',
        'id_equ.required' => 'Selecciona un equipo.',
        'isLider.required' => 'Selecciona si es líder o no.',
    ];

    public function updated($id)
    {
        $this->validateOnly($id, [
            'id_usu' => 'required',
            'id_equ' => 'required',
            'isLider' => 'required',
        ]);
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.equipointegrantes.view', [
            'equipointegrantes' => Equipointegrante::with('usuario', 'equipo')->latest()
                ->orWhere('id_usu', 'LIKE', $keyWord)
                ->orWhere('id_equ', 'LIKE', $keyWord)
                ->orWhere('isLider', 'LIKE', $keyWord)
                ->paginate(10),
                'usuarios' => Usuario::all(),
                'equipos' => Equipo::all(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->id_usu = null;
        $this->id_equ = null;
        $this->isLider = null;
    }

    public function store()
    {
        $this->validate();

        Equipointegrante::create([
            'id_usu' => $this->id_usu,
            'id_equ' => $this->id_equ,
            'isLider' => $this->isLider
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Equipo - Integrante creado correctamente.');
    }

    public function edit($id)
    {
        $record = Equipointegrante::findOrFail($id);
        $this->selected_id = $id;
        $this->id_usu = $record->id_usu;
        $this->id_equ = $record->id_equ;
        $this->isLider = $record->isLider;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $record = Equipointegrante::find($this->selected_id);
            $record->update([
                'id_usu' => $this->id_usu,
                'id_equ' => $this->id_equ,
                'isLider' => $this->isLider
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Equipo - Integrante actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Equipointegrante::where('id', $id)->delete();
        }

        $this->resetInput();
        session()->flash('message', 'Equipo - Integrante eliminado correctamente.');
    }
}
