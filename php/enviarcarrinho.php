<?php 
session_start();
include('../verificalogin.php');
include('../connection/connection.php');

$idproduto = $_POST['id'];
$iduser = $_SESSION['idusuario'];
$sql = "SELECT * FROM produtos where idproduto = '$idproduto'";
$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($resultado);
$nomeproduto = $dados['nome'];
$quantidadeproduto = $dados['quantidade'];
$precoproduto = $dados['preco'];
$linkproduto = $dados['link'];

$sql2 = "INSERT INTO temp_item (iduser,nome, quantidade, preco, link, dt) values('$iduser', '$nomeproduto', '$quantidadeproduto', '$precoproduto', '$linkproduto', CURRENT_DATE)";
if(mysqli_query($conn, $sql2)){
    echo 'Sucess';
    header('Location: ../index.php');
} else {
    echo "Deu merda";
    $error = mysqli_errno($conn);
    echo $error;
}