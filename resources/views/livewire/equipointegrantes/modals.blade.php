<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Crear Nuevo Equipo - Integrante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_usu"></label>
                        <input wire:model="id_usu" type="text" class="form-control" id="id_usu" placeholder="Id Usu">@error('id_usu') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_equ"></label>
                        <input wire:model="id_equ" type="text" class="form-control" id="id_equ" placeholder="Id Equ">@error('id_equ') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="isLider"></label>
                        <input wire:model="isLider" type="text" class="form-control" id="isLider" placeholder="Islider">@error('isLider') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Equipo - Integrante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_usu"></label>
                        <input wire:model="id_usu" type="text" class="form-control" id="id_usu" placeholder="Id Usu">@error('id_usu') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_equ"></label>
                        <input wire:model="id_equ" type="text" class="form-control" id="id_equ" placeholder="Id Equ">@error('id_equ') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="isLider"></label>
                        <input wire:model="isLider" type="text" class="form-control" id="isLider" placeholder="Islider">@error('isLider') <span class="error text-danger">{{ $message }}</span> @enderror
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
