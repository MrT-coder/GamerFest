@section('title', __('Partidas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Partida Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Partidas">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Partidas
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
								<th>Id Juegos</th>
								<th>Id Usuarios</th>
								<th>Salon</th>
								<th>Fecha</th>
								<th>Hora Inicio</th>
								<th>Hora Fin</th>
								<th>Estado</th>
								<td>ACTIONS</td>
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
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Partida id {{$row->id}}? \nDeleted Partidas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
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