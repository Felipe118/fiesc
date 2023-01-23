@extends('layout.base')
@section('content')
 <div id="app">
    <section class="container-fluid col-12 bg-light p-3">
        <div class="p-3"><h2 style="text-align: center;">Cadastro de movimentações</h2></div>
        <div v-if='message_error' class="col-6" style="margin-left: 140px;">
            <div  class="alert alert-danger">
                <ul>
                    <li>@{{message.message_errors}}</li>
                </ul>
            </div>
        </div>
       <div v-if='success' class="col-6" style="margin-left: 140px;">
            <div  class="alert alert-success">
                <ul>
                    <li>@{{message_sucess.message}}</li>
                </ul>
            </div>
        </div>

        <div  class="col-8" style="margin-left: 140px;">
            <form action="">
                <div class="mb-5 mt-3 col-8">
                    <label for="" class="form-label">Pessoa: </label>
                    <select  @click='carregaConta()' class="form-select" id="" v-model='dados.pessoa_id' required>
                            <option   v-for='p in pessoas' :value="p.id">@{{`${p.nome} - ${p.cpf}`}}</option>
                    </select>
                </div>

                <div class="mb-5 mt-3 col-8"> 
                    <label for="" class="form-label">Número da conta: </label>
                    <select   @click='getMovimentacao()' class="form-select" id="" v-model='dados.conta_id' required>
                            <option  v-if='select' :value="conta.id">@{{`${conta.numero_conta} - Saldo: ${totalSaldo} `}}</option>
                    </select>
                </div>

                <div class="mb-5 mt-3 col-8">
                    <label for="" class="form-label"> Depositar/Retirar: </label>
                    <select   class="form-select" id="" v-model='dados.opcao' required>
                            <option value="depositar">Depositar</option>
                            <option value="retirar">Retirar</option>
                    </select>
                </div>

                <div class="col-8 mb-3">
                    <label for="" class="form-label">Valor: </label>
                    <input  v-model='dados.saldo'  type="text" class=" form-control"  v-currency="{currency: 'BRL'}">
                </div>

                
                <button  class="btn btn-outline-dark mt-5"  @click.prevent='salvaMovimentacao()' >Salvar</button>
            </form>
        </div>
        <div style="margin-left:130px;" class="mt-5"><h4>Extrato</h4></div>
        @include('movimentacao.table')
        <div style="margin-left:130px;" class="mt-5"><h4>Saldo R$: @{{totalSaldo}} </h4></div>
    </section>
 </div>
@endsection
@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
   
    <script src="https://unpkg.com/vue-currency-input@1.22.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-the-mask/0.11.1/vue-the-mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-moment@4.1.0/dist/vue-moment.min.js"></script>
    @include('movimentacao.js')

@stop