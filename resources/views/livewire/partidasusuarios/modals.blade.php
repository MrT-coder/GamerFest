<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Crear Nueva Partida - Usuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id_partidas">Partida</label>
                                @if ($partidas->count())
                                <select wire:model="id_partidas" class="form-control" id="id_partidas">
                                    <option value="">Seleccione una partida</option>
                                    @foreach ($partidas as $partida)
                                    <option value="{{ $partida->id }}">{{ $partida->id }}</option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_partidas" class="form-control" id="id_partidas" disabled>
                                        <option value="">No hay partidas disponibles</option>
                                        @endif
                                    </select>
                                    @error('id_partidas')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="id_usuarios">Usuario</label>
                                @if ($usuarios->count())
                                <select wire:model="id_usuarios" class="form-control" id="id_usuarios">
                                    <option value="">Seleccione un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido }}
                                    </option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_usuarios" class="form-control" id="id_usuarios" disabled>
                                        <option value="">No hay usuarios disponibles</option>
                                        @endif
                                    </select>
                                    @error('id_usuarios')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="gana">Resultado</label>
                            <input wire:model="gana" type="text" class="form-control" id="gana" placeholder="Gana">
                            @error('gana')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal"><i
                        class="fa-solid fa-xmark"></i> Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-success"><i
                        class="fa-solid fa-plus"></i> Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Partida - Usuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id_partidas">Partida</label>
                                @if ($partidas->count())
                                <select wire:model="id_partidas" class="form-control" id="id_partidas">
                                    <option value="">Seleccione una partida</option>
                                    @foreach ($partidas as $partida)
                                    <option value="{{ $partida->id }}">{{ $partida->id }}</option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_partidas" class="form-control" id="id_partidas" disabled>
                                        <option value="">No hay partidas disponibles</option>
                                        @endif
                                    </select>
                                    @error('id_partidas')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="id_usuarios">Usuario</label>
                                @if ($usuarios->count())
                                <select wire:model="id_usuarios" class="form-control" id="id_usuarios">
                                    <option value="">Seleccione un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido }}
                                    </option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_usuarios" class="form-control" id="id_usuarios" disabled>
                                        <option value="">No hay usuarios disponibles</option>
                                        @endif
                                    </select>
                                    @error('id_usuarios')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="gana">Resultado</label>
                            <input wire:model="gana" type="text" class="form-control" id="gana" placeholder="Gana">
                            @error('gana')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="fa-solid fa-xmark"></i> Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-warning"><i
                        class="fa-solid fa-pen-to-square"></i> Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="destroyDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="destroyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyModalLabel">Eliminar Partida - Usuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert bg-danger-subtle border-danger" role="alert">
                    <h4 class="alert-heading fw-bold">¿Está seguro de eliminar este registro?</h4>
                    <strong>¡Cuidado!</strong> Esta acción no se puede deshacer.
                </div>
                <form>
                    <input type="hidden" wire:model="selected_id">
                </form>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i> Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>