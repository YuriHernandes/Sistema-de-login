<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "formulario-yuri";
$port = 3308; // Se necessário

// Criando a conexão
$conexao = new mysqli($dbhost, $dbusername, $dbpass, $dbname, $port);

// Verificando se ocorreu algum erro na conexão
//if ($conexao->connect_errno) {
    // Se houve um erro, exibir uma mensagem de erro
  //  echo "Erro ao conectar ao banco de dados: " . $conexao->connect_error;
//} else {
    // Se não houve erro, exibir uma mensagem de sucesso
//    echo "Conexão realizada com sucesso.";
//}
?>
