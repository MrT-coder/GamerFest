@section('title', __('Juegos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-gamepad .text-light"></i>
							Juegos</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Juegos">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Juego
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.juegos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Modalidad</th>
								<th>Costo</th>
								<th>Ruta Foto Principal</th>
								<th>Ruta Foto Portada</th>
								<th>Descripción</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse($juegos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->modalidad }}</td>
								<td>{{ $row->costo }}</td>
								<td>{{ $row->ruta_foto_principal }}</td>
								<td>{{ $row->ruta_foto_portada }}</td>
								<td>{{ $row->descripcion }}</td>
								<td width="90">
									<div class="dropdown">

										<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
										<a class="dropdown-item" onclick="confirm('Confirm Delete Rol id {{$row->id}}? \nDeleted Rols cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a> 

								</div>						
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No hay información </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $juegos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>