
<div class="col-10 mt-5" style="margin: 0 auto;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="m in movimentacao">
                <td>@{{ formatDate(m.created_at)}}</td>
                <td :class="m.opcao == 'retirar' ? 'bg-danger' : ''">@{{m.opcao == 'retirar' ? '-'+ m.valor : m.valor}}</td>
                
            </tr>
        </tbody>
    </table>
</div>

