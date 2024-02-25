<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partida;
use App\Models\Juego;
use App\Models\Usuario;

class Partidas extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $id_juegos, $id_usuarios, $salon, $fecha, $hora_inicio, $hora_fin, $estado, $nombre_juego, $nombre_usuario, $apellido_usuario, $contadorRegistrosConflictivos = 0, $listaPartidasUsuariosConflictivos = [], $listaSinRegistro = [], $id_partida_nuevo, $selected_partidas_partidasusuarios = [];

	protected $rules = [
		'id_juegos' => 'required',
		'id_usuarios' => 'required',
		'salon' => 'required|max:255',
		'fecha' => 'required|date',
		'hora_inicio' => 'required|date_format:H:i',
		'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
		'estado' => 'required|max:255',
	];

	protected $messages = [
		'required' => 'Campo requerido.',
		'salon.max' => 'Escribe menos de 255 caracteres.',
		'fecha.date' => 'Escribe una fecha válida.',
		'hora_inicio.date_format' => 'Escribe una hora válida.',
		'hora_fin.date_format' => 'Escribe una hora válida.',
		'hora_fin.after' => 'Escribe una hora posterior a la hora de inicio.',
		'estado.max' => 'Escribe menos de 255 caracteres.',
	];

	public function updated($id)
	{
		$this->validateOnly($id, [
			'id_juegos' => 'required',
			'id_usuarios' => 'required',
			'salon' => 'required|max:255',
			'fecha' => 'required|date',
			'hora_inicio' => 'required|date_format:H:i',
			'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
			'estado' => 'required|max:255',
		]);
	}

	public function render()
	{
		$keyWord = '%' . $this->keyWord . '%';
		return view('livewire.partidas.view', [
			'partidas' => Partida::with('juego', 'usuario')->latest()
				->orWhere('id_juegos', 'LIKE', $keyWord)
				->orWhere('id_usuarios', 'LIKE', $keyWord)
				->orWhere('salon', 'LIKE', $keyWord)
				->orWhere('fecha', 'LIKE', $keyWord)
				->orWhere('hora_inicio', 'LIKE', $keyWord)
				->orWhere('hora_fin', 'LIKE', $keyWord)
				->orWhere('estado', 'LIKE', $keyWord)
				->paginate(10),
			'juegos' => Juego::all(),
			'usuarios' => Usuario::all(),
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
		$this->selected_id = null;
		$this->contadorRegistrosConflictivos = 0;
		$this->listaPartidasUsuariosConflictivos = [];
		$this->listaSinRegistro = [];
		$this->id_partida_nuevo = null;
		$this->selected_partidas_partidasusuarios = [];
	}

	public function store()
	{
		$this->validate();

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
		$this->validate();

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

	public function delete($id)
    {
		$record = Partida::find($id);
        $this->selected_id = $id;
		$this->nombre_juego = $record->juego->nombre;
		$this->nombre_usuario = $record->usuario->nombre;
		$this->apellido_usuario = $record->usuario->apellido;
		$this->salon = $record->salon;
		$this->contadorRegistrosConflictivos = $record->partidasusuarios->count();
		$this->listaPartidasUsuariosConflictivos = $record->partidasusuarios;
		$this->selected_partidas_partidasusuarios = array_fill(0, $this->contadorRegistrosConflictivos, '');
		$this->listaSinRegistro = Partida::where('id', '!=', $id)->get();
    }

	public function destroy()
	{
		if ($this->selected_id) {
			if ($this->contadorRegistrosConflictivos > 0) {
				foreach ($this->listaPartidasUsuariosConflictivos as $index => $partidausuario) {
					$partidausuario->update([
						'id_partidas' => $this->selected_partidas_partidasusuarios[$index]
					]);
				}
			}

            $record = Partida::find($this->selected_id);
            $record->delete();
            
            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Partida eliminada correctamente.');
        }
	}
}
