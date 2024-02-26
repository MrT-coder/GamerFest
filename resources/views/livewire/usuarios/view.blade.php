@section('title', __('Usuarios'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fa fa-user-plus"></i>
                                Lista de Usuarios</h4>
                        </div>
                        @if (session()->has('message'))
                        <div wire:poll.5s class="btn btn-info placeholder-wave"
                            style="margin-top:0px; margin-bottom:0px;"><i class="fa-solid fa-circle-check"></i>
                            {{ session('message') }} </div>
                        @endif
                        <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Buscar Usuarios">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.usuarios.modals')
                    <div class="d-flex mb-3 justify-content-between align-items-center">
                        <p>Lista de usuarios.</p>
                        <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
                            <i class="fa fa-plus"></i> Añadir Usuario
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="thead text-center">
                                <tr>
                                    <th class="col-1">#</td>
                                    <th>Rol</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Teléfono</th>
                                    <th>Universidad</th>
                                    <th>Carrera</th>
                                    <th>Semestre</th>
                                    <th>Email</th>
                                    <th>Activo</th>
                                    <th class="col-2">Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($usuarios as $row)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $row->rol->nombre_rol }}</td>
                                    <td class="align-middle">{{ $row->nombre }}</td>
                                    <td class="align-middle">{{ $row->apellido }}</td>
                                    <td class="align-middle">{{ $row->telefono }}</td>
                                    <td class="align-middle">{{ $row->universidad }}</td>
                                    <td class="align-middle">{{ $row->carrera }}</td>
                                    <td class="align-middle">{{ $row->semestre }}</td>
                                    <td class="align-middle">{{ $row->email }}</td>
                                    <td class="align-middle">{{ $row->activo }}</td>
                                    <td class="text-center align-middle">
                                        <div>
                                            <a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                                class="btn btn-sm btn-warning m-1" wire:click="edit({{ $row->id }})"><i
                                                    class="fa fa-edit"></i>
                                                Editar </a>
                                            <a data-bs-toggle="modal" data-bs-target="#destroyDataModal"
                                                class="btn btn-sm btn-danger m-1" wire:click="delete({{ $row->id }})"><i
                                                    class="fa fa-trash"></i>
                                                Eliminar </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="table-danger text-center" colspan="100%">No se encontraron registros.
                                    </td>
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