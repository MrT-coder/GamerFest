<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Crear Nueva Partida</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id_juegos">Juego</label>
                                @if ($juegos->count())
                                <select wire:model="id_juegos" class="form-control" id="id_juegos">
                                    <option value="">Seleccione un juego</option>
                                    @foreach ($juegos as $juego)
                                    <option value="{{ $juego->id }}">{{ $juego->nombre }} -
                                        {{ $juego->modalidad }}</option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_juegos" class="form-control" id="id_juegos" disabled>
                                        <option value="">No hay juegos registrados</option>
                                        @endif
                                    </select>
                                    @error('id_juegos')
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
                                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}
                                        {{ $usuario->apellido }}</option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_usuarios" class="form-control" id="id_usuarios" disabled>
                                        <option value="">No hay usuarios registrados</option>
                                        @endif
                                    </select>
                                    @error('id_usuarios')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="salon">Salón</label>
                                <input wire:model="salon" type="text" class="form-control" id="salon"
                                    placeholder="Salon">
                                @error('salon')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input wire:model="estado" type="text" class="form-control" id="estado"
                                    placeholder="Estado">
                                @error('estado')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input wire:model="fecha" type="date" class="form-control" id="Fecha"
                                    placeholder="Fecha">
                                @error('fecha')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hora_inicio">Hora de inicio</label>
                                <input wire:model="hora_inicio" type="time" class="form-control" id="hora_inicio"
                                    placeholder="Fecha y Hora">
                                @error('hora_inicio')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hora_fin">Hora de finalización</label>
                                <input wire:model="hora_fin" type="time" class="form-control" id="hora_fin"
                                    placeholder="Fecha y Hora">
                                @error('hora_fin')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Partida</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id_juegos">Juego</label>
                                @if ($juegos->count())
                                <select wire:model="id_juegos" class="form-control" id="id_juegos">
                                    <option value="">Seleccione un juego</option>
                                    @foreach ($juegos as $juego)
                                    <option value="{{ $juego->id }}">{{ $juego->nombre }} -
                                        {{ $juego->modalidad }}</option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_juegos" class="form-control" id="id_juegos" disabled>
                                        <option value="">No hay juegos registrados</option>
                                        @endif
                                    </select>
                                    @error('id_juegos')
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
                                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}
                                        {{ $usuario->apellido }}</option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_usuarios" class="form-control" id="id_usuarios" disabled>
                                        <option value="">No hay usuarios registrados</option>
                                        @endif
                                    </select>
                                    @error('id_usuarios')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="salon">Salón</label>
                                <input wire:model="salon" type="text" class="form-control" id="salon"
                                    placeholder="Salon">
                                @error('salon')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input wire:model="estado" type="text" class="form-control" id="estado"
                                    placeholder="Estado">
                                @error('estado')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input wire:model="fecha" type="date" class="form-control" id="Fecha"
                                    placeholder="Fecha">
                                @error('Fecha')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hora_inicio">Hora de inicio</label>
                                <input wire:model="hora_inicio" type="time" class="form-control" id="hora_inicio"
                                    placeholder="Fecha y Hora">
                                @error('hora_inicio')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hora_fin">Hora de finalización</label>
                                <input wire:model="hora_fin" type="time" class="form-control" id="hora_fin"
                                    placeholder="Fecha y Hora">
                                @error('hora_fin')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
                <h5 class="modal-title" id="destroyModalLabel">Eliminar Partida</h5>
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