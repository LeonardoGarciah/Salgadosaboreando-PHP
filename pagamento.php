<?php
session_start();
include('connection/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagamento.css">
    <title>Document</title>
</head>
<style>
    *{margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .navbar {
        display: flex;
        background-color: #FF6F00;
        box-shadow: 2px 2px 10px black;
        padding: 10px;
        width: 100%;
        position: absolute;
    }
    .navbar ul{
        text-align: center;
        display: flex;
        position: relative;
        float: right;
        list-style: none;

    }
    .navbar ul li{
        padding-top: 15px;
        margin-right: 30px;
        
    }
    .navbar ul li a{
        text-decoration: none;
        color: white;
        font-weight: bold;
    }
    #menu li:hover a{
        text-decoration: underline;

    }
    #conteudoNavbarSuportado{

        width: 100%;
        float: right;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light primeiracor shadow2">
    <a class="navbar-brand" href="index.php"><img class="shadow" style="width: 50px;border-radius: 30px;" src="imgutilizadas/logo.jpg" alt=""></a>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul id="menu" class="navbar-nav">
            <li class="nav-item">
                <a  class="nav-link" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" href="index.php#produtos">PRODUTOS</a>
            </li>
            <li>
            <?php
                if(isset($_SESSION['idusuario'])){
                echo '<a style="color: white;" class="nav-link" href="php/logout.php">SAIR</a>';
                }
                ?>
            </li>
        </ul>

    </div>
</nav>
    <div class='subject'>Salgados </br><strong>Saboreando</strong></div>
    <div class='checkout'>
        <div class='order'>
            <h2>Items</h2>
            <ul class='order-list'>
                <?php
                $idusuario = $_SESSION['idusuario'];
                $sql = "SELECT * FROM temp_item where iduser = '$idusuario'";
                $resultado = mysqli_query($conn, $sql);
                while ($dados = mysqli_fetch_array($resultado)) :
                ?>
                    <li><img src="<?php echo $dados['link'] ?>">
                        <h4><?php echo $dados['nome'] ?></h4>
                        <h5>
                            <form action="php/deletecarrin.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['idtemp'] ?>">
                                <button type="submit">X</button>
                            </form>R$
                            <?php echo $dados['preco'] ?>
                        </h5>

                    </li>
                <?php endwhile; ?>
            </ul>
            <?php
            $sql = "SELECT SUM(preco) AS total FROM temp_item where iduser = '$idusuario'";
            $resultado = mysqli_query($conn, $sql);
            $valor = mysqli_fetch_assoc($resultado);
            ?>
            <h5 class='total'>Total</h5>
            <h1>R$ <?php echo $valor['total']; if($valor['total'] != null){echo ',00';} ?></h1>
        </div>
        <h2>Pagar</h2>
        <div id='payment' class='payment'>
            <div class='card'>
                <div class='card-content'>
                    <svg id='logo-visa' enable-background="new 0 0 50 70" height="70px" version="1.1" viewBox="0 0 50 50" width="70px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <g>
                                <polygon clip-rule="evenodd" fill="#f4f5f9" fill-rule="evenodd" points="17.197,32.598 19.711,17.592 23.733,17.592     21.214,32.598   " />
                                <path clip-rule="evenodd" d="M35.768,17.967c-0.797-0.287-2.053-0.621-3.596-0.621    c-3.977,0-6.752,2.029-6.776,4.945c-0.023,2.154,1.987,3.358,3.507,4.08c1.568,0.738,2.096,1.201,2.076,1.861    c0,1.018-1.238,1.471-2.395,1.471c-1.604,0-2.455-0.232-3.773-0.787l-0.53-0.248l-0.547,3.348    c0.929,0.441,2.659,0.789,4.462,0.811c4.217,0,6.943-2.012,6.979-5.135c0.025-1.692-1.053-2.999-3.369-4.071    c-1.393-0.685-2.246-1.134-2.246-1.844c0-0.645,0.723-1.306,2.295-1.306c1.314-0.024,2.268,0.271,3.002,0.58l0.365,0.167    L35.768,17.967z" fill="#f4f5f9" fill-rule="evenodd" />
                                <path clip-rule="evenodd" d="M46.055,17.616h-3.102c-0.955,0-1.688,0.272-2.117,1.24    l-5.941,13.767h4.201c0,0,0.688-1.869,0.852-2.262c0.469,0,4.547,0,5.133,0c0.123,0.518,0.49,2.262,0.49,2.262h3.711    L46.055,17.616 M41.1,27.277c0.328-0.842,1.609-4.175,1.609-4.175c-0.041,0.043,0.328-0.871,0.529-1.43l0.256,1.281    c0,0,0.773,3.582,0.938,4.324H41.1z" fill="#f4f5f9" fill-rule="evenodd" />
                                <path clip-rule="evenodd" d="M13.843,17.616L9.905,27.842l-0.404-2.076    c-0.948-2.467-2.836-4.634-5.53-6.163l3.564,12.995h4.243l6.312-14.982H13.843z" fill="#f4f5f9" fill-rule="evenodd" />
                                <path clip-rule="evenodd" d="M7.232,17.174H0.755l-0.037,0.333    c5.014,1.242,8.358,4.237,9.742,7.841l-1.42-6.884C8.798,17.507,8.105,17.223,7.232,17.174L7.232,17.174z" fill="#f4f5f9" fill-rule="evenodd" />
                            </g>
                        </g>
                    </svg>
                    <h5>NUMERO DO CARTAO</h5>
                    <h6 id='label-cardnumber'>0000 0000 0000 0000</h6>
                    <h5>VALIDADE<span>CVC</span></h5>
                    <h6 id='label-cardexpiration'>00 / 0000<span>000</span></h6>
                </div>
                <div class='wave'></div>
            </div>
            <div class='card-form'>
                <p class='field'>
                    <svg id='i-cardfront' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 28 28;" xml:space="preserve" width="28px" height="28px">
                        <g>
                            <path d="M471.5,88h-432C17.72,88,0,105.72,0,127.5v256C0,405.28,17.72,423,39.5,423h432c21.78,0,39.5-17.72,39.5-39.5v-256   C511,105.72,493.28,88,471.5,88z M496,383.5c0,13.509-10.991,24.5-24.5,24.5h-432C25.991,408,15,397.009,15,383.5v-256   c0-13.509,10.991-24.5,24.5-24.5h432c13.509,0,24.5,10.991,24.5,24.5V383.5z" fill="#dddfe6" />
                            <path d="M239.5,352h-176c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h176c4.142,0,7.5-3.358,7.5-7.5S243.642,352,239.5,352z" fill="#dddfe6" />
                            <path d="M343.5,352h-72c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h72c4.142,0,7.5-3.358,7.5-7.5S347.642,352,343.5,352z" fill="#dddfe6" />
                            <path d="M79.5,239h48c12.958,0,23.5-10.542,23.5-23.5v-32c0-12.958-10.542-23.5-23.5-23.5h-48C66.542,160,56,170.542,56,183.5v32   C56,228.458,66.542,239,79.5,239z M136,183.5v8.5h-8.5c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h8.5v8.5   c0,4.687-3.813,8.5-8.5,8.5H111v-49h16.5C132.187,175,136,178.813,136,183.5z M79.5,175H96v49H79.5c-4.687,0-8.5-3.813-8.5-8.5V207   h8.5c4.142,0,7.5-3.358,7.5-7.5s-3.358-7.5-7.5-7.5H71v-8.5C71,178.813,74.813,175,79.5,175z" fill="#dddfe6" />
                            <path d="M63.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16C56,315.642,59.358,319,63.5,319   z" fill="#dddfe6" />
                            <path d="M80,295.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5S80,291.358,80,295.5z" fill="#dddfe6" />
                            <path d="M104,295.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5S104,291.358,104,295.5z" fill="#dddfe6" />
                            <path d="M128,295.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5S128,291.358,128,295.5z" fill="#dddfe6" />
                            <path d="M167.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16   C160,315.642,163.358,319,167.5,319z" fill="#dddfe6" />
                            <path d="M191.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16   C184,315.642,187.358,319,191.5,319z" fill="#dddfe6" />
                            <path d="M215.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16   C208,315.642,211.358,319,215.5,319z" fill="#dddfe6" />
                            <path d="M239.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C247,291.358,243.642,288,239.5,288z" fill="#dddfe6" />
                            <path d="M271.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16   C264,315.642,267.358,319,271.5,319z" fill="#dddfe6" />
                            <path d="M295.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16   C288,315.642,291.358,319,295.5,319z" fill="#dddfe6" />
                            <path d="M319.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16   C312,315.642,315.358,319,319.5,319z" fill="#dddfe6" />
                            <path d="M343.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C351,291.358,347.642,288,343.5,288z" fill="#dddfe6" />
                            <path d="M375.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C383,291.358,379.642,288,375.5,288z" fill="#dddfe6" />
                            <path d="M399.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C407,291.358,403.642,288,399.5,288z" fill="#dddfe6" />
                            <path d="M423.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C431,291.358,427.642,288,423.5,288z" fill="#dddfe6" />
                            <path d="M447.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C455,291.358,451.642,288,447.5,288z" fill="#dddfe6" />
                            <path d="M415.5,160h-48c-21.78,0-39.5,17.72-39.5,39.5s17.72,39.5,39.5,39.5h48c21.78,0,39.5-17.72,39.5-39.5S437.28,160,415.5,160   z M415.5,224h-48c-13.509,0-24.5-10.991-24.5-24.5s10.991-24.5,24.5-24.5h48c13.509,0,24.5,10.991,24.5,24.5S429.009,224,415.5,224   z" fill="#dddfe6" />
                        </g>
                    </svg>
                    <input type='text' id='cardnumber' name='cardnumber' placeholder='1234 5678 9123 4567' pattern='\d*' title='Card Number' />
                </p>
                <p class='field space'>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="i-calendar" x="0px" y="0px" viewBox="0 0 191.259 191.259" style="enable-background:new 0 0 191.259 191.259;" xml:space="preserve" width="28px" height="28px">
                        <g>
                            <circle cx="59.768" cy="83.634" r="3.985" fill="#dddfe6" />
                            <circle cx="83.676" cy="83.634" r="3.985" fill="#dddfe6" />
                            <circle cx="107.583" cy="83.634" r="3.985" fill="#dddfe6" />
                            <circle cx="35.861" cy="107.541" r="3.984" fill="#dddfe6" />
                            <circle cx="59.768" cy="107.541" r="3.984" fill="#dddfe6" />
                            <circle cx="83.676" cy="107.541" r="3.984" fill="#dddfe6" />
                            <circle cx="107.583" cy="107.541" r="3.984" fill="#dddfe6" />
                            <circle cx="155.398" cy="107.541" r="3.984" fill="#dddfe6" />
                            <circle cx="131.49" cy="83.634" r="3.985" fill="#dddfe6" />
                            <circle cx="155.398" cy="83.634" r="3.985" fill="#dddfe6" />
                            <circle cx="35.861" cy="131.449" r="3.985" fill="#dddfe6" />
                            <circle cx="59.768" cy="131.449" r="3.985" fill="#dddfe6" />
                            <circle cx="83.676" cy="131.449" r="3.985" fill="#dddfe6" />
                            <circle cx="107.583" cy="131.449" r="3.985" fill="#dddfe6" />
                            <circle cx="131.49" cy="131.449" r="3.985" fill="#dddfe6" />
                            <circle cx="155.398" cy="131.449" r="3.985" fill="#dddfe6" />
                            <circle cx="35.861" cy="155.356" r="3.985" fill="#dddfe6" />
                            <circle cx="59.768" cy="155.356" r="3.985" fill="#dddfe6" />
                            <circle cx="83.676" cy="155.356" r="3.985" fill="#dddfe6" />
                            <circle cx="107.583" cy="155.356" r="3.985" fill="#dddfe6" />
                            <path d="M131.49,119.495c6.603,0,11.954-5.351,11.954-11.954s-5.351-11.954-11.954-11.954   c-6.603,0-11.954,5.351-11.954,11.954S124.887,119.495,131.49,119.495z M131.49,103.557c2.199,0,3.985,1.786,3.985,3.984   s-1.786,3.984-3.985,3.984s-3.984-1.786-3.984-3.984S129.292,103.557,131.49,103.557z" fill="#dddfe6" />
                            <path d="M175.321,15.98h-7.969v-3.985c0-6.601-5.354-11.954-11.954-11.954   c-6.603,0-11.954,5.352-11.954,11.954v3.985h-95.63v-3.985c0-6.601-5.354-11.954-11.954-11.954   c-6.603,0-11.954,5.352-11.954,11.954v3.985h-7.969C7.136,15.98,0,23.116,0,31.918v15.854v7.969v119.537   c0,8.802,7.136,15.938,15.938,15.938h159.382c8.802,0,15.938-7.136,15.938-15.938V55.742v-7.969V31.918   C191.259,23.116,184.123,15.98,175.321,15.98z M151.413,23.949V15.98v-3.985c0-2.201,1.782-3.985,3.985-3.985   c2.198,0,3.984,1.784,3.984,3.985v3.985v7.969v3.984c0,2.2-1.786,3.985-3.984,3.985c-2.202,0-3.985-1.784-3.985-3.985V23.949z    M31.876,23.949V15.98v-3.985c0-2.201,1.782-3.985,3.985-3.985c2.199,0,3.985,1.784,3.985,3.985v3.985v7.969v3.984   c0,2.2-1.786,3.985-3.985,3.985c-2.202,0-3.985-1.784-3.985-3.985V23.949z M183.29,175.279c0,4.399-3.564,7.969-7.969,7.969H15.938   c-4.405,0-7.969-3.57-7.969-7.969V55.742H183.29V175.279z M183.29,47.773H7.969V31.918c0-4.403,3.564-7.969,7.969-7.969h7.969   v3.984c0,6.601,5.35,11.954,11.954,11.954c6.6,0,11.954-5.352,11.954-11.954v-3.984h95.63v3.984c0,6.601,5.35,11.954,11.954,11.954   c6.599,0,11.954-5.352,11.954-11.954v-3.984h7.969c4.405,0,7.969,3.566,7.969,7.969V47.773z" fill="#dddfe6" />
                        </g>
                    </svg>
                    <input type='text' id='cardexpiration' name='cardexpiration' placeholder="MM / YYYY" pattern="\d*" title='Card Expiration Date' />
                </p>
                <p class='field'>
                    <svg id='i-cardback' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 28 28;" xml:space="preserve" width="28px" height="28px">
                        <g>
                            <path d="M63.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16C71,291.358,67.642,288,63.5,288   z" fill="#dddfe6" />
                            <path d="M87.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16C95,291.358,91.642,288,87.5,288   z" fill="#dddfe6" />
                            <path d="M111.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C119,291.358,115.642,288,111.5,288z" fill="#dddfe6" />
                            <path d="M135.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C143,291.358,139.642,288,135.5,288z" fill="#dddfe6" />
                            <path d="M167.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16   C160,315.642,163.358,319,167.5,319z" fill="#dddfe6" />
                            <path d="M199,311.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5S199,315.642,199,311.5z" fill="#dddfe6" />
                            <path d="M223,311.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5S223,315.642,223,311.5z" fill="#dddfe6" />
                            <path d="M239.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C247,291.358,243.642,288,239.5,288z" fill="#dddfe6" />
                            <path d="M271.5,319c4.142,0,7.5-3.358,7.5-7.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16   C264,315.642,267.358,319,271.5,319z" fill="#dddfe6" />
                            <path d="M303,311.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5S303,315.642,303,311.5z" fill="#dddfe6" />
                            <path d="M327,311.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5S327,315.642,327,311.5z" fill="#dddfe6" />
                            <path d="M351,311.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5S351,315.642,351,311.5z" fill="#dddfe6" />
                            <path d="M383,311.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5S383,315.642,383,311.5z" fill="#dddfe6" />
                            <path d="M407,311.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5S407,315.642,407,311.5z" fill="#dddfe6" />
                            <path d="M431,311.5v-16c0-4.142-3.358-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5S431,315.642,431,311.5z" fill="#dddfe6" />
                            <path d="M447.5,288c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C455,291.358,451.642,288,447.5,288z" fill="#dddfe6" />
                            <path d="M447.5,216h-384C50.542,216,40,226.542,40,239.5v8c0,12.958,10.542,23.5,23.5,23.5h384c12.958,0,23.5-10.542,23.5-23.5v-8   C471,226.542,460.458,216,447.5,216z M456,247.5c0,4.687-3.813,8.5-8.5,8.5h-384c-4.687,0-8.5-3.813-8.5-8.5v-8   c0-4.687,3.813-8.5,8.5-8.5h384c4.687,0,8.5,3.813,8.5,8.5V247.5z" fill="#dddfe6" />
                            <path d="M447.5,352h-176c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h176c4.142,0,7.5-3.358,7.5-7.5S451.642,352,447.5,352z" fill="#dddfe6" />
                            <path d="M239.5,352h-72c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h72c4.142,0,7.5-3.358,7.5-7.5S243.642,352,239.5,352z" fill="#dddfe6" />
                            <path d="M511,159.498V127.5c0-21.78-17.72-39.5-39.5-39.5h-432C17.72,88,0,105.72,0,127.5v47.998c0,0.001,0,0.003,0,0.005V383.5   C0,405.28,17.72,423,39.5,423h432c21.78,0,39.5-17.72,39.5-39.5V159.502C511,159.501,511,159.499,511,159.498z M496,184h-6.394   l6.394-6.394V184z M449.606,184l41-41H496v13.394L468.394,184H449.606z M409.606,184l41-41h18.787l-41,41H409.606z M369.606,184   l41-41h18.787l-41,41H369.606z M329.606,184l41-41h18.787l-41,41H329.606z M289.606,184l41-41h18.787l-41,41H289.606z M249.606,184   l41-41h18.787l-41,41H249.606z M209.606,184l41-41h18.787l-41,41H209.606z M169.606,184l41-41h18.787l-41,41H169.606z M129.606,184   l41-41h18.787l-41,41H129.606z M89.606,184l41-41h18.787l-41,41H89.606z M49.606,184l41-41h18.787l-41,41H49.606z M15,184v-5.394   L50.606,143h18.787l-41,41H15z M15,143h14.394L15,157.394V143z M39.5,103h432c13.509,0,24.5,10.991,24.5,24.5v0.5h-8.497   c-0.002,0-0.003,0-0.005,0h-39.995c-0.002,0-0.003,0-0.005,0h-39.995c-0.002,0-0.003,0-0.005,0h-39.995c-0.002,0-0.003,0-0.005,0   h-39.995c-0.002,0-0.003,0-0.005,0h-39.995c-0.002,0-0.004,0-0.005,0h-39.995c-0.001,0-0.003,0-0.005,0h-39.995   c-0.001,0-0.003,0-0.005,0h-39.995c-0.001,0-0.003,0-0.005,0h-39.995c-0.001,0-0.003,0-0.005,0H87.502c-0.001,0-0.003,0-0.005,0   H47.502c-0.001,0-0.003,0-0.005,0H15v-0.5C15,113.991,25.991,103,39.5,103z M471.5,408h-432C25.991,408,15,397.009,15,383.5V199   h481v184.5C496,397.009,485.009,408,471.5,408z" fill="#dddfe6" />
                        </g>
                    </svg>
                    <input type='text' id='cardcvc' name='cardcvc' placeholder="123" pattern="\d*" title='CVC Code' />
                </p>
                <button  class='button-cta' title='Confirm your purchase'><span>PAGAR</span></button>
            </div>
        </div>
        <div id='paid' class='paid'>
            <svg id='icon-paid' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 310.277 310.277" style="enable-background:new 0 0 310.277 310.277;" xml:space="preserve" width="180px" height="180px">
                <g>
                    <path d="M155.139,0C69.598,0,0,69.598,0,155.139c0,85.547,69.598,155.139,155.139,155.139   c85.547,0,155.139-69.592,155.139-155.139C310.277,69.598,240.686,0,155.139,0z M144.177,196.567L90.571,142.96l8.437-8.437   l45.169,45.169l81.34-81.34l8.437,8.437L144.177,196.567z" fill="#3ac569" />
                </g>
            </svg>
            <h2>Pagamento feito com sucesso!</h2>
            <h2>Obrigado!</h2>
        </div>
    </div>

    <div class='icon-credits'>Outlined icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> & <a href="http://www.flaticon.com/authors/abhimanyu-rana" title="Abhimanyu Rana">Abhimanyu Rana</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
</body>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script>
    $(function() {
        $('#cardnumber').payment('formatCardNumber');
        $('#cardexpiration').payment('formatCardExpiry');
        $('#cardcvc').payment('formatCardCVC');

        $('#cardnumber').keyup(function(event) {
            $('#label-cardnumber').empty().append($(this).val());
        });

        $('#cardexpiration').keyup(function(event) {
            var data = $(this).val() + '<span>' + $('#cardcvc').val() + '</span>';
            $('#label-cardexpiration').empty().append(data);
        });

        $('#cardcvc').keyup(function(event) {
            var data = $('#cardexpiration').val() + '<span>' + $(this).val() + '</span>';
            $('#label-cardexpiration').empty().append(data);
        });

        $('.button-cta').on('click', function() {
            var proceed = true;
            $(".field input").each(function() {
                $(this).parent().find('path').each(function() {
                    $(this).attr('fill', '#dddfe6');
                });

                if (!$.trim($(this).val())) {
                    $(this).parent().find('path').each(function() {
                        $(this).attr('fill', '#f1404b');
                        proceed = false;
                    });

                    if (!proceed) {
                        $(this).parent().find('svg').animate({
                            opacity: '0.1'
                        }, "slow");
                        $(this).parent().find('svg').animate({
                            opacity: '1'
                        }, "slow");
                        $(this).parent().find('svg').animate({
                            opacity: '0.1'
                        }, "slow");
                        $(this).parent().find('svg').animate({
                            opacity: '1'
                        }, "slow");
                    }
                }
            });

            if (proceed) //everything looks good! proceed purchase...
            {
                $('.field').find('path').each(function() {
                    $(this).attr('fill', '#3ac569');
                });
                $('.payment').fadeToggle('slow', function() {
                    $('.paid').fadeToggle('slow', 'linear');
                });
            }
        });
    });
</script>

</html>
</html>