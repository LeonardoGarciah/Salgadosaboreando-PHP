<?php
session_start();
include('../connection/connection.php');

$idproduto = $_POST['idproduto'];

$sql = "DELETE FROM produtos where idproduto = '$idproduto'";
if(mysqli_query($conn, $sql)){
    echo "sucesso";
    header('Location: ../painel.php');
} else {
    $error = mysqli_error($conn);
    echo "deu ruim", $error;
}