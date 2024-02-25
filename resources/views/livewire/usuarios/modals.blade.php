<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Usuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                <input wire:model="nombre" type="text" class="form-control" id="nombre"
                                    placeholder="Nombre">
                                @error('nombre')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="apellido">Apellidos</label>
                                <input wire:model="apellido" type="text" class="form-control" id="apellido"
                                    placeholder="Apellido">
                                @error('apellido')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id_rol">Rol</label>
                                {{-- Si hay roles, despliega lista, sino, se reemplaza por "No hay roles disponibles"
                                --}}
                                @if ($roles->count())
                                <select wire:model="id_rol" class="form-control" id="id_rol">
                                    <option value="">Selecciona un rol</option>
                                    @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_rol" class="form-control" id="id_rol" disabled>
                                        <option value="">No hay roles disponibles</option>
                                        @endif
                                    </select>
                                    @error('id_rol')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="telefono">Celular</label>
                                <input wire:model="telefono" type="tel" class="form-control" id="telefono"
                                    placeholder="Celular" maxlength="10" min="1" step="1">
                                @error('telefono')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="universidad">Universidad</label>
                                <input wire:model="universidad" type="text" class="form-control" id="universidad"
                                    placeholder="ESPE">
                                @error('universidad')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <input wire:model="carrera" type="text" class="form-control" id="carrera"
                                    placeholder="Software">
                                @error('carrera')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="semestre">Semestre</label>
                                <input wire:model="semestre" type="number" class="form-control" id="semestre"
                                    placeholder="Ingresa un número">
                                @error('semestre')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input wire:model="email" type="email" class="form-control" id="email"
                                    placeholder="ejemplo@ejemplo.com">
                                @error('email')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="pass">Contraseña</label>
                                <input wire:model="pass" type="password" class="form-control" id="pass"
                                    placeholder="Mínimo 8 caracteres">
                                @error('pass')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="activo">Estado</label>
                                <select wire:model="activo" class="form-control" id="activo" placeholder="Activo">
                                    <option value="">Seleccione una opción...</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                                @error('activo')
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
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Usuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                <input wire:model="nombre" type="text" class="form-control" id="nombre"
                                    placeholder="Nombre">
                                @error('nombre')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="apellido">Apellidos</label>
                                <input wire:model="apellido" type="text" class="form-control" id="apellido"
                                    placeholder="Apellido">
                                @error('apellido')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id_rol">Rol</label>
                                @if ($roles->count())
                                <select wire:model="id_rol" class="form-control" id="id_rol">
                                    <option value="">Selecciona un rol</option>
                                    @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                                    @endforeach
                                    @else
                                    <select wire:model="id_rol" class="form-control" id="id_rol" disabled>
                                        <option value="">No hay roles disponibles</option>
                                        @endif
                                    </select>
                                    @error('id_rol')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="telefono">Celular</label>
                                <input wire:model="telefono" type="tel" class="form-control" id="telefono"
                                    placeholder="Celular" maxlength="10" min="1" step="1">
                                @error('telefono')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="universidad">Universidad</label>
                                <input wire:model="universidad" type="text" class="form-control" id="universidad"
                                    placeholder="Universidad">
                                @error('universidad')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <input wire:model="carrera" type="text" class="form-control" id="carrera"
                                    placeholder="Carrera">
                                @error('carrera')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="semestre">Semestre</label>
                                <input wire:model="semestre" type="number" class="form-control" id="semestre"
                                    placeholder="Ingresa un número">
                                @error('semestre')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input wire:model="email" type="email" class="form-control" id="email"
                                    placeholder="Email">
                                @error('email')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="pass">Contraseña</label>
                                <input wire:model="pass" type="text" class="form-control" id="pass" placeholder="Pass">
                                @error('pass')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="activo">Estado</label>
                                <select wire:model="activo" class="form-control" id="activo" placeholder="Activo">
                                    <option value="">Seleccione una opción...</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                                @error('activo')
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
    <div class="modal-dialog
    @if ($contadorRegistrosConflictivos > 0)
        modal-xl
    @endif
    modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyModalLabel">Eliminar Usuario</h5>
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
                    @if ($contadorPartidasUsuariosConflictivos > 0 || $contadorPartidasConflictivos > 0 ||
                    $contadorComprobantesConflictivos > 0 || $contadorEquiposIntegrantesConflictivos > 0)
                    <div class="alert bg-warning-subtle border-warning" role="alert">
                        <h4 class="alert-heading fw-bold">Conflictos existentes</h4>
                        <p>El usuario que intenta eliminar está asignado a
                            <strong>{{ $contadorRegistrosConflictivos }}</strong>
                            registros. Por favor seleccione un usuario para reasignar a los registros afectados.
                        </p>
                        <p class="mb-0"><strong>Usuario a eliminar:</strong> {{ $nombre }} {{ $apellido }}</p>
                    </div>

                    @if ($contadorPartidasUsuariosConflictivos > 0)
                    <h4 class="text-center fw-bold">Lista de Partidas - Usuarios con conflictos</h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="thead text-center">
                                <tr>
                                    <th class="col-1">#</th>
                                    <td>Partida</dh>
                                    <td>Juego</td>
                                    <td>Usuario</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaPartidasUsuariosConflictivos as $registro)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $registro->partida }}</td>
                                    <td class="align-middle">{{ $registro->juego->nombre }}</td>
                                    <td class="align-middle">
                                        @if ($listaSinRegistro->count())
                                        <select wire:model="selected_usuarios_partidasusuarios.{{ $loop->index }}"
                                            class="form-control" id="id_usuario_nuevo_{{ $loop->index }}">
                                            <option value="">Selecciona un usuario</option>
                                            @foreach ($listaSinRegistro as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{
                                                $usuario->apellido }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" id="id_usuario_nuevo_{{ $loop->index }}" disabled>
                                            <option value="">No hay otros usuarios disponibles.</option>
                                        </select>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($contadorPartidasConflictivos > 0)
                    <h4 class="text-center fw-bold">Lista de Partidas con conflictos</h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="thead text-center">
                                <tr>
                                    <th class="col-1">#</th>
                                    <td>Juego</td>
                                    <td>Salon</td>
                                    <td>Fecha</td>
                                    <td>Usuario</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaPartidasConflictivos as $registro)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $registro->juego->nombre }}</td>
                                    <td class="align-middle">{{ $registro->salon }}</td>
                                    <td class="align-middle">{{ $registro->fecha }}</td>
                                    <td class="align-middle">
                                        @if ($listaSinRegistro->count())
                                        <select wire:model="selected_usuarios_partidas.{{ $loop->index }}"
                                            class="form-control" id="id_usuario_nuevo_{{ $loop->index }}">
                                            <option value="">Selecciona un usuario</option>
                                            @foreach ($listaSinRegistro as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{
                                                $usuario->apellido }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" id="id_usuario_nuevo_{{ $loop->index }}" disabled>
                                            <option value="">No hay otros usuarios disponibles.</option>
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
                                    <td>Juego</td>
                                    <td>Estado Pago</td>
                                    <td>Usuario</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaComprobantesConflictivos as $registro)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $registro->juego->nombre }}</td>
                                    <td class="align-middle">{{ $registro->estado_pago }}</td>
                                    <td class="align-middle">
                                        @if ($listaSinRegistro->count())
                                        <select wire:model="selected_usuarios_comprobantes.{{ $loop->index }}"
                                            class="form-control" id="id_usuario_nuevo_{{ $loop->index }}">
                                            <option value="">Selecciona un usuario</option>
                                            @foreach ($listaSinRegistro as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{
                                                $usuario->apellido }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" id="id_usuario_nuevo_{{ $loop->index }}" disabled>
                                            <option value="">No hay otros usuarios disponibles.</option>
                                        </select>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($contadorEquiposIntegrantesConflictivos > 0)
                    <h4 class="text-center fw-bold">Lista de Equipos - Integrantes con conflictos</h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="thead text-center">
                                <tr>
                                    <th class="col-1">#</th>
                                    <td>Equipo</td>
                                    <td>Usuario</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaEquiposIntegrantesConflictivos as $registro)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">{{ $registro->equipo->nombre_equ }}</td>
                                    <td class="align-middle">
                                        @if ($listaSinRegistro->count())
                                        <select wire:model="selected_usuarios_equiposintegrantes.{{ $loop->index }}"
                                            class="form-control" id="id_usuario_nuevo_{{ $loop->index }}">
                                            <option value="">Selecciona un usuario</option>
                                            @foreach ($listaSinRegistro as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{
                                                $usuario->apellido }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <select class="form-control" id="id_usuario_nuevo_{{ $loop->index }}" disabled>
                                            <option value="">No hay otros usuarios disponibles.</option>
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
                    @if (count(array_filter($selected_usuarios_partidasusuarios)) +
                    count(array_filter($selected_usuarios_partidas)) +
                    count(array_filter($selected_usuarios_comprobantes)) +
                    count(array_filter($selected_usuarios_equiposintegrantes)) == $contadorRegistrosConflictivos)
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