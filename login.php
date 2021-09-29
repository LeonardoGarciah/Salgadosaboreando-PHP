<?php session_start();
include('connection/connection.php');
if (isset($_SESSION['idusuario'])){
    header('Location: painel.php');
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
     <link rel="preload" as="font" href="fonte/Insanibc.ttf" type="font/ttf" crossorigin="anonymous">
    <link rel="preload" as="font" href="fonte/Insanibu.ttf" type="font/ttf" crossorigin="anonymous">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="imgutilizadas/favicon.ico" />
    <title>SB - LOGIN</title>
</head>
<body class="corsecundaria">
<?php include('menu.php')?>
      <section class="login">
      <div class="tela-login primeiracor">
            <h1>Painel de Login</h1>
            <form action="php/login.php" method="POST">
                <input name="login" type="text" placeholder="Usuário">
                <input name="senha" type="password" placeholder="Senha"><br>
                <input class="corsecundaria" type="submit" value="ENTRAR">
            </form>
      </div>
    </section>
</body>
</html>