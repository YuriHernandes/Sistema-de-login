<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/login.css">
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    
</head>
<body>
        <a href="home.php">Voltar</a>
        <div class="tela-login">
            <h1>Login</h1>
            <form action="testelogin.php" method="POST">
            <input type="text" name="email" placeholder="E-mail">
            <br><br>
            <input type="password" name="senha" placeholder="Senha"> 
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Acessar">
            </form>
        </div>
</body>
</html>