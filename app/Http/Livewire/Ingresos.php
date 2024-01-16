<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ingreso;

class Ingresos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Detalle, $Valor, $Fecha;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.ingresos.view', [
            'ingresos' => Ingreso::latest()
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

        Ingreso::create([
            'Detalle' => $this->Detalle,
            'Valor' => $this->Valor,
            'Fecha' => $this->Fecha
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Ingreso creado correctamente.');
    }

    public function edit($id)
    {
        $record = Ingreso::findOrFail($id);
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
            $record = Ingreso::find($this->selected_id);
            $record->update([
                'Detalle' => $this->Detalle,
                'Valor' => $this->Valor,
                'Fecha' => $this->Fecha
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Ingreso actualziado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Ingreso::where('id', $id)->delete();
        }

        $this->resetInput();
        session()->flash('message', 'Ingreso eliminado correctamente.');
    }
}
