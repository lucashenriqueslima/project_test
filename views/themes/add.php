<div class="container mt-5">
    <div class="card">
        <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Adicionar Cliente</strong></div>
        <div class="card-body">
            <div class="col-sm-6">


                <form method="post" action="src/req_add_tipo_produtos.php">

                    <div class="form-group">

                        <label>Nome</label>

                        <input type="text" name="descricao" id="descricao" class="form-control"
                            placeholder="Nome do Cliente" required>

                    </div>

                    <div class="form-group">
                        <label>CPF</label>
                        <input type="" name="cpf" id="cpf" class="form-control" placeholder="CPF do Cliente" required>
                    </div>

                    <div class="form-group">

                        <label>Nº de Celular</label>

                        <input type="text" name="cell_number" id="cell_number" class="form-control"
                            placeholder="Nº de Celular do Cliente" required>

                    </div>

                    <div class="form-group">

                        <label>CEP</label>

                        <input type="text" name="cep" id="cep" class="form-control"
                            placeholder="CEP do Cliente" required>

                    </div>

                    <div class="form-group">

                        <label>Nº da Rua</label>

                        <input type="text" name="street_number" id="street_number" class="form-control"
                             required>

                    </div>

                    <div class="form-group">

                        <label>Rua</label>

                        <input type="text" name="street" id="street" class="form-control"
                             required>

                    </div>

                    <div class="form-group">

                        <label>Bairro</label>

                        <input type="text" name="neighborhood" id="neighborhood" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <label>Cidade</label>

                        <input type="text" name="city" id="city" class="form-control" required>

                    </div>


                    <div class="form-group">

                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i
                                class="fa fa-fw fa-plus-circle"></i> Adicionar Cliente</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<script>
$('#cpf').mask('000.000.000-00');
$('#cell_number').mask('(00) 00000-0000');
$('#cep').mask('00000-000');    

    
    document.getElementById("cep").onblur = () => {
         pesquisacep(document.getElementById("cep").value);            
    }

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('street').value=("");
            document.getElementById('neighborhood').value=("");
            document.getElementById('city').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {

            alert("success", "CEP encontrado.")

            //Atualiza os campos com os valores.
            document.getElementById('street').value=(conteudo.logradouro);
            document.getElementById('neighborhood').value=(conteudo.bairro);
            document.getElementById('city').value=(conteudo.localidade);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("error", "CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('street').value="...";
                document.getElementById('neighborhood').value="...";
                document.getElementById('city').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                console.log(script);

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("error", "Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

    