@extends('layout.base')
@section('content')
 <div id="app">
    <section class="container-fluid col-12 bg-light p-3">
        <div class="p-3"><h2 style="text-align: center;">Cadastro de conta</h2></div>
        <div v-if='erro' class="col-6" style="margin-left: 140px;">
            <div  class="alert alert-danger">
                <ul>
                    <li v-if='errors.numero_conta'>@{{errors.numero_conta[0]}}</li>
                </ul>
            </div>
        </div>
        <div v-if='success' class="col-6" style="margin-left: 140px;">
            <div  class="alert alert-success">
                <ul>
                    <li>@{{message_sucess}}</li>
                </ul>
            </div>
        </div>

        <div  class="col-8" style="margin-left: 140px;">
            <form action="">
                <div class="mb-5 mt-3 col-8">
                    <label for="" class="form-label">Pessoa: </label>
                   <select   class="form-select" id="" v-model='dados.pessoa_id' required>
                        <option v-for='p in pessoas' :value="p.id">@{{`${p.nome} - ${p.cpf}`}}</option>
                   </select>
                </div>

                <div class="col-8 mb-3">
                    <label for="" class="form-label">Conta: </label>
                    <input  v-model='dados.numero_conta' type="number" class="form-control">
                </div>
                <button  class="btn btn-outline-dark mt-5"  @click.prevent='salvaConta()' >Salvar</button>
            </form>
        </div>
        @include('conta.modal_delete')
        @include('conta.modal_edit')
        @include('conta.table_conta')
    </section>
 </div>
@endsection
@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-the-mask/0.11.1/vue-the-mask.min.js"></script>

    @include('conta.js')
@stop