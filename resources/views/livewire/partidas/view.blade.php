@section('title', __('Partidas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-chess text-black-50"></i>
							Partidas</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Partidas">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Partida
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.partidas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th> Juego</th>
								<th>Usuario</th>
								<th>Salón</th>
								<th>Fecha</th>
								<th>Hora Inicio</th>
								<th>Hora Fin</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse($partidas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_juegos }}</td>
								<td>{{ $row->id_usuarios }}</td>
								<td>{{ $row->salon }}</td>
								<td>{{ $row->fecha }}</td>
								<td>{{ $row->hora_inicio }}</td>
								<td>{{ $row->hora_fin }}</td>
								<td>{{ $row->estado }}</td>
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
					<div class="float-end">{{ $partidas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>