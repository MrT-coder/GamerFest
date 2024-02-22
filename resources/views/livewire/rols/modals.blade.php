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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyDataModalLabel">Eliminar Rol</h5>
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
                    {{-- <input wire:model="contadorRegistrosConflictivos" type="text" disabled> --}}
                </form>
                {{-- <ol>
                    @foreach ($listaRegistrosConflictivos as $listaRegistrosConflictivos)
                    <li>{{ $listaRegistrosConflictivos->nombre }}</li>
                    @endforeach
                </ol> --}}

                @if ($contadorRegistrosConflictivos > 0)
                <div class="alert bg-warning-subtle border-warning" role="alert">
                    <h4 class="alert-heading fw-bold">Conflictos existentes</h4>
                    <p>El rol que intenta eliminar está asignado a <strong>{{ $contadorRegistrosConflictivos }}</strong>
                        usuarios. Por favor
                        seleccione un rol para reasignar a los usuarios afectados.</p>
                    <p class="mb-0"><strong>Rol a eliminar:</strong> {{ $nombre_rol }}</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered table-striped">
                        <thead class="thead text-center">
                            <tr>
                                <th class="col-1">#</td>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listaRegistrosConflictivos as $listaRegistrosConflictivos)
                            <tr>
                                <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $listaRegistrosConflictivos->nombre }}</td>
                                <td class="align-middle">{{ $listaRegistrosConflictivos->apellido }}</td>
                                <td class="align-middle">
                                    {{-- Lista desplegable con todos los roles excepto el que se quiere eliminar --}}
                                    @if ($listaRoles->count())
                                    <select wire:model="id_rol_nuevo" class="form-control" id="id_rol_nuevo">
                                        <option value="">Selecciona un rol</option>
                                        @foreach ($listaRoles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                                        @endforeach
                                        @else
                                        <select wire:model="id_rol_nuevo" class="form-control" id="id_rol_nuevo"
                                            disabled>
                                            <option value="">No hay otros roles disponibles.</option>
                                            @endif
                                        </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>
                    @if ($contadorRegistrosConflictivos > 0)
                    <button type="button" class="btn btn-danger" disabled data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-title="Tooltip on top">
                        <i class="fa-solid fa-trash"></i>
                        Conflictos existentes
                    </button>
                    @else
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-danger"><i
                            class="fa-solid fa-trash"></i> Eliminar</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>