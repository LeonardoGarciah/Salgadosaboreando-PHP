<?php
session_start();
include('connection/connection.php');
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
  <title>Salgadosaboreando</title>
</head>

<body class="corsecundaria">
  <?php include('menu.php') ?>

  <section class="slider corsecundaria">

    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
      <div data-aos="zoom-out-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000" class="carousel-inner boxs">


        <div class="carousel-item active">
          <div class="box w-100">
            <div class="imagem">
              <img id="coxinha" class="" src="imgutilizadas/coxinha-prato-removebg-preview.png" alt="Primeiro Slide">
            </div>
            <div class="nome">
              <h1>Coxinhas <br> deliciosas!</h1>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="box w-100">
            <div class="imagem">
              <img id="salsicha" class="" src="imgutilizadas/Enroladinho-Frito-de-Salsicha-Empanada-930x620-removebg-preview.png" alt="Primeiro Slide">
            </div>
            <div class="nome">
              <h1>Enrolado <br> de salsicha</h1>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="box w-100">
            <div class="imagem">
              <img id="bolinho" class="" src="imgutilizadas/bolinho-de-queijo.png" alt="Primeiro Slide">
            </div>
            <div class="nome">
              <h1>BOLINHO <br> de QUEIJO</h1>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="box w-100">
            <div class="imagem">
              <img id="quibe" style="width: 90%;" class="" src="imgutilizadas/qui.png" alt="Primeiro Slide">
            </div>
            <div class="nome">
              <h1>QUIBE HUMMM.. <br> QUI-BELEZA</h1>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="box w-100">
            <div class="imagem">
              <img id="esfirra" style="width: 90%;" class="" src="imgutilizadas/esfirrs.png" alt="Primeiro Slide">
            </div>
            <div class="nome">
              <h1>ESFIRRAS <br> </h1>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>
  </section>
  <section class="congelados primeiracor">
    <div class="center">
      <h1 id="produtos" style="color: white;">CONGELADOS</h1>
      <div class="congelados-contents">

        <?php
        $sql = "SELECT * FROM produtos where categoria = 'congelado'";
        $resultado = mysqli_query($conn, $sql);
        while ($dados = mysqli_fetch_array($resultado)) :
        ?>
          <div data-aos="zoom-in-up" class="congelados-box corsecundaria shadow">
            <form class="buy" action="php/enviarcarrinho.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $dados['idproduto']?>">
              <button type="submit"><img src="imgutilizadas/carrin.png" alt=""></button>
              <button type="submit"><h3>Adicionar ao carrinho</h3></button>
            </form>
            <div class="icone corterceira">
              <img style="width: 100px;position: relative;;left: -50px;top: -30px;" src="<?php echo $dados['link'] ?>" alt="">
            </div>
            <div class="nome-unidade">
              <h2><?php echo $dados['nome'] ?></h2>
              <p><?php echo $dados['quantidade'] ?> UNIDADES</p>
            </div>
            <div class="preco">
              <h1>R$<?php echo $dados['preco'] ?>,00</h1>
            </div>
          </div>
        <?php endwhile; ?>



      </div>
       </div>
  </section>
  <section id="sectionfritos" class="fritos corsecundaria">

    <div class="center">
      <h1 style="color: white;width: 100%;text-align: center;">FRITOS</h1>
      <div id="fritos" class="congelados-contents">

        <?php
        $sql = "SELECT * FROM produtos where categoria = 'frito'";
        $resultado = mysqli_query($conn, $sql);
        while ($dados = mysqli_fetch_array($resultado)) :
        ?>

          <div data-aos="zoom-in-up" class="congelados-box primeiracor shadow">
          <form class="buy" action="php/enviarcarrinho.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $dados['idproduto']?>">
              <button type="submit"><img src="imgutilizadas/carrin.png" alt=""></button>
              <button type="submit"><h3>Adicionar ao carrinho</h3></button>
            </form>
            <div class="icone corsecundaria">
              <img style="width: 100px;position: relative;;left: -50px;top: -30px;" src="<?php echo $dados['link'] ?>" alt="">
            </div>
            <div class="nome-unidade">
              <h2><?php echo $dados['nome'] ?></h2>
              <p><?php echo $dados['quantidade'] ?> UNIDADES</p>
            </div>
            <div class="preco">
              <h1>R$<?php echo $dados['preco'] ?>,00</h1>
            </div>
          </div>

        <?php endwhile; ?>

      </div>

    </div>
    </div>
    <div class="center">
          </div>
  </section>
  <section style="height: 200px;" class="contato primeiracor">
    <div class="center">
      <div id="contato" class="contacts">
        <i style="float: left;color: darkviolet;" class="fa fa-instagram "><a target="_blank" href="https://www.instagram.com/salgadosaboreando/">SALGADOSABOREANDO</a></i>
        <i style="float: right;color: green;" class="fa fa-whatsapp"><a href="tel:+5548999999999">(48)999999999</a></i>
      </div>
    </div>
  </section>
  <section class="avaliacao corterceira">
    <div class="center">
      <h1 style="color: white;">AVALIAÇÃO</h1>
    </div>
    <div class="center">
      <div class="comentarios">
        <div data-aos="fade-right" data-aos-offset="100" data-aos-easing="ease-in-sine" class="coment primeiracor">
          <h3 style="padding: 20px;color: white;">SALGADOS DE ÓTIMA QUALIDADE E MUITOOO SABOROSOS</h3>
          <div class="user corsecundaria">
            <img style="margin-top: 2px" id="profile" src="imgutilizadas/profile.jpg" alt="">
            <h5>Leonardo</h5>
            <img id="star" src="imgutilizadas/star.png" alt="">
          </div>
        </div>

        <div data-aos="fade-up" data-aos-offset="100" data-aos-easing="ease-in-sine" class="coment primeiracor">
          <h3 style="padding: 20px;color: white;">muito bom, já estou fazendo minha próxima encomenda!</h3>
          <div class="user corsecundaria">
            <img style="margin-top: 2px" id="profile" src="imgutilizadas/empresario.jpg" alt="">
            <h5>Caio Gomes</h5>
            <img id="star" src="imgutilizadas/star.png" alt="">
          </div>
        </div>

        <div data-aos="fade-left" data-aos-offset="100" data-aos-easing="ease-in-sine" class="coment primeiracor">
          <h3 style="padding: 20px;color: white;height: 170px;">um dos melhores que já comi</h3>
          <div class="user corsecundaria">
            <img style="margin-top: 2px" id="profile" src="imgutilizadas/empresaria.jpg" alt="">
            <h5>Aline</h5>
            <img id="star" src="imgutilizadas/star.png" alt="">
          </div>
        </div>

      </div>
    </div>
  </section>
  <footer style="text-align: center; background-color: orange;">©Todos os direitos reservados a Salgadosaboreando</footer>





  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>