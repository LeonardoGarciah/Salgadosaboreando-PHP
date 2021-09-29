<?php
session_start();
include('../connection/connection.php');

$nome = mysqli_real_escape_string($conn,$_POST['nome']);
$link = mysqli_real_escape_string($conn,$_POST['link']);
$quantidade = mysqli_real_escape_string($conn,$_POST['quantidade']);
$preco = mysqli_real_escape_string($conn,$_POST['preco']);
$categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

$sql = "INSERT INTO produtos values (default, '$nome', '$preco', '$quantidade', '$link', '$categoria')";
if(mysqli_query($conn, $sql)){
    echo 'Sucesso';
    header('Location: ../painel.php');
} else {
    echo 'Falha';
}