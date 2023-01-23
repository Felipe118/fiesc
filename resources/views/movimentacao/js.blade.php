<script>
    const vm = new Vue({
        el: "#app",
        data() {
            return {
                pessoas: {},
                dados: {},
                select: false,
                conta: {},
                totalSaldo: {},
                erro: false,
                success: false,
                message_sucess: null,
                message: {},
                errors: {},
                errors_edit: {},
                dados_pessoas: {},
                message_edit_erro: false,
                form_edit: {},
                message_edit: {},
                message_edit_success: false,
                delete_id: {},
                valor: 0,
                formattedPrice: 0,
                movimentacao: {},
                pessoa_id: null,
                message_error: false,
            }
        },

        mounted() {
            this.listPessoas();
        },

        methods: {
            async listPessoas() {

                await axios.get("{{ route('pessoa.get') }}")
                    .then((r) => {
                        let date = []
                        r.data.forEach((element) => {
                            let cpf = element.cpf.toString().replace(
                                /(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
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



            listPessoasConta() {
                axios.get("{{ route('conta.getContaPessoa') }}")
                    .then((r) => {
                        this.dados_pessoas = r.data
                    })
            },



            carregaConta() {
               
                this.success = false
                this.message_error = false
                this.totalSaldo = 0
                this.pessoa_id = {
                    'id': this.dados.pessoa_id
                }
                axios.post("{{ route('conta.getContaUnique') }}", this.pessoa_id)
                    .then((r) => {
                        this.select = true
                        if (r.data[0]) {
                            this.conta = r.data[0]
                            conta_id = {
                                'conta_id': this.conta.id
                            }

                            axios.post("{{ route('movimentacao.totalSaldo') }}", conta_id)
                                .then((r) => {
                                    this.totalSaldo = r.data
                                    if (r.data.length == 0) {
                                        this.dados.valor = 0

                                    }
                                    this.dados.valor = r.data
                                });
                                this.getMovimentacao();
                        } else {
                            this.select = false
                            this.conta = null
                            this.getMovimentacao();
                        }

                    })
                   

                   
            },

            salvaMovimentacao() {

                this.success = false
                this.message_error = false
                let dinheiro = this.dados.saldo.split("R$")
                let dinheiro_money = dinheiro[1].replace(' ', '')
                let value_money = dinheiro_money.replace('.', '')
                let money = value_money.replace(',', '.')

                this.dados.saldo = money
                let num = parseFloat(this.dados.saldo)
                let number = parseFloat(num.toFixed(2))
                this.dados.saldo = number


                let value = 0
                if (this.dados.opcao === 'depositar') {

                    this.dados.valor = this.numberFloat(this.dados.saldo)
                

                } else {
                    if (this.dados.valor < this.dados.saldo) {

                        this.message_error = true
                        this.message = {
                            'message_errors': 'O valor da retirada é maior que o valor que está na conta'
                        }
                        return
                    } else {
                        this.dados.valor = this.numberFloat(this.dados.saldo)
                    }

                }


                axios.post("{{ route('movimentacao.storeMovimentacao') }}", this.dados)
                    .then((r) => {
                        this.message_sucess = r.data
                        this.success = true
                        this.dados.valor = null
                        this.dados.saldo = null
                        this.dados = {}
                        this.getMovimentacao();
                    });

                 
            },

            formatDate(date) {
                return moment(date).format('DD/mm/YYYY  HH:mm');
            },

            numberFloat(valor) {
                let numValor = parseFloat(valor)
                let numberValor = parseFloat(numValor.toFixed(2))

                return numberValor
            },
            getMovimentacao() {

                let id = 0
                if(this.conta != null){
                     id = this.conta.id
                }else{
                    id = 0
                }
        
                conta_id = {
                    'conta_id': id
                }
                axios.post("{{ route('movimentacao.getMovimentacao') }}", conta_id)
                    .then((r) => {
                        this.movimentacao = r.data
                    })
            },



        },

        filters: {
            cpf: function(value) {
                return value.toString().replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4')
            },
            money: function(value) {
                return (value).toFixed(2)
                    .replace(/\d(?=(\d{3})+\.)/g, '$&,');
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
            money: {
                bind(el, binding) {
                    el.innerHTML = Number(binding.value).toLocaleString('en-US', {
                        style: 'currency',
                        currency: 'USD'
                    })
                },
                update(el, binding) {
                    el.innerHTML = Number(binding.value).toLocaleString('en-US', {
                        style: 'currency',
                        currency: 'USD'
                    })
                }
            },
            capitalize: {
                inserted: function(el) {
                    el.addEventListener('keyup', function() {
                        el.value = el.value.charAt(0).toUpperCase() + el.value.slice(1);
                    })

                }
            },
            numbers: {
                bind: function(el) {
                    el.addEventListener('keypress', function(event) {
                        if (event.key.match(/[0-9]/)) {
                            event.preventDefault();
                        }
                    });
                }
            }
        }


    })
</script>
