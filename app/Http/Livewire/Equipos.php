<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;

class Equipos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_equ, $contadorRegistrosConflictivos = 0, $listaEquipoIntegrantesConflictivos = [], $listaSinRegistro = [], $id_equipo_nuevo, $selected_equipos_equipointegrantes = [];

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
        $this->selected_id = null;
        $this->contadorRegistrosConflictivos = 0;
        $this->listaEquipoIntegrantesConflictivos = [];
        $this->listaSinRegistro = [];
        $this->id_equipo_nuevo = null;
        $this->selected_equipos_equipointegrantes = [];
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

    public function delete($id)
    {
        $record = Equipo::find($id);
        $this->selected_id = $id;
        $this->nombre_equ = $record->nombre_equ;
        $this->contadorRegistrosConflictivos = $record->equipointegrantes->count();
        $this->listaEquipoIntegrantesConflictivos = $record->equipointegrantes;
        $this->selected_equipos_equipointegrantes = array_fill(0, $this->contadorRegistrosConflictivos, '');
        $this->listaSinRegistro = Equipo::where('id', '!=', $id)->get();
    }

    public function destroy()
    {
        if ($this->selected_id) {
            if ($this->contadorRegistrosConflictivos > 0) {
                foreach ($this->listaEquipoIntegrantesConflictivos as $index => $equipointegrantes) {
                    $equipointegrantes->update([
                        'id_equ' => $this->selected_equipos_equipointegrantes[$index]
                    ]); 
                }
            }
            
            $record = Equipo::find($this->selected_id);
            $record->delete();
            
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Equipo eliminado correctamente.');
        }
    }
}
