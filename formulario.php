<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];

        // Gerar automaticamente o nome de usuário
        $nome_usuario = strtolower(str_replace(' ', '.', $nome));

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, telefone, senha, cep, rua, bairro, cidade, uf, nome_usuario)
        VALUES ('$nome','$email','$telefone','$senha','$cep','$rua','$bairro','$cidade','$uf','$nome_usuario')");

        header('Location: login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | Connect Driver</title>
    <link rel="stylesheet" href="CSS/formulario2.css">
</head>
<body>
    <a href="home.php" class="back-button">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <legend><b>Formulário de Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    
                    <label for="nome"><b>Nome Completo</b></label>
                </div>

                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email"><b>E-mail</b></label>
                </div>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone"><b>Telefone</b></label>
                </div>
     
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha"><b>Senha</b></label>
                </div>

                <div class="inputBox">
                    <input type="text" name="cep" id="cep" size="40" class="inputUser" required onblur="pesquisacep(this.value)">
                    <label for="cep"><b>CEP</b></label>
                </div>

                <div class="inputBox">
                    <input type="text" name="rua" id="rua" size="40" class="inputUser" required>
                    <label for="rua"><b>Rua</b>
                    </label>
                </div>

                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" size="40" class="inputUser" required>
                    <label for="bairro"><b>Bairro</b></label>
                </div>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" size="40" class="inputUser" required>
                    <label for="cidade"><b>Cidade</b></label>
                </div>

                <div class="inputBox">
                    <input type="text" name="uf" id="uf" size="40" class="inputUser" required>
                    <label for="uf"><b>Estado</b></label>
                </div>

                <div class="inputBox">
                    <input type="submit" name="submit" id="submit">
                </div>

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
