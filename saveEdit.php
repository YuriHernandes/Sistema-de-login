<?php

    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];

        $nome_usuario = strtolower(str_replace(' ', '.', $nome));


        $sqlUpdate = "UPDATE usuarios SET nome='$nome',email='$email',telefone='$telefone',senha='$senha',cep='$cep',rua='$rua',bairro='$bairro',cidade='$cidade',uf='$uf'
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }

    header('Location: sistema.php');

?>