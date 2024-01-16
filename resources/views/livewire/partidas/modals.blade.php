<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Partida</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_juegos"></label>
                        <input wire:model="id_juegos" type="text" class="form-control" id="id_juegos" placeholder="Id Juegos">@error('id_juegos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_usuarios"></label>
                        <input wire:model="id_usuarios" type="text" class="form-control" id="id_usuarios" placeholder="Id Usuarios">@error('id_usuarios') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="salon"></label>
                        <input wire:model="salon" type="text" class="form-control" id="salon" placeholder="Salon">@error('salon') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input wire:model="fecha" type="date" class="form-control" id="Fecha" placeholder="Fecha">
                        @error('Fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> 
                    
                    <div class="form-group">
                        <label for="hora_inicio">Fecha y Hora</label>
                        <input wire:model="hora_inicio" type="datetime-local" class="form-control" id="hora_inicio" placeholder="Fecha y Hora">
                        @error('hora_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="hora_fin">Fecha y Hora</label>
                        <input wire:model="hora_fin" type="datetime-local" class="form-control" id="hora_fin" placeholder="Fecha y Hora">
                        @error('hora_fin') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="estado"></label>
                        <input wire:model="estado" type="text" class="form-control" id="estado" placeholder="Estado">@error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Partida</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_juegos"></label>
                        <input wire:model="id_juegos" type="text" class="form-control" id="id_juegos" placeholder="Id Juegos">@error('id_juegos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_usuarios"></label>
                        <input wire:model="id_usuarios" type="text" class="form-control" id="id_usuarios" placeholder="Id Usuarios">@error('id_usuarios') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="salon"></label>
                        <input wire:model="salon" type="text" class="form-control" id="salon" placeholder="Salon">@error('salon') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input wire:model="fecha" type="date" class="form-control" id="Fecha" placeholder="Fecha">
                            @error('Fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div> 
                    
                        <div class="form-group">
                        <label for="hora_inicio">Fecha y Hora</label>
                        <input wire:model="hora_inicio" type="datetime-local" class="form-control" id="hora_inicio" placeholder="Fecha y Hora">
                        @error('hora_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="hora_fin">Fecha y Hora</label>
                        <input wire:model="hora_fin" type="datetime-local" class="form-control" id="hora_fin" placeholder="Fecha y Hora">
                        @error('hora_fin') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="estado"></label>
                        <input wire:model="estado" type="text" class="form-control" id="estado" placeholder="Estado">@error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
