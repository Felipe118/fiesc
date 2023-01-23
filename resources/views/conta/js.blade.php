<script>
    //   Vue.filter('cpf', value => {
    //        return value.toString().replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
    //     })
    const vm = new Vue({
        el: "#app",
        data() {
            return {
              pessoas: {},
              dados: {},
              erro: false,
              success: false,
              message_sucess: null,
              errors: {},
              errors_edit: {},
              dados_pessoas: {},
              message_edit_erro:false,
              form_edit: {},
              message_edit: {},
              message_edit_success:false,
              delete_id: {},
            }
        },
        mounted() {
            this.listPessoas();
            this.listPessoasConta();
        },
        methods: {
           async listPessoas(){
            await axios.get("{{ route('pessoa.get') }}")
                .then((r) => {
                    let date = []
                    r.data.forEach((element) => {
                        let cpf = element.cpf.toString().replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
                        let nome = element.nome
                        let created_at = element.created_at
                        let updated_at = element.updated_at 
                        let id = element.id
                        
                        pessoa = {
                            'cpf': cpf,
                            'nome': nome,
                            'created_at': created_at,
                            'updated_at': updated_at,
                            'id': id
                        }

                        date.push(pessoa)

                    })
                   this.pessoas = date
                });
           },

           salvaConta(){
                this.erro = false
                this.success = false
                axios.post("{{ route('conta.store') }}", this.dados)
                .then((r) => {

                        this.message_sucess = r.data[0]
                        this.success = true
                        this.dados = {}
                        this.listPessoas();
                        this.listPessoasConta();
                })
                .catch((erro) => {
                    this.erro = true
                    this.errors = erro.response.data.errors
                })
            },

            listPessoasConta(){
                axios.get("{{ route('conta.getContaPessoa') }}")
                .then((r) => {
                    this.dados_pessoas = r.data
                })
            },
            openModalEdit(id){
                this.message_edit_erro = false;
                this.message_edit_success = false;
                let dados = {
                    'id' : id
                }
                
                axios.post("{{ route('conta.getConta') }}", dados)
                .then((r) => {
                    this.form_edit = r.data[0]
                });
                $('#modal_form_edit').modal('show')
            },
            editConta(){
                axios.post("{{ route('conta.edit') }}", this.form_edit)
                .then((r) => {
                    this.message_edit_success = true;
                    this.message_edit = r.data.message
                    this.listPessoas();
                    this.listPessoasConta();
                    
                })
                .catch((erro) => {
                    this.message_edit_erro = true
                    this.errors_edit = erro.response.data.errors
                })
            },
            openModalDelete(id){
                this.delete_id = {
                    'id' : id
                }
                $('#modal_delete').modal('show')
            },

            deleteConta(){
                axios.post("{{ route('conta.delete') }}", this.delete_id)
                .then((r) => {
                    this.listPessoas();
                    this.listPessoasConta();
                     $('#modal_delete').modal('hide')
                });
            },
        },

        filters: {
            cpf: function(value){
                return value.toString().replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
            },
            
        },

        directives: {
            cpf: {
                bind(el) {
                    el.addEventListener('keyup', () => {
                        let value = el.value.replace(/\D/g, '')
                        value = value.slice(0, 11)
                        value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
                        el.value = value
                    })
                }
            },
            capitalize: {
                inserted: function (el) {
                        el.addEventListener('keyup', function () {
                        el.value = el.value.charAt(0).toUpperCase() + el.value.slice(1);
                     })
               
                }
            },
            numbers: {
                bind: function (el) {
                    el.addEventListener('keypress', function (event) {
                        if (event.key.match(/[0-9]/)) {
                            event.preventDefault();
                        }
                    });
                }
            }
        }
      

    })
</script>