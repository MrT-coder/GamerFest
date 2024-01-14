@section('title', __('Usuarios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa fa-user-plus text-info"></i>
							Usuarios </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.usuarios.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Id Rol</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Telefono</th>
								<th>Universidad</th>
								<th>Carrera</th>
								<th>Semestre</th>
								<th>Email</th>
								<th>Pass</th>
								<th>Activo</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($usuarios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_rol }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->apellido }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->universidad }}</td>
								<td>{{ $row->carrera }}</td>
								<td>{{ $row->semestre }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->pass }}</td>
								<td>{{ $row->activo }}</td>
								<td width="90">
									<div class="dropdown">

										<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
										<a class="dropdown-item" onclick="confirm('Confirm Delete Rol id {{$row->id}}? \nDeleted Rols cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a> 

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
					<div class="float-end">{{ $usuarios->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>