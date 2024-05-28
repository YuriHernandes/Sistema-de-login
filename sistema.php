<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];

    $sql = "SELECT * FROM usuarios ORDER BY id DESC";

    $result = $conexao->query($sql);

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-ico">
    <link rel="stylesheet" href="./CSS/sistema.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Painel | Connect Driver</title>

    <style>
        body{
            background: linear-gradient(to left, rgb(0, 0, 0), rgb(66, 66, 66));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: linear-gradient(to right, rgb(0, 0, 0), rgb(66, 66, 66));
            border-radius : 15px 15px 0 0;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PAINEL CONNECT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
    </nav>
    <br>
    <?php
    
        echo "<h1> Bem vindo <u>$logado</u></h1>";

    ?>

<div class="m-5">
    <table class="table text-white table-bg">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Usuário</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Senha</th>
                <th scope="col">CEP</th>
                <th scope="col">Rua</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">UF</th>
                <th scope="col">Data de Cadastro</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($user_data = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>".$user_data['id']."</td>";
                echo "<td>".$user_data['nome']."</td>";
                echo "<td>".$user_data['nome_usuario']."</td>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$user_data['telefone']."</td>";
                echo "<td>".$user_data['senha']."</td>";
                echo "<td>".$user_data['cep']."</td>";
                echo "<td>".$user_data['rua']."</td>";
                echo "<td>".$user_data['bairro']."</td>";
                echo "<td>".$user_data['cidade']."</td>";
                echo "<td>".$user_data['uf']."</td>";
                echo "<td>".$user_data['data_cadastro']."</td>";
                echo "<td>
                <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                    </svg>
                </a>
                <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                </svg>
            </a>
            </td>";
        echo "</tr>";
    }
    ?>
            
        </tbody>
    </table>
</div>
