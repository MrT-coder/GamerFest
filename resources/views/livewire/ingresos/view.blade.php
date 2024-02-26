@section('title', __('Ingresos'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fa fa-dollar-sign"></i>
                                Lista de Ingresos</h4>
                        </div>
                        @if (session()->has('message'))
                        <div wire:poll.5s class="btn btn-info placeholder-wave"
                            style="margin-top:0px; margin-bottom:0px;"><i class="fa-solid fa-circle-check"></i>
                            {{ session('message') }} </div>
                        @endif
                        <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Buscar Ingresos">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.ingresos.modals')
                    <div class="d-flex mb-3 justify-content-between align-items-center">
                        <p>Lista de ingresos.</p>
                        <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
                            <i class="fa fa-plus"></i> Añadir Ingreso
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead class="thead text-center">
                                <tr>
                                    <th class="col-1">#</td>
                                    <th>Detalle</th>
                                    <th>Valor</th>
                                    <th>Fecha y hora</th>
                                    <th class="col-2">Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ingresos as $row)
                                <tr>
                                    <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $row->Detalle }}</td>
                                    <td class="align-middle">$ {{ $row->Valor }}</td>
                                    <td class="align-middle">{{ $row->Fecha }}</td>
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
                        <div class="float-end">{{ $ingresos->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>