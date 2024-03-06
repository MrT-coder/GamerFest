<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Rol</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre_rol">Nombre del rol</label>
                        <input wire:model="nombre_rol" type="text" class="form-control" id="nombre_rol"
                            placeholder="Rol">
                        @error('nombre_rol')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i> Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-success"><i
                        class="fa fa-check"></i> Crear</button>
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Rol</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nombre_rol">Nombre del rol</label>
                        <input wire:model="nombre_rol" type="text" class="form-control" id="nombre_rol"
                            placeholder="Rol">
                        @error('nombre_rol')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="fas fa-times"></i> Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-warning"><i
                        class="fas fa-pen"></i> Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="destroyDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="destroyModalLabel" aria-hidden="true">
    <div class="modal-dialog
    @if ($contadorRegistrosConflictivos > 0)
        modal-xl
    @endif
    modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyDataModalLabel">Eliminar Rol</h5>
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
                    @if ($contadorRegistrosConflictivos > 0)
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading fw-bold">Conflictos existentes</h4>
                        <p>El rol que intenta eliminar está asignado a
                            <strong>{{ $contadorRegistrosConflictivos }}</strong>
                            usuarios. Por favor seleccione un rol para reasignar a los usuarios afectados.
                        </p>
                        <p class="mb-0"><strong>Rol a eliminar:</strong> {{ $nombre_rol }}</p>
                    </div>
                    <h4 class="text-center fw-bold">Lista de usuarios con conflictos</h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="thead text-center">
                                <tr>
                                    <th class="col-1">#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaUsuariosConflictivos as $registro)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $registro->nombre }}</td>
                                    <td class="align-middle">{{ $registro->apellido }}</td>
                                    <td class="align-middle">
                                        @if ($listaSinRegistro->count())
                                        <select wire:model="selected_roles_usuarios.{{ $loop->index }}"
                                            class="form-control" id="id_rol_nuevo_{{ $loop->index }}">
                                            <option value="">Selecciona un rol</option>
                                            @foreach ($listaSinRegistro as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" id="id_rol_nuevo_{{ $loop->index }}" disabled>
                                            <option value="">No hay otros roles disponibles.</option>
                                        </select>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </form>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    @if ($contadorRegistrosConflictivos > 0)
                    @if ($selected_roles_usuarios && count(array_filter($selected_roles_usuarios)) ==
                    $contadorRegistrosConflictivos)
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Eliminar
                    </button>
                    @else
                    <button type="button" class="btn btn-warning" disabled>
                        <i class="fas fa-exclamation-triangle"></i> Conflictos existentes
                    </button>
                    @endif
                    @else
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Eliminar
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>