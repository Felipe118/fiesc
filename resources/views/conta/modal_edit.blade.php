<div class="modal fade" id="modal_form_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar</h2>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="" class="form-label">Número da conta:</label>
                        <input type="number" class="form-control" v-model="form_edit.numero_conta" required>
                    </div>
                </form>
            </div>
            <div v-if='message_edit_erro' >
                <div class="alert alert-danger">
                    <ul>
                        <li>@{{errors_edit.numero_conta[0]}}</li>
                    </ul>
                </div>
                
            </div>

            <div v-if='message_edit_success' >
                <div class="alert alert-success">
                    <ul>
                        <li>@{{message_edit}}</li>
                    </ul>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="editConta()">Editar</button>
            </div>
        </div>
    </div>
</div>
