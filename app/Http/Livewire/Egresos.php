<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Egreso;

class Egresos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Detalle, $Valor, $Fecha;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.egresos.view', [
            'egresos' => Egreso::latest()
                ->orWhere('Detalle', 'LIKE', $keyWord)
                ->orWhere('Valor', 'LIKE', $keyWord)
                ->orWhere('Fecha', 'LIKE', $keyWord)
                ->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->Detalle = null;
        $this->Valor = null;
        $this->Fecha = null;
    }

    public function store()
    {
        $this->validate([
            'Detalle' => 'required',
            'Valor' => 'required',
            'Fecha' => 'required',
        ]);

        Egreso::create([
            'Detalle' => $this->Detalle,
            'Valor' => $this->Valor,
            'Fecha' => $this->Fecha
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Egreso creado correctamente.');
    }

    public function edit($id)
    {
        $record = Egreso::findOrFail($id);
        $this->selected_id = $id;
        $this->Detalle = $record->Detalle;
        $this->Valor = $record->Valor;
        $this->Fecha = $record->Fecha;
    }

    public function update()
    {
        $this->validate([
            'Detalle' => 'required',
            'Valor' => 'required',
            'Fecha' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Egreso::find($this->selected_id);
            $record->update([
                'Detalle' => $this->Detalle,
                'Valor' => $this->Valor,
                'Fecha' => $this->Fecha
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Egreso actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Egreso::where('id', $id)->delete();
        }

        $this->resetInput();
        session()->flash('message', 'Egreso eliminado correctamente.');
    }
}
