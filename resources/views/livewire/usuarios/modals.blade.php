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