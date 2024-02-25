<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Crear Nuevo Juego</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input wire:model="nombre" type="text" class="form-control" id="nombre"
                                placeholder="Fortnite">
                            @error('nombre')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="modalidad">Modalidad</label>
                                <input wire:model="modalidad" type="text" class="form-control" id="modalidad"
                                    placeholder="Un jugador, duo, squad">
                                @error('modalidad')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="costo">Costo</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input wire:model="costo" type="number" class="form-control" id="costo"
                                        placeholder="Costo">
                                </div>
                                @error('costo')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea wire:model="descripcion" type="text" class="form-control" id="descripcion"
                                placeholder="Descripcion" rows="3"></textarea>
                            @error('descripcion')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="ruta_foto_principal">Foto principal</label>
                                <input wire:model="ruta_foto_principal" type="file" class="form-control"
                                    id="ruta_foto_principal">
                                @error('ruta_foto_principal')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                <div class="w-100 m-2 text-center" wire:loading wire:target="ruta_foto_principal">
                                    <button class="btn btn-outline-dark" disabled>
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <span role="status">Cargando...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="ruta_foto_portada">Foto portada</label>
                                <input wire:model="ruta_foto_portada" type="file" class="form-control"
                                    id="ruta_foto_portada">
                                @error('ruta_foto_portada')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                <div class="w-100 m-2 text-center" wire:loading wire:target="ruta_foto_portada">
                                    <button class="btn btn-outline-dark" disabled>
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <span role="status">Cargando...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal"><i
                        class="fa-solid fa-xmark"></i> Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-success"><i
                        class="fa-solid fa-plus"></i>
                    Crear</button>
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Juego</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <input type="hidden" wire:model="selected_id">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input wire:model="nombre" type="text" class="form-control" id="nombre"
                                placeholder="Fortnite">
                            @error('nombre')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="modalidad">Modalidad</label>
                                <input wire:model="modalidad" type="text" class="form-control" id="modalidad"
                                    placeholder="Un jugador, duo, squad">
                                @error('modalidad')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="costo">Costo</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input wire:model="costo" type="number" class="form-control" id="costo"
                                        placeholder="Costo">
                                </div>
                                @error('costo')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea wire:model="descripcion" type="text" class="form-control" id="descripcion"
                                placeholder="Descripcion" rows="3"></textarea>
                            @error('descripcion')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="ruta_foto_principal">Foto principal</label>
                                <input wire:model="ruta_foto_principal" type="file" class="form-control"
                                    id="ruta_foto_principal">
                                @error('ruta_foto_principal')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                <div class="w-100 m-2 text-center" wire:loading wire:target="ruta_foto_principal">
                                    <button class="btn btn-outline-dark" disabled>
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <span role="status">Cargando...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="ruta_foto_portada">Foto portada</label>
                                <input wire:model="ruta_foto_portada" type="file" class="form-control"
                                    id="ruta_foto_portada">
                                @error('ruta_foto_portada')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                <div class="w-100 m-2 text-center" wire:loading wire:target="ruta_foto_portada">
                                    <button class="btn btn-outline-dark" disabled>
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <span role="status">Cargando...</span>
                                    </button>
                                </div>
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
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyModalLabel">Eliminar Juego</h5>
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