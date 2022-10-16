<div class="modal fade" id="deleteRegister" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteRegisterLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDispositivoLabel">Eliminar registro</h5>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar el registro?</p>
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
