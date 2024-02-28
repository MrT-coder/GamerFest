@section('title', __('Reportes'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fas fa-chart-pie"></i>
                                Reportes</h4>
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
                        <p>Generador de reportes. Actualiza todos los parámetros como sea necesario.</p>
                    </div>
                    <div class="parametros">
                        Tabla seleccionada: {{ var_export($tabla_seleccionada) }}
                        <br>
                        Columnas seleccionadas: {{ var_export($columnas_seleccionadas) }}
                        <br>
                        Ordenamiento: {{ var_export($orden) }}
                        <br>
                        Columna de ordenamiento: {{ var_export($columna_orden) }}
                        @include('livewire.reportes.modals')
                        <form>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lista_tablas">Selecciona una tabla para hacer el reporte:</label>
                                        <select class="form-control form-select" wire:model="tabla_seleccionada"
                                            wire:click="setDefaults" size="10">
                                            @foreach ($tablasConColumnas as $tabla => $columnas)
                                            <option value="{{ $tabla }}">{{ $tabla }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Selecciona las columnas que desea mostrar:</label>
                                        @if (isset($tablasConColumnas[$tabla_seleccionada]))
                                        @foreach ($tablasConColumnas[$tabla_seleccionada] as $columna)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $columna }}"
                                                id="{{ $columna }}" wire:model="columnas_seleccionadas"
                                                wire:click="setColumnaOrdenamiento">
                                            <label class="form-check-label" for="{{ $columna }}">
                                                {{ $columna }}</label>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if (isset($columnas_seleccionadas) && count($columnas_seleccionadas) > 0)
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Ordenar los datos de forma:</label>
                                        <select class="form-control form-select" name="orden" wire:model="orden" wire:click="setResultadosConsultaNull">
                                            <option value="asc" selected>Ascendente</option>
                                            <option value="desc">Descendente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="columna_ordenamiento">Selecciona la columna para ordenar:</label>
                                        <select class="form-control form-select" wire:model="columna_orden" wire:click="setResultadosConsultaNull">
                                            @foreach ($columnas_seleccionadas as $columna)
                                            <option value="{{ $columna }}">
                                                {{ $columna }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="btn btn-info" wire:click.prevent="getTableModal" data-bs-toggle="modal"
                                        data-bs-target="#generatePDFModal">
                                        <i class="fas fa-file-pdf"></i> Previsualizar reporte
                                    </div>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>