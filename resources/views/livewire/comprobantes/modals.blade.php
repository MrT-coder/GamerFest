<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Crear Nuevo Comprobante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_usuarios">Usuario</label>
                        <input wire:model="id_usuarios" type="text" class="form-control" id="id_usuarios" placeholder="Id Usuarios">@error('id_usuarios') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_juegos">Juego</label>
                        <input wire:model="id_juegos" type="text" class="form-control" id="id_juegos" placeholder="Id Juegos">@error('id_juegos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_pago">Estado del pago</label>
                        <input wire:model="estado_pago" type="text" class="form-control" id="estado_pago" placeholder="Estado Pago">@error('estado_pago') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ruta_comprobante">Subir comprobante</label>
                        <input wire:model="ruta_comprobante" type="text" class="form-control" id="ruta_comprobante" placeholder="Ruta Comprobante">@error('ruta_comprobante') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-success"><i class="fa-solid fa-plus"></i> Crear</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Comprobante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_usuarios"></label>
                        <input wire:model="id_usuarios" type="text" class="form-control" id="id_usuarios" placeholder="Id Usuarios">@error('id_usuarios') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_juegos"></label>
                        <input wire:model="id_juegos" type="text" class="form-control" id="id_juegos" placeholder="Id Juegos">@error('id_juegos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_pago"></label>
                        <input wire:model="estado_pago" type="text" class="form-control" id="estado_pago" placeholder="Estado Pago">@error('estado_pago') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ruta_comprobante"></label>
                        <input wire:model="ruta_comprobante" type="text" class="form-control" id="ruta_comprobante" placeholder="Ruta Comprobante">@error('ruta_comprobante') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Actualizar</button>
            </div>
       </div>
    </div>
</div>
