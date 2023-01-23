@extends('layout.base')
@section('content')
    <div id="app">
        <section class="container-fluid  bg-light p-3 mt-5 bd-cheatsheet ">
            <div class="p-3"><h2 style="text-align: center;">Cadastro de pessoa</h2></div>
            {{-- @if($errors->any())
                <div class="alert alert-danger mt-3 mb-2">
                    <ul>
                        @foreach($errors->all() as $erro)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div v-if='erro'>
                <div  class="alert alert-danger">
                    <ul>
                        <li v-if='errors.nome'>@{{errors.nome[0]}}</li>
                        <li v-if='errors.cpf'>@{{errors.cpf[0]}}</li>
                        <li v-if='errors.endereco'>@{{errors.endereco[0]}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="col-8" style="margin-left: 140px;">
                    <form  class="">
                        <div class="mb-3 mt-3 col-8">
                            <label for="" class="form-label">Nome: </label>
                            <input v-capitalize v-numbers  v-model="dados.nome"  type="text" class="form-control">
                        </div>

                        <div class="col-8 mb-3">
                            <label for="" class="form-label">CPF: </label>
                            <input v-mask="'###.###.###-##'" v-model='dados.cpf' type="text" class="form-control">
                        </div>

                        <div class="form-group col-8 mb-3">
                            <label for="" class="form-label">Endereço: </label>
                            <input v-model='dados.endereco' type="text" class="form-control">
                        </div>

                        <button @click.prevent='salvaPessoa()' class="btn btn-outline-dark mt-5">Salvar</button>
                    </form>
                </div>
            </div>
            @include('pessoa.modal_edit')
            @include('pessoa.modal_delete')
            @include('pessoa.table-list')
           
           
          
        </section>
      
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-the-mask/0.11.1/vue-the-mask.min.js"></script>

    @include('pessoa.js')
@stop