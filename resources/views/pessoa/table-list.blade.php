<div class="col-10 mt-5" style="margin: 0 auto;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Endereço</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="pessoa in pessoas">
                <td>@{{pessoa.nome}}</td>
                <td>@{{ pessoa.cpf | cpf }}</td>
                <td>@{{pessoa.endereco}} </td>
                <td><button class="btn btn-primary"  @click="openModalEdit(pessoa.id)" href="javascript:void(0)" >Editar</button></td>
                <td><button class="btn btn-danger"  @click="openModalDelete(pessoa.id)" href="javascript:void(0)">Excluir</button></td>
            </tr>
        </tbody>
    </table>
    <div class="card-footer">
        <ul class="pagination pagination-sm m-0 float-end mb-5">
            <li v-for="i in links_page" class="page-item">
                <a :class="i.active ? 'page-link active_page': 'page-link'" @click="listPessoas(i.url)" href="javascript:void(0)">@{{ getLabelPage(i.label) }}</a>
            </li>
        </ul>
    </div>
</div>
