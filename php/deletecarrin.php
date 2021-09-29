<?php
session_start();
include('../connection/connection.php');

$idtemp = $_POST['id'];

$sql = "DELETE FROM temp_item where idtemp = '$idtemp'";
if(mysqli_query($conn, $sql)){
    echo "sucesso";
    header('Location: ../pagamento.php');
} else {
    $error = mysqli_error($conn);
    echo "deu ruim", $error;
}