<?php session_start();
if ($_SESSION['admin'] != 1){
  header('Location: index.php');
} 
include('connection/connection.php');
include('verificalogin.php');

?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="materializesimples.css">
  <link rel="preload" as="font" href="fonte/Insanibc.ttf" type="font/ttf" crossorigin="anonymous">
  <link rel="preload" as="font" href="fonte/Insanibu.ttf" type="font/ttf" crossorigin="anonymous">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="shortcut icon" href="imgutilizadas/favicon.ico" />
  <title>SB - PAINEL</title>
</head>
<style>
  nav {
    position: fixed !important;
    width: 100% !important;
  }
</style>

<body class="corsecundaria">
  <?php include('menu.php') ?>
  <div class="menu-left primeiracor shadow">
    <h1>Painel ADM</h1>
    <br>
    <h5>Adicionar Produto</h5><br>
    <h5>Remover Produto</h5><br>
    <a style="color: white;font-size: 18px" href="php/logout.php">Sair</a>
  </div>
  <div class="adicionar">
    <h1>Adicionar Produto</h1>
    <form action="php/cadastrar.php" method="POST">
      <input type="text" name="link" placeholder="Link da imagem Obs: Fundo transparente!">
      <input type="text" name="nome" placeholder="Nome">
      <input type="text" name="quantidade" placeholder="Unidades">
      <input type="text" name="preco" placeholder="Preço R$"><br>
      <input type="text" name="categoria" placeholder="Categoria (Frito ou Congelado)"><br>
      
      <input class="primeiracor" type="submit" value="CADASTRAR">
    </form>
  </div>
  <div style="height: auto;margin-bottom: 100px;" class="adicionar">
    <h1>Remover produto</h1>
    <table width=100% border="1">
      <thead>
        <th>Nome</th>
        <th>Unidade</th>
        <th>Preço</th>
        <th>X</th>
      </thead>
      <?php
      $sql = "SELECT * FROM produtos";
      $resultado = mysqli_query($conn, $sql);
      while ($dados = mysqli_fetch_array($resultado)) :
      ?>
        <tbody>
          <td><?php echo $dados['nome'] ?></td>
          <td><?php echo $dados['quantidade'] ?></td>
          <td><?php echo $dados['preco'] ?>,00</td>
          <td><a class="waves-effect waves-light modal-trigger" style="color: red;" href="#modal<?php echo $dados['idproduto'] ?>">X</a></td>
          <div style="height: 200px;" id="modal<?php echo $dados['idproduto'] ?>" class="modal">
            <div class="modal-content">
              <h4>Opa!</h4>
              <p>Deseja mesmo excluir <?php echo $dados['nome'] ?>?</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              <form action="php/delete.php" method="POST">
                <input type="hidden" name="idproduto" value='<?php echo $dados['idproduto'] ?>'>
                <button type="submit" style="padding:10px;color: white;font-weight:bold; background-color: red;border: none;">Confirmar</button>
              </form>
            </div>
          </div>

        </tbody>
      <?php endwhile; ?>
    </table>
  </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  M.AutoInit();
</script>

</html>