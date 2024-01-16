<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partida;

class Partidas extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $id_juegos, $id_usuarios, $salon, $fecha, $hora_inicio, $hora_fin, $estado;

	public function render()
	{
		$keyWord = '%' . $this->keyWord . '%';
		return view('livewire.partidas.view', [
			'partidas' => Partida::latest()
				->orWhere('id_juegos', 'LIKE', $keyWord)
				->orWhere('id_usuarios', 'LIKE', $keyWord)
				->orWhere('salon', 'LIKE', $keyWord)
				->orWhere('fecha', 'LIKE', $keyWord)
				->orWhere('hora_inicio', 'LIKE', $keyWord)
				->orWhere('hora_fin', 'LIKE', $keyWord)
				->orWhere('estado', 'LIKE', $keyWord)
				->paginate(10),
		]);
	}

	public function cancel()
	{
		$this->resetInput();
	}

	private function resetInput()
	{
		$this->id_juegos = null;
		$this->id_usuarios = null;
		$this->salon = null;
		$this->fecha = null;
		$this->hora_inicio = null;
		$this->hora_fin = null;
		$this->estado = null;
	}

	public function store()
	{
		$this->validate([
			'id_juegos' => 'required',
			'id_usuarios' => 'required',
			'salon' => 'required',
			'fecha' => 'required',
			'hora_inicio' => 'required',
			'hora_fin' => 'required',
			'estado' => 'required',
		]);

		Partida::create([
			'id_juegos' => $this->id_juegos,
			'id_usuarios' => $this->id_usuarios,
			'salon' => $this->salon,
			'fecha' => $this->fecha,
			'hora_inicio' => $this->hora_inicio,
			'hora_fin' => $this->hora_fin,
			'estado' => $this->estado
		]);

		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Partida creada correctamente.');
	}

	public function edit($id)
	{
		$record = Partida::findOrFail($id);
		$this->selected_id = $id;
		$this->id_juegos = $record->id_juegos;
		$this->id_usuarios = $record->id_usuarios;
		$this->salon = $record->salon;
		$this->fecha = $record->fecha;
		$this->hora_inicio = $record->hora_inicio;
		$this->hora_fin = $record->hora_fin;
		$this->estado = $record->estado;
	}

	public function update()
	{
		$this->validate([
			'id_juegos' => 'required',
			'id_usuarios' => 'required',
			'salon' => 'required',
			'fecha' => 'required',
			'hora_inicio' => 'required',
			'hora_fin' => 'required',
			'estado' => 'required',
		]);

		if ($this->selected_id) {
			$record = Partida::find($this->selected_id);
			$record->update([
				'id_juegos' => $this->id_juegos,
				'id_usuarios' => $this->id_usuarios,
				'salon' => $this->salon,
				'fecha' => $this->fecha,
				'hora_inicio' => $this->hora_inicio,
				'hora_fin' => $this->hora_fin,
				'estado' => $this->estado
			]);

			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Partida actualizada correctamente.');
		}
	}

	public function destroy($id)
	{
		if ($id) {
			Partida::where('id', $id)->delete();
		}

		$this->resetInput();
		session()->flash('message', 'Partida eliminada correctamente.');
	}
}
