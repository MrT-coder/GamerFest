<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rol;

class Rols extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_rol, $contadorRegistrosConflictivos = 0, $listaUsuariosConflictivos = [], $listaSinRegistro = [], $id_rol_nuevo, $selected_roles_usuarios = [];

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
        $record = Rol::find($id);
        $this->selected_id = $id;
        $this->nombre_rol = $record->nombre_rol;
        $this->contadorRegistrosConflictivos = $record->usuarios->count();
        // Obtener la lista de usuarios que tienen el rol a eliminar
        $this->listaUsuariosConflictivos = $record->usuarios;
        // Inicializar el array selected_roles_usuarios con valores por defecto para cada usuario
        $this->selected_roles_usuarios = array_fill(0, $this->contadorRegistrosConflictivos, '');
        // Devolver lista de roles sin el rol a eliminar
        $this->listaSinRegistro = Rol::where('id', '!=', $id)->get();
    }

    public function destroy()
    {
        if ($this->selected_id) {
            // Verificar si hay conflictos
            if ($this->contadorRegistrosConflictivos > 0) {
                // Cambiar el rol de los usuarios que tienen el rol a eliminar
                foreach ($this->listaUsuariosConflictivos as $index => $usuario) {
                    // Actualizar el rol del usuario
                    $usuario->update([
                        'id_rol' => $this->selected_roles_usuarios[$index] // Usar el rol seleccionado para este usuario
                    ]);
                }
            }

            $record = Rol::find($this->selected_id);
            $record->delete();
            
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Rol eliminado correctamente.');
        }
    }
}
