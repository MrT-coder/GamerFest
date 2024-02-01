@section('title', __('Generar Partidas'))
<div>

    <label>Juego:</label>
    <select wire:model="selectedJuego">
        @foreach($juegos as $juego)
            <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
        @endforeach

    </select>
    <br>
    <label>Supervisor:</label>
    <select wire:model="selectedSupervisor">
        @foreach($supervisores as $supervisor)
            <option value="{{ $supervisor->id }}">{{ $supervisor->nombre }} {{ $supervisor->apellido }}</option>
        @endforeach
    </select>
    <br>
    <label>Hora de inicio:</label>
    <input type="time" wire:model="horaInicio">
    <br>
    <label>Fecha:</label>
    <input wire:model="selectedfecha" type="date">
    <br>
  <!-- <button wire:click.prevent="generarPartidas">Generar Partidas</button> -->
    <button wire:click="generarPartidas">Generar Partidas</button>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

