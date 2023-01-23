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
                errors: {},
                delete_id: null,
                erro:false,
                links_page:{},
                form_edit: {},
                message_edit_success: false,
                message_edit: {},
            }
        },
        mounted() {
            this.listPessoas();
        },
        methods: {
            salvaPessoa(){
                this.erro = false
                if(this.dados.cpf)
                    this.dados.cpf = this.dados.cpf.replace(/[.-]/g, '')

                axios.post("{{ route('pessoa.store') }}",this.dados)
                .then((r) => {
                    this.dados = {}
                    this.listPessoas();
                }).catch((erro) => {
                    this.erro = true
                    this.errors = erro.response.data.errors
                })
               
            },

           

            async listPessoas(url = null){
                if(url === null)
                    url = "{{ route('pessoa.getPessoas') }}"
                await axios.get(url)
                .then((r) => {
                    this.pessoas = r.data.data
                    this.links_page = r.data.links;

                });
            },

             openModalEdit(id){
                this.message_edit_success = false;
                let dados = {
                    'id' : id
                }
                
                axios.post("{{ route('pessoa.getPessoa') }}", dados)
                .then((r) => {
                    this.form_edit = r.data[0]
                });
                $('#modal_form_edit').modal('show')
            },

            openModalDelete(id){
                this.delete_id = {
                    'id' : id
                }
                $('#modal_delete').modal('show')
            },

            deletePessoa(){
            axios.post("{{ route('pessoa.delete') }}", this.delete_id)
                .then((r) => {
                    this.listPessoas();
                     $('#modal_delete').modal('hide')
                });
            },

            editPessoa(){
                if(this.form_edit.cpf)
                    this.form_edit.cpf = this.form_edit.cpf.replace(/[.-]/g, '')
                axios.post("{{ route('pessoa.edit') }}", this.form_edit)
                .then((r) => {
                    this.message_edit_success = true;
                    this.message_edit = r.data.message
                    this.listPessoas();
                    
                });
            },
            getLabelPage(str) {
                if (str == '&laquo; Previous')
                    return '<<';
                else if (str == 'Next &raquo;')
                    return '>>';
                else
                    return str;
            },
            
        },

        filters: {
            cpf: function(value){
                return value.toString().replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
            },
            capitalize: function(value){
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            } 
            
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