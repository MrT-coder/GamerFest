@section('title', __('Reportes'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="far fa-user-circle"></i>
                                Lista de Reportes</h4>
                        </div>
                        @if (session()->has('message'))
                        <div wire:poll.5s class="btn btn-info placeholder-wave"
                            style="margin-top:0px; margin-bottom:0px;"><i class="fa-solid fa-circle-check"></i>
                            {{ session('message') }} </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex mb-3 justify-content-between align-items-center">
                        <p>Generador de reportes.</p>
                        <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#">
                            <i class="fa fa-plus"></i> Crear reporte
                        </div>
                    </div>
                    <div class="table-responsive">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>