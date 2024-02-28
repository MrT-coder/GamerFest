{{-- Generate PDF Modal --}}
<div wire:ignore.self class="modal fade" id="generatePDFModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="generatePDFLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="generatePDFModalLabel">Previsualización del reporte</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" id="pdf-content">
                @if (isset($resultadosConsulta) && count($resultadosConsulta) > 0)
                <table class="table table-sm table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-1">#</th>
                            @foreach ($columnas_seleccionadas as $columna)
                            <th>{{ $columna }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($resultadosConsulta as $row)
                        <tr>
                            <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                @foreach ($columnas_seleccionadas as $columna)
                            <td class="align-middle">{{ $row->$columna }}</td>
                            @endforeach
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ count($columnas_seleccionadas) + 1 }}" class="text-center">No hay datos
                                disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                @endif
            </div>
            <div class="modal-footer justify-content-between">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal"
                        wire:click="setDefaultsAll"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="button" wire:click="generatePDFModalData" class="btn btn-success"><i
                            class="fa fa-check"></i> Generar Reporte</button>
                </div>
            </div>
        </div>
    </div>
</div>