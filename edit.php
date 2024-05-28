<?php
    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $senha = $user_data['senha'];
                $cep = $user_data['cep'];
                $rua = $user_data['rua'];
                $bairro = $user_data['bairro'];
                $cidade = $user_data['cidade'];
                $uf = $user_data['uf'];
        
                // Gerar automaticamente o nome de usuário
                $nome_usuario = strtolower(str_replace(' ', '.', $nome));
            }
            print_r($nome);
        }
        else
        {
            header('Location: sistema.php');
        }
    }
    else{
        header('Location: sistema.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/formulario2.css">
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | Connect Driver</title>
    
       
</head>
<body>
    <a href="sistema.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <legend><b>Formulário de Cadastro</b></legend>
                <br>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome"><b>Nome Completo</b></label>
                </div>

                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="email"><b>E-mail</b></label>
                </div>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>" required>
                    <label for="telefone"><b>Telefone</b></label>
                </div>
               <br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo $senha ?>" required>
                    <label for="senha"><b>Senha</b></label>
                </div>

                <div class="inputBox">
                    <input type="text" name="cep" id="cep" size="40" class="inputUser" value="<?php echo $cep ?>" required onblur="pesquisacep(this.value)">
                    <label for="cep"><b>CEP</b></label>
                </div>

                <div class="inputBox">
                    <input type="text" name="rua" id="rua" size="40" class="inputUser" value="<?php echo $rua ?>" required>
                    <label for="rua"><b>Rua</b>
                    </label>
                </div>

                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" size="40" class="inputUser" value="<?php echo $bairro ?>" required>
                    <label for="bairro"><b>Bairro</b></label>
                </div>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" size="40" class="inputUser" value="<?php echo $cidade ?>" required>
                    <label for="cidade"><b>Cidade</b></label>
                </div>

                <div class="inputBox">
                    <input type="text" name="uf" id="uf" size="40" class="inputUser" value="<?php echo $uf ?>" required>
                    <label for="uf"><b>Estado</b></label>
                </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update">
            
            </fieldset>
        </form>
    </div>

    <script>
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
        }
    
        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
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
                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";
    
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
    
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
    
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
    
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        }
    </script>

</body>
</html>
