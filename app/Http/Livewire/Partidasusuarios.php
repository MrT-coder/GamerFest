<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partidasusuario;
use App\Models\Partida;
use App\Models\Usuario;

class Partidasusuarios extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_partidas, $id_usuarios, $gana;

    protected $rules = [
        'id_partidas' => 'required',
        'id_usuarios' => 'required',
        'gana' => 'required|max:50',
    ];

    protected $messages = [
        'required' => 'Campo requerido.',
        'gana.max' => 'Escribe menos de 50 caracteres.',
    ];

    public function updated($id)
    {
        $this->validateOnly($id, [
            'id_partidas' => 'required',
            'id_usuarios' => 'required',
            'gana' => 'required|max:50',
        ]);
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.partidasusuarios.view', [
            'partidasusuarios' => Partidasusuario::with('partida', 'usuario')->latest()
                ->orWhere('id_partidas', 'LIKE', $keyWord)
                ->orWhere('id_usuarios', 'LIKE', $keyWord)
                ->orWhere('gana', 'LIKE', $keyWord)
                ->paginate(10),
                'partidas' => Partida::all(),
                'usuarios' => Usuario::all(),
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
        $this->validate();

        Partidasusuario::create([
            'id_partidas' => $this->id_partidas,
            'id_usuarios' => $this->id_usuarios,
            'gana' => $this->gana
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Partida - Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $record = Partidasusuario::findOrFail($id);
        $this->selected_id = $id;
        $this->id_partidas = $record->id_partidas;
        $this->id_usuarios = $record->id_usuarios;
        $this->gana = $record->gana;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $record = Partidasusuario::find($this->selected_id);
            $record->update([
                'id_partidas' => $this->id_partidas,
                'id_usuarios' => $this->id_usuarios,
                'gana' => $this->gana
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Partida - Usuario actualizado correctamente.');
        }
    }

    public function delete($id)
    {
        $this->selected_id = $id;
    }

    public function destroy()
    {
        if ($this->selected_id) {
            $record = Partidasusuario::find($this->selected_id);
            $record->delete();
            
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Partida - Usuario eliminado correctamente.');
        }
    }
}
