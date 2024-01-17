<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\Juego;

class Juegos extends Component
{
	use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $nombre, $modalidad, $costo, $ruta_foto_principal, $ruta_foto_portada, $descripcion;

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
	}

	public function store()
	{
		$this->validate([
			'nombre' => 'required',
			'modalidad' => 'required',
			'costo' => 'required',
			'ruta_foto_principal' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'ruta_foto_portada' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'descripcion' => 'required',
		]);

		$this->ruta_foto_principal = Juego::uploadImage($this->ruta_foto_principal, 'ruta_foto_principal');
		$this->ruta_foto_portada = Juego::uploadImage($this->ruta_foto_portada, 'ruta_foto_portada');

		Juego::create([
			'nombre' => $this->nombre,
			'modalidad' => $this->modalidad,
			'costo' => $this->costo,
			'ruta_foto_principal' => $this->ruta_foto_principal,
			'ruta_foto_portada' => $this->ruta_foto_portada,
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
		$this->validate([
			'nombre' => 'required',
			'modalidad' => 'required',
			'costo' => 'required',
			'ruta_foto_principal' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'ruta_foto_portada' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'descripcion' => 'required',
		]);

		if ($this->selected_id) {
			$record = Juego::find($this->selected_id);

			if ($this->ruta_foto_principal) {
				$this->ruta_foto_principal = $this->ruta_foto_principal->storeAs('ruta_foto_principal', uniqid('image') . '.' . $this->ruta_foto_principal->getClientOriginalExtension(), 'public');
			} else {
				$this->ruta_foto_principal = $record->ruta_foto_principal;
			}

			if ($this->ruta_foto_portada) {
				$this->ruta_foto_portada = $this->ruta_foto_portada->storeAs('ruta_foto_portada', uniqid('image') . '.' . $this->ruta_foto_portada->getClientOriginalExtension(), 'public');
			} else {
				$this->ruta_foto_portada = $record->ruta_foto_portada;
			}

			$record->update([
				'nombre' => $this->nombre,
				'modalidad' => $this->modalidad,
				'costo' => $this->costo,
				'ruta_foto_principal' => $this->ruta_foto_principal,
				'ruta_foto_portada' => $this->ruta_foto_portada,
				'descripcion' => $this->descripcion
			]);

			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Juego actualizado correctamente.');
		}
	}

	public function destroy($id)
	{
		if ($id) {
			Juego::where('id', $id)->delete();
		}

		$this->resetInput();
		session()->flash('message', 'Juego eliminado correctamente.');
	}
}
