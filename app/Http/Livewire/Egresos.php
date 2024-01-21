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
        $this->validate();

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
        $this->validate();

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
