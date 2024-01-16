<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Ingreso</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="Detalle"></label>
                        <input wire:model="Detalle" type="text" class="form-control" id="Detalle" placeholder="Detalle">@error('Detalle') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Valor"></label>
                        <input wire:model="Valor" type="text" class="form-control" id="Valor" placeholder="Valor">@error('Valor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Fecha"></label>
                        <input wire:model="Fecha" type="text" class="form-control" id="Fecha" placeholder="Fecha">@error('Fecha') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Ingreso</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="Detalle"></label>
                        <input wire:model="Detalle" type="text" class="form-control" id="Detalle" placeholder="Detalle">@error('Detalle') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Valor"></label>
                        <input wire:model="Valor" type="text" class="form-control" id="Valor" placeholder="Valor">@error('Valor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Fecha"></label>
                        <input wire:model="Fecha" type="text" class="form-control" id="Fecha" placeholder="Fecha">@error('Fecha') <span class="error text-danger">{{ $message }}</span> @enderror
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
