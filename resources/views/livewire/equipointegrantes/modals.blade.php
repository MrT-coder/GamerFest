<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Crear Nuevo Equipo - Integrante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id_usu">Usuario</label>
                        @if ($usuarios->count())
                        <select wire:model="id_usu" class="form-control">
                            <option value="">Seleccione un Usuario</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }}
                                {{ $usuario->apellido }}
                            </option>
                            @endforeach
                            @else
                            <select wire:model="id_usu" class="form-control" disabled>
                                <option value="">No hay usuarios registrados</option>
                                @endif
                            </select>
                            @error('id_usu')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_equ">Equipo</label>
                        @if ($equipos->count())
                        <select wire:model="id_equ" class="form-control">
                            <option value="">Seleccione un Equipo</option>
                            @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre_equ }}</option>
                            @endforeach
                            @else
                            <select wire:model="id_equ" class="form-control" disabled>
                                <option value="">No hay equipos registrados</option>
                                @endif
                            </select>
                            @error('id_equ')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="isLider">¿El usuario es el líder del equipo?</label>
                        <select wire:model="isLider" class="form-control">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Lider</option>
                            <option value="0">No Lider</option>
                        </select>
                        @error('isLider')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i> Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-success"><i class="fa fa-check"></i>
                    Crear</button>
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Equipo - Integrante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_usu">Usuario</label>
                        @if ($usuarios->count())
                        <select wire:model="id_usu" class="form-control">
                            <option value="">Seleccione un Usuario</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }}
                                {{ $usuario->apellido }}
                            </option>
                            @endforeach
                            @else
                            <select wire:model="id_usu" class="form-control" disabled>
                                <option value="">No hay usuarios registrados</option>
                                @endif
                            </select>
                            @error('id_usu')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_equ">Equipo</label>
                        @if ($equipos->count())
                        <select wire:model="id_equ" class="form-control">
                            <option value="">Seleccione un Equipo</option>
                            @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre_equ }}</option>
                            @endforeach
                            @else
                            <select wire:model="id_equ" class="form-control" disabled>
                                <option value="">No hay equipos registrados</option>
                                @endif
                            </select>
                            @error('id_equ')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="isLider">¿El usuario es el líder del equipo?</label>
                        <select wire:model="isLider" class="form-control">
                            <option value="">Seleccione una opción</option>
                            <option value="1">Lider</option>
                            <option value="0">No Lider</option>
                        </select>
                        @error('isLider')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i> Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-warning"><i class="fas fa-pen"></i>
                    Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="destroyDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="destroyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyModalLabel">Eliminar Integrante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading fw-bold">¿Está seguro de eliminar este registro?</h4>
                    <strong>¡Cuidado!</strong> Esta acción no se puede deshacer.
                </div>
                <form>
                    <input type="hidden" wire:model="selected_id">
                </form>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>