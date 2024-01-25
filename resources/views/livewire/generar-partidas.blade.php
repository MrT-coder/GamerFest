
@extends('adminlte::page')
@extends('layouts.app')


@section('content')
    <div>
        <label>Juego:</label>
        <select wire:model="selectedJuego">
            @foreach($juegos as $juego)
                <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
            @endforeach 
                  
        </select>
        <label>Supervisor:</label>
        <select wire:model="selectedSupervisor">
            @foreach($supervisores as $supervisor)
                <option value="{{ $supervisor->id }}">{{ $supervisor->nombre }} {{ $supervisor->apellido }}</option>
            @endforeach
        </select>

        <label>Hora de inicio:</label>
        <input type="time" wire:model="horaInicio">

        <button wire:click="generarPartidas">Generar Partidas</button>
     
    </div>
@endsection 