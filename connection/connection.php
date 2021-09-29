<?php
 $servidor = "localhost"; // localhost tambem é web
 $dbname = "id17265776_saboreando"; // nome do banco
 $dbusuario = "root"; // usuário do banco
 $dbsenha = ""; // senha usuário do banco
 $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
 if (!$conn) {
      die("Conexao falhou: " . mysqli_connect_error());
}
?>