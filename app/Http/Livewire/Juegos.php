<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Juego;

class Juegos extends Component
{
	use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $nombre, $modalidad, $costo, $ruta_foto_principal, $ruta_foto_portada, $descripcion, $contadorRegistrosConflictivos = 0, $contadorPartidasConflictivos = 0, $contadorComprobantesConflictivos = 0, $listaPartidasConflictivos = [], $listaComprobantesConflictivos = [], $listaSinRegistro = [], $id_juego_nuevo, $selected_juegos_partidas = [], $selected_juegos_comprobantes = [];

	protected $rules = [
		'nombre' => 'required|max:100',
		'modalidad' => 'required|max:100',
		'costo' => 'required|numeric|min:0|max:999',
		'ruta_foto_principal' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'ruta_foto_portada' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'descripcion' => 'required|min:3|max:255',
	];

	protected $messages = [
		'required' => 'Campo requerido.',
		'nombre.max' => 'Escribe menos de 100 caracteres.',
		'modalidad.max' => 'Escribe menos de 100 caracteres.',
		'costo.numeric' => 'Escribe solo números.',
		'costo.min' => 'Escribe un número mayor o igual a 0.',
		'costo.max' => 'Escribe un número menor o igual a 999.',
		'ruta_foto_principal.image' => 'Solo se permiten imágenes.',
		'ruta_foto_principal.mimes' => 'Solo se permiten imágenes con formato jpeg, png, jpg, gif o svg.',
		'ruta_foto_principal.max' => 'La imagen no debe pesar más de 2MB.',
		'ruta_foto_portada.image' => 'Solo se permiten imágenes.',
		'ruta_foto_portada.mimes' => 'Solo se permiten imágenes con formato jpeg, png, jpg, gif o svg.',
		'ruta_foto_portada.max' => 'La imagen no debe pesar más de 2MB.',
		'descripcion.min' => 'Escribe al menos 3 caracteres.',
		'descripcion.max' => 'Escribe menos de 255 caracteres.',
	];

	public function updated($id)
	{
		$this->validateOnly($id, [
			'nombre' => 'required|max:100',
			'modalidad' => 'required|max:100',
			'costo' => 'required|numeric|min:0|max:999',
			'ruta_foto_principal' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'ruta_foto_portada' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'descripcion' => 'required|min:3|max:255',
		]);
	}

	public function render()
	{
		$keyWord = '%' . $this->keyWord . '%';
		return view('livewire.juegos.view', [
			'juegos' => Juego::latest()
				->orWhere('nombre', 'LIKE', $keyWord)
				->orWhere('modalidad', 'LIKE', $keyWord)
				->orWhere('costo', 'LIKE', $keyWord)
				->orWhere('ruta_foto_principal', 'LIKE', $keyWord)
				->orWhere('ruta_foto_portada', 'LIKE', $keyWord)
				->orWhere('descripcion', 'LIKE', $keyWord)
				->paginate(10),
		]);
	}

	public function cancel()
	{
		$this->resetInput();
	}

	private function resetInput()
	{
		$this->nombre = null;
		$this->modalidad = null;
		$this->costo = null;
		$this->ruta_foto_principal = null;
		$this->ruta_foto_portada = null;
		$this->descripcion = null;
		$this->selected_id = null;
		$this->contadorRegistrosConflictivos = 0;
		$this->contadorPartidasConflictivos = 0;
		$this->contadorComprobantesConflictivos = 0;
		$this->listaPartidasConflictivos = [];
		$this->listaComprobantesConflictivos = [];
		$this->listaSinRegistro = [];
		$this->id_juego_nuevo = null;
		$this->selected_juegos_partidas = [];
		$this->selected_juegos_comprobantes = [];
	}

	public function store()
	{
		$this->validate();

		Juego::create([
			'nombre' => $this->nombre,
			'modalidad' => $this->modalidad,
			'costo' => $this->costo,
			'ruta_foto_principal' => $this->ruta_foto_principal->store('public/juegos'),
			'ruta_foto_portada' => $this->ruta_foto_portada->store('public/juegos'),
			'descripcion' => $this->descripcion
		]);

		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Juego creado correctamente.');
	}

	public function edit($id)
	{
		$record = Juego::findOrFail($id);
		$this->selected_id = $id;
		$this->nombre = $record->nombre;
		$this->modalidad = $record->modalidad;
		$this->costo = $record->costo;
		$this->ruta_foto_principal = $record->ruta_foto_principal;
		$this->ruta_foto_portada = $record->ruta_foto_portada;
		$this->descripcion = $record->descripcion;
	}

	public function update()
	{
		$this->validate();

		if ($this->selected_id) {
			$record = Juego::find($this->selected_id);
			$record->update([
				'nombre' => $this->nombre,
				'modalidad' => $this->modalidad,
				'costo' => $this->costo,
				'ruta_foto_principal' => $this->ruta_foto_principal->store('public/juegos'),
				'ruta_foto_portada' => $this->ruta_foto_portada->store('public/juegos'),
				'descripcion' => $this->descripcion
			]);

			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Juego actualizado correctamente.');
		}
	}

	public function delete($id)
    {
		$record = Juego::find($id);
        $this->selected_id = $id;
		$this->nombre = $record->nombre;
		$this->modalidad = $record->modalidad;
		$this->contadorPartidasConflictivos = $record->partidas->count();
		$this->contadorComprobantesConflictivos = $record->comprobantes->count();
		$this->contadorRegistrosConflictivos = $this->contadorPartidasConflictivos + $this->contadorComprobantesConflictivos;
		$this->listaPartidasConflictivos = $record->partidas;
		$this->listaComprobantesConflictivos = $record->comprobantes;
		$this->selected_juegos_partidas = array_fill(0, $this->contadorPartidasConflictivos, '');
		$this->selected_juegos_comprobantes = array_fill(0, $this->contadorComprobantesConflictivos, '');
		$this->listaSinRegistro = Juego::where('id', '!=', $id)->get();
    }

	public function destroy()
	{
		if ($this->selected_id) {
			if ($this->contadorComprobantesConflictivos) {
				foreach ($this->listaComprobantesConflictivos as $index => $comprobante) {
					$comprobante->update([
						'id_juegos' => $this->selected_juegos_comprobantes[$index]
					]);
				}
			}

			if ($this->contadorPartidasConflictivos) {
				foreach ($this->listaPartidasConflictivos as $index => $partida) {
					$partida->update([
						'id_juegos' => $this->selected_juegos_partidas[$index]
					]);
				}
			}

            $record = Juego::find($this->selected_id);
            $record->delete();
            
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Juego eliminado correctamente.');
        }
	}
}
