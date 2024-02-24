<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comprobante;
use App\Models\Usuario;
use App\Models\Juego;
use Livewire\WithFileUploads;

class Comprobantes extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_usuarios, $id_juegos, $estado_pago, $ruta_comprobante;

    protected $rules = [
        'id_usuarios' => 'required',
        'id_juegos' => 'required',
        'estado_pago' => 'required|max:255',
        'ruta_comprobante' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $messages = [
        'required' => 'Campo requerido.',
        'id_usuarios.required' => 'Selecciona un usuario.',
        'id_juegos.required' => 'Selecciona un juego.',
        'estado_pago.max' => 'Escribe menos de 255 caracteres.',
        'ruta_comprobante.required' => 'Selecciona una imagen.',
        'ruta_comprobante.image' => 'Solo se permiten imágenes.',
        'ruta_comprobante.mimes' => 'Solo se permiten imágenes con formato jpeg, png, jpg, gif o svg.',
        'ruta_comprobante.max' => 'La imagen no debe pesar más de 2MB.',
    ];

    public function updated($id)
    {
        $this->validateOnly($id, [
            'id_usuarios' => 'required',
            'id_juegos' => 'required',
            'estado_pago' => 'required|max:255',
            'ruta_comprobante' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.comprobantes.view', [
            'comprobantes' => Comprobante::with('usuario', 'juego')->latest()
                ->orWhere('id_usuarios', 'LIKE', $keyWord)
                ->orWhere('id_juegos', 'LIKE', $keyWord)
                ->orWhere('estado_pago', 'LIKE', $keyWord)
                ->orWhere('ruta_comprobante', 'LIKE', $keyWord)
                ->paginate(10),
                'usuarios' => Usuario::all(),
                'juegos' => Juego::all(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->id_usuarios = null;
        $this->id_juegos = null;
        $this->estado_pago = null;
        $this->ruta_comprobante = null;
    }

    public function store()
    {
        $this->validate();

        Comprobante::create([
            'id_usuarios' => $this->id_usuarios,
            'id_juegos' => $this->id_juegos,
            'estado_pago' => $this->estado_pago,
            'ruta_comprobante' => $this->ruta_comprobante->store('public/comprobantes')
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Comprobante creado correctamente.');
    }

    public function edit($id)
    {
        $record = Comprobante::findOrFail($id);
        $this->selected_id = $id;
        $this->id_usuarios = $record->id_usuarios;
        $this->id_juegos = $record->id_juegos;
        $this->estado_pago = $record->estado_pago;
        $this->ruta_comprobante = $record->ruta_comprobante;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $record = Comprobante::find($this->selected_id);
            $record->update([
                'id_usuarios' => $this->id_usuarios,
                'id_juegos' => $this->id_juegos,
                'estado_pago' => $this->estado_pago,
                'ruta_comprobante' => $this->ruta_comprobante->store('public/comprobantes')
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Comprobante actualizado correctamente.');
        }
    }

    public function delete($id)
    {
        $this->selected_id = $id;
    }

    public function destroy()
    {
        if ($this->selected_id) {
            $record = Comprobante::find($this->selected_id);
            $record->delete();
            
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Comprobante eliminado correctamente.');
        }
    }
}
