<link rel="stylesheet" type="text/css" href="page.css" media="screen" />
<?php
session_start();
include('..\connection\connection.php');
if(empty($_POST['login']) || empty($_POST['senha'])) {
	header('Location: login.php');
	exit();
}
$usuario = mysqli_real_escape_string($conn, $_POST['login']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);


$query = "select iduser from users where usuario = '$usuario' and senha = '$senha'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
$sql = "SELECT * FROM users where usuario = '$usuario' and senha = '$senha'";
$result = mysqli_query($conn, $sql);


if($row == 1) {
	$_SESSION['usuario'] = $usuario;
		$dados = mysqli_fetch_array($result);
		$_SESSION['idusuario'] = $dados['iduser'];
		$_SESSION['admin'] = $dados['admin'];
	echo '<h3 class="Logado">Logado com Sucesso!</h3>';
	header('Location: ../painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	echo '<h3 class="Erro">Usuário ou Senha inválida!</h3>';
	header('Location: ../login.php');
	exit();
}

?>