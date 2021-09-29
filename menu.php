<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<nav class="navbar navbar-expand-lg navbar-light primeiracor shadow2">
    <a class="navbar-brand" href="index.php"><img class="shadow" style="width: 50px;border-radius: 30px;" src="imgutilizadas/logo.jpg" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul id="menu" class="navbar-nav">
            <li class="nav-item">
                <a style="color: white;" class="nav-link" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
                <a style="color: white;" class="nav-link" href="index.php#produtos">PRODUTOS</a>
            </li>
            <li>

                <div class="dropdown">
                    <span><i style="color: white;" class="fa fa-shopping-basket" aria-hidden="true">
                            <?php
                            if (isset($_SESSION['idusuario'])) {
                                $ID = $_SESSION['idusuario'];

                                $sql = "SELECT * FROM temp_item where iduser = '$ID'";
                                $resultado = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($resultado);
                                if ($count > 0) {
                                    echo "<div style='background-color: red;border-radius:30px;padding:3px ;position: absolute;right: 20px;top: 5px;font-size: 10px; font-family: Arial'>$count</div>";
                                }
                            }
                            ?>
                        </i></span>
                    <div class="dropdown-content">

                        <div class="rol">
                            <?php
                            if (isset($_SESSION['idusuario'])) {
                                $idusuario = $_SESSION['idusuario'];
                            } else {
                                $idusuario = null;
                            }
                            $sql = "SELECT * FROM temp_item where iduser = '$idusuario'";
                            $resultado = mysqli_query($conn, $sql);

                            while ($dados = mysqli_fetch_array($resultado)) :
                            ?>

                                <p><?php echo $dados['nome'] ?></p>
                            <?php endwhile; ?>
                        </div>
                        <?php if(mysqli_num_rows($resultado) > 0){
                        echo '<a href="pagamento.php">Comprar</a>';
                        } else {
                        echo '<p style="font-size:13px">Carrinho vazio.</p>';
                        }?>
                    </div>
                    
                </div>
            </li>
            <li class="nav-item">
                <?php
                if (!isset($_SESSION['idusuario'])) {
                    echo '<a style="background-color: orange; color: white;border-radius:20px;" class="nav-link" href="login.php">Entrar</a>';
                } else {
                    echo '<a style="background-color: orange; color: white;border-radius:20px;" class="nav-link" href="php/logout.php">Sair</a>';
                }
                ?>
            </li>
        </ul>

    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>