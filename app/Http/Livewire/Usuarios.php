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
	public $selected_id, $keyWord, $id_rol, $nombre, $apellido, $telefono, $universidad, $carrera, $semestre, $email, $pass, $activo, $contadorRegistrosConflictivos = 0, $contadorPartidasUsuariosConflictivos = 0, $contadorPartidasConflictivos = 0, $contadorComprobantesConflictivos = 0, $contadorEquiposIntegrantesConflictivos = 0, $listaPartidasUsuariosConflictivos = [], $listaPartidasConflictivos = [], $listaComprobantesConflictivos = [], $listaEquiposIntegrantesConflictivos = [], $listaSinRegistro = [], $id_usuario_nuevo, $selected_usuarios_partidas = [], $selected_usuarios_partidasusuarios = [], $selected_usuarios_comprobantes = [], $selected_usuarios_equiposintegrantes = [];

	protected $rules = [
		'id_rol' => 'required',
		'nombre' => 'required|max:100',
		'apellido' => 'required|max:100',
		'telefono' => 'required|numeric|digits:10',
		'universidad' => 'required|max:100',
		'carrera' => 'required|max:100',
		'semestre' => 'required|numeric|integer|min:1|max:10',
		'email' => 'required|unique:usuarios,email|email|max:60',
		'pass' => 'required|min:8|max:60',
		'activo' => 'required',
	];

	protected $messages = [
		'required' => 'Campo requerido.',
		'nombre.max' => 'Escribe menos de 100 caracteres.',
		'apellido.max' => 'Escribe menos de 100 caracteres.',
		'telefono.numeric' => 'Escribe solo números.',
		'telefono.digits' => 'Escribe 10 dígitos.',
		'universidad.max' => 'Escribe menos de 100 caracteres.',
		'carrera.max' => 'Escribe menos de 100 caracteres.',
		'semestre.numeric' => 'Escribe solo números.',
		'semestre.integer' => 'Escribe solo números enteros.',
		'semestre.min' => 'Escribe un número mayor a 0.',
		'semestre.max' => 'Escribe un número menor a 11.',
		'email.unique' => 'Este email ya existe.',
		'email.email' => 'Escribe un email válido.',
		'email.max' => 'Escribe menos de 60 caracteres.',
		'pass.min' => 'Escribe al menos 8 caracteres.',
		'pass.max' => 'Escribe menos de 60 caracteres.',
	];

	public function updated($id)
	{
		$this->validateOnly($id, [
			'id_rol' => 'required',
			'nombre' => 'required|max:100',
			'apellido' => 'required|max:100',
			'telefono' => 'required|numeric|digits:10',
			'universidad' => 'required|max:100',
			'carrera' => 'required|max:100',
			'semestre' => 'required|numeric|integer|min:1|max:10',
			'email' => 'required|unique:usuarios,email|email|max:60',
			'pass' => 'required|min:8|max:60',
			'activo' => 'required',
		]);
	}

	public function render()
	{
		$keyWord = '%' . $this->keyWord . '%';
		return view('livewire.usuarios.view', [
			'usuarios' => Usuario::with('rol')->latest()
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
		$this->selected_id = null;
		$this->contadorPartidasUsuariosConflictivos = 0;
		$this->contadorPartidasConflictivos = 0;
		$this->contadorComprobantesConflictivos = 0;
		$this->contadorEquiposIntegrantesConflictivos = 0;
		$this->contadorRegistrosConflictivos = 0;
		$this->listaPartidasUsuariosConflictivos = [];
		$this->listaPartidasConflictivos = [];
		$this->listaComprobantesConflictivos = [];
		$this->listaEquiposIntegrantesConflictivos = [];
		$this->listaSinRegistro = [];
		$this->id_usuario_nuevo = null;
		$this->selected_usuarios_partidas = [];
		$this->selected_usuarios_partidasusuarios = [];
		$this->selected_usuarios_comprobantes = [];
		$this->selected_usuarios_equiposintegrantes = [];
	}

	public function store()
	{
		$this->validate();

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
		$this->validate();

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

	public function delete($id)
    {
		$record = Usuario::find($id);
        $this->selected_id = $id;
		$this->nombre = $record->nombre;
		$this->apellido = $record->apellido;
		$this->contadorPartidasUsuariosConflictivos = $record->partidasusuarios->count();
		$this->contadorPartidasConflictivos = $record->partidas->count();
		$this->contadorComprobantesConflictivos = $record->comprobantes->count();
		$this->contadorEquiposIntegrantesConflictivos = $record->equipointegrantes->count();
		$this->contadorRegistrosConflictivos = $this->contadorPartidasUsuariosConflictivos + $this->contadorPartidasConflictivos + $this->contadorComprobantesConflictivos + $this->contadorEquiposIntegrantesConflictivos;
		$this->listaPartidasUsuariosConflictivos = $record->partidasusuarios;
		$this->listaPartidasConflictivos = $record->partidas;
		$this->listaComprobantesConflictivos = $record->comprobantes;
		$this->listaEquiposIntegrantesConflictivos = $record->equipointegrantes;
		$this->selected_usuarios_partidasusuarios = array_fill(0, $this->contadorPartidasUsuariosConflictivos, '');
		$this->selected_usuarios_partidas = array_fill(0, $this->contadorPartidasConflictivos, '');
		$this->selected_usuarios_comprobantes = array_fill(0, $this->contadorComprobantesConflictivos, '');
		$this->selected_usuarios_equiposintegrantes = array_fill(0, $this->contadorEquiposIntegrantesConflictivos, '');
		$this->listaSinRegistro = Usuario::where('id', '!=', $id)->get();
    }

	public function destroy()
	{
		if ($this->selected_id) {
			if ($this->contadorPartidasUsuariosConflictivos) {
				foreach ($this->listaPartidasUsuariosConflictivos as $index => $partidausuario) {
					$partidausuario->update([
						'id_usuarios' => $this->selected_usuarios_partidasusuarios[$index]
					]);
				}
			}

			if ($this->contadorPartidasConflictivos) {
				foreach ($this->listaPartidasConflictivos as $index => $partida) {
					$partida->update([
						'id_usuarios' => $this->selected_usuarios_partidas[$index]
					]);
				}
			}

			if ($this->contadorComprobantesConflictivos) {
				foreach ($this->listaComprobantesConflictivos as $index => $comprobante) {
					$comprobante->update([
						'id_usuarios' => $this->selected_usuarios_comprobantes[$index]
					]);
				}
			}

			if ($this->contadorEquiposIntegrantesConflictivos) {
				foreach ($this->listaEquiposIntegrantesConflictivos as $index => $equipointegrante) {
					$equipointegrante->update([
						'id_usu' => $this->selected_usuarios_equiposintegrantes[$index]
					]);
				}
			}

            $record = Usuario::find($this->selected_id);
            $record->delete();
            
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Usuario eliminado correctamente.');
        }
	}
}
