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
    <div class="modal-dialog
    @if ($contadorRegistrosConflictivos > 0)
        modal-xl
    @endif
    modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyModalLabel">Eliminar Juego</h5>
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
                        <p>El juego que intenta eliminar está asignado a
                            <strong>{{ $contadorRegistrosConflictivos }}</strong>
                            registros. Por favor seleccione un juego para reasignar a los registros afectados.
                        </p>
                        <p class="mb-0"><strong>Juego a eliminar:</strong> {{ $nombre }} - {{ $modalidad }}</p>
                    </div>

                    @if ($contadorPartidasConflictivos > 0)
                    <h4 class="text-center fw-bold">Lista de Partidas con conflictos</h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="thead text-center">
                                <tr>
                                    <th class="col-1">#</th>
                                    <td>Usuario</td>
                                    <td>Salón</dh>
                                    <td>Fecha</td>
                                    <td>Juego</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaPartidasConflictivos as $registro)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $registro->usuario->nombre }} {{
                                        $registro->usuario->apellido }}</td>
                                    <td class="align-middle">{{ $registro->salon }}</td>
                                    <td class="align-middle">{{ $registro->fecha }}</td>
                                    <td class="align-middle">
                                        @if ($listaSinRegistro->count())
                                        <select wire:model="selected_juegos_partidas.{{ $loop->index }}"
                                            class="form-control" id="id_juego_nuevo_{{ $loop->index }}">
                                            <option value="">Selecciona un juego</option>
                                            @foreach ($listaSinRegistro as $juego)
                                            <option value="{{ $juego->id }}">{{ $juego->nombre }} - {{ $juego->modalidad
                                                }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" id="id_juego_nuevo_{{ $loop->index }}" disabled>
                                            <option value="">No hay otros juegos disponibles.</option>
                                        </select>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($contadorComprobantesConflictivos > 0)
                    <h4 class="text-center fw-bold">Lista de Comprobantes con conflictos</h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="thead text-center">
                                <tr>
                                    <th class="col-1">#</th>
                                    <td>Usuario</td>
                                    <td>Estado Pago</td>
                                    <td>Juego</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaComprobantesConflictivos as $registro)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $registro->usuario->nombre }} {{
                                        $registro->usuario->apellido }}</td>
                                    <td class="align-middle">{{ $registro->estado_pago }}</td>
                                    <td class="align-middle">
                                        @if ($listaSinRegistro->count())
                                        <select wire:model="selected_juegos_comprobantes.{{ $loop->index }}"
                                            class="form-control" id="id_juego_nuevo_{{ $loop->index }}">
                                            <option value="">Selecciona un juego</option>
                                            @foreach ($listaSinRegistro as $juego)
                                            <option value="{{ $juego->id }}">{{ $juego->nombre }} - {{ $juego->modalidad
                                                }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" id="id_juego_nuevo_{{ $loop->index }}" disabled>
                                            <option value="">No hay otros juegos disponibles.</option>
                                        </select>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @endif
                </form>
                <div class="modal-footer justify-content-between">
                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                        data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>
                    @if ($contadorRegistrosConflictivos > 0)
                    @if (count(array_filter($selected_juegos_partidas)) +
                    count(array_filter($selected_juegos_comprobantes)) == $contadorRegistrosConflictivos)
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i> Eliminar
                    </button>
                    @else
                    <button type="button" class="btn btn-danger" disabled>
                        <i class="fa-solid fa-trash"></i> Conflictos existentes
                    </button>
                    @endif
                    @else
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i> Eliminar
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>