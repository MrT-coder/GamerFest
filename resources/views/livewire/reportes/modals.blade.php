{{-- Generate PDF Modal --}}
<div wire:ignore.self class="modal fade" id="generatePDFModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="generatePDFLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="generatePDFLabel">Previsualización del reporte</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer justify-content-between">
                {{-- Botones para cancelar y generar reporte --}}
            </div>
        </div>
    </div>
</div>