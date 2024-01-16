<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Usuario;
use App\Models\Rol;

class Usuarios extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $id_rol, $nombre, $apellido, $telefono, $universidad, $carrera, $semestre, $email, $pass, $activo;

	public function render()
	{
		$keyWord = '%' . $this->keyWord . '%';
		return view('livewire.usuarios.view', [
			'usuarios' => Usuario::latest()
				->orWhere('id_rol', 'LIKE', $keyWord)
				->orWhere('nombre', 'LIKE', $keyWord)
				->orWhere('apellido', 'LIKE', $keyWord)
				->orWhere('telefono', 'LIKE', $keyWord)
				->orWhere('universidad', 'LIKE', $keyWord)
				->orWhere('carrera', 'LIKE', $keyWord)
				->orWhere('semestre', 'LIKE', $keyWord)
				->orWhere('email', 'LIKE', $keyWord)
				->orWhere('pass', 'LIKE', $keyWord)
				->orWhere('activo', 'LIKE', $keyWord)
				->paginate(10),
			'roles' => Rol::all(), // Obtener todos los roles
		]);
	}

	public function cancel()
	{
		$this->resetInput();
	}

	private function resetInput()
	{
		$this->id_rol = null;
		$this->nombre = null;
		$this->apellido = null;
		$this->telefono = null;
		$this->universidad = null;
		$this->carrera = null;
		$this->semestre = null;
		$this->email = null;
		$this->pass = null;
		$this->activo = null;
	}

	public function store()
	{
		$this->validate([
			'id_rol' => 'required',
			'nombre' => 'required',
			'apellido' => 'required',
			'telefono' => 'required',
			'universidad' => 'required',
			'carrera' => 'required',
			'semestre' => 'required',
			'email' => 'required',
			'pass' => 'required',
			'activo' => 'required',
		]);

		Usuario::create([
			'id_rol' => $this->id_rol,
			'nombre' => $this->nombre,
			'apellido' => $this->apellido,
			'telefono' => $this->telefono,
			'universidad' => $this->universidad,
			'carrera' => $this->carrera,
			'semestre' => $this->semestre,
			'email' => $this->email,
			'pass' => $this->pass,
			'activo' => $this->activo
		]);

		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Usuario creado correctamente.');
	}

	public function edit($id)
	{
		$record = Usuario::findOrFail($id);
		$this->selected_id = $id;
		$this->id_rol = $record->id_rol;
		$this->nombre = $record->nombre;
		$this->apellido = $record->apellido;
		$this->telefono = $record->telefono;
		$this->universidad = $record->universidad;
		$this->carrera = $record->carrera;
		$this->semestre = $record->semestre;
		$this->email = $record->email;
		$this->pass = $record->pass;
		$this->activo = $record->activo;
	}

	public function update()
	{
		$this->validate([
			'id_rol' => 'required',
			'nombre' => 'required',
			'apellido' => 'required',
			'telefono' => 'required',
			'universidad' => 'required',
			'carrera' => 'required',
			'semestre' => 'required',
			'email' => 'required',
			'pass' => 'required',
			'activo' => 'required',
		]);

		if ($this->selected_id) {
			$record = Usuario::find($this->selected_id);
			$record->update([
				'id_rol' => $this->id_rol,
				'nombre' => $this->nombre,
				'apellido' => $this->apellido,
				'telefono' => $this->telefono,
				'universidad' => $this->universidad,
				'carrera' => $this->carrera,
				'semestre' => $this->semestre,
				'email' => $this->email,
				'pass' => $this->pass,
				'activo' => $this->activo
			]);

			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Usuario actualizado correctamente.');
		}
	}

	public function destroy($id)
	{
		if ($id) {
			Usuario::where('id', $id)->delete();
		}

		$this->resetInput();
		session()->flash('message', 'Usuario eliminado correctamente.');
	}
}
