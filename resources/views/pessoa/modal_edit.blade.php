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
                        <label for="" class="form-label">Pessoa:</label>
                        <input type="text" class="form-control" v-capitalize v-numbers v-model="form_edit.nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class=" form-label">CPF:</label>
                        <input type="text" v-mask="'###.###.###-##'" class="form-control"  v-model="form_edit.cpf" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">ENDEREÇO:</label>
                        <input type="text" class="form-control" v-model="form_edit.endereco" required>
                    </div>
                </form>
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
                <button type="button" class="btn btn-primary" @click="editPessoa()">Editar</button>
            </div>
        </div>
    </div>
</div>
