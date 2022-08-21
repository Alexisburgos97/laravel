<div class="modal fade" id="deleteDispositivo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteDispositivoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDispositivoLabel">Eliminar Dispositivo</h5>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar el Dispositivo?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" :disabled="showSpinner" >No</button>
                <button type="button" class="btn btn-danger" @click="deleteIt" :disabled="showSpinner" >
                    <span v-if="showSpinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Eliminar
                </button>
            </div>
        </div>
    </div>
</div>
