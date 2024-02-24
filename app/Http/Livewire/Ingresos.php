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

    protected $rules = [
        'Detalle' => 'required|max:255',
        'Valor' => 'required|numeric|min:0|max:999',
        'Fecha' => 'required',
    ];

    protected $messages = [
        'required' => 'Campo requerido.',
        'Detalle.max' => 'Escribe menos de 255 caracteres.',
        'Valor.min' => 'Escribe un valor mayor o igual a 0.',
        'Valor.max' => 'Escribe un valor menor o igual a 999.',
    ];

    public function updated($id)
    {
        $this->validateOnly($id, [
            'Detalle' => 'required|max:255',
            'Valor' => 'required|numeric|min:0|max:999',
            'Fecha' => 'required',
        ]);
    }

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
        $this->validate();

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
        $this->validate();

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

    public function delete($id)
    {
        $record = Ingreso::find($id);
        $this->selected_id = $id;
    }

    public function destroy()
    {
        if ($this -> selected_id) {
            $record = Ingreso::find($this->selected_id);
            $record->delete();

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Ingreso eliminado correctamente.');
        }
    }
}
