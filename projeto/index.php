<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="sortcut icon" href="favicon.ico" type="image/x-icon">
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
  <link rel="stylesheet" href="Style/edicao.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!-- Título -->
  <title>Home Venus</title>
</head>
<body>
  <center>
    <div id="mae">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div id="imagem">
         <a href="index.php">  <img src="imagens/venus.png" width="115"></a>
        </div>
        <div class="container">
          <a href="index.php">
            <div class="btncomum">
              <button type="button" class="btn btn-dark" > <h5> Home </h5> </button>
            </div>
          </a>
          <a href="produtos.php">
            <div class="btncomum">
              <button type="button" class="btn btn-outline-dark" > <h5> Produtos </h5> </button>
            </div>
          </a>
          <a href="desenvolvimento.php">
            <div class="btncomum">
              <button type="button" class="btn btn-outline-dark" > <h5> Sobre nós </h5> </button>
            </div>
          </a>
          <a href="cadastro.php">
            <div class="btncomum">
                      <button type="button" class="btn btn-outline-dark" > <h5> Cadastro </h5> </button>
            </div>
          </a>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="entrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php session_start();
                if($_SESSION["logou"]=="s")
                { echo $_SESSION["nome"]; }
                else
                { echo "User"; }
              ?>
            </button>
            <?php
              if($_SESSION["logou"]!="s")
              { ?>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="loginpag.php">Login</a>
                </div>
                <?php
              }
              else if($_SESSION["admin"]=="s")
              { ?>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="tabela_venda.php">Administração</a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
                <?php
              }
              else
              { ?>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
                <?php
              }
            ?>
          </div>
          <ul class="navbar-nav ml-auto mr-3 ">
            <a href="carrinhopg.php">
              <button type="button" class="btn btn-outline-dark"><i class="fas fa-shopping-cart"></i></button>
            </a>
          </ul>
        </div>
      </nav>
      <!-- Aquele negocinho que muda imagem -->
      <div id="carouselSite" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
          <li data-target="#carouselSite" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner"  >
          <div class="carousel-item active">
            <img src="imagens/principaltresmin.jpeg"class="img-fluid d-block">
          </div>
          <div class="carousel-item">
              <img src="imagens/principaldoismin.jpeg" class="img-fluid d-block">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
          <span class="carousel-control-next-icon"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>
      <!--txt principal-->
      <div id="txt_principal"><br>
        Pulseiras estilizadas especialmente para você seguindo a tradição da Venus.
      </div>
      <!--img_txt-->
      <div id="img_txt">
        <div id="img1">
          <img src="imagens/imagemummin.jpeg">
        </div>
        <div id="img1">
          <img src="imagens/imagemdoismin.jpeg">
        </div>
        <div id="img1">
          <img src="imagens/imagemtresmin.jpeg">
        </div>
        <div id="img1">
          <h2>Búzios</h2>
          <p>
            Conchas que refletem a beleza do mar. Originárias do litoral.  <br><a  href="produtos.php" class="saiba"> Saiba mais...</a>
          </p>
        </div>
        <div id="img1">
          <h2>One for you</h2>
          <p>
            Simplesmente feche os olhos e faça um pedido, depois amarre essa pulseira em seu pulso. <br><a  href="produtos.php"class="saiba"> Saiba mais...</a>
          </p>
        </div>
        <div id="img1">
          <h2>One for me</h2>
          <p>
            Um fio invisível conecta os que estão destinados a conhecer-se, o fio pode esticar ou emaranhar-se, mas nunca vai partir.<br><a  href="produtos.php"class="saiba"> Saiba mais...</a>
          </p>
        </div>
      </div>
      <!--flime_txt-->
      <div id="filme_txt">
        <iframe width="500" height="315" src="https://www.youtube.com/embed/zzZJi7Ks92Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div id="txt_filme">
        <br><br><br><br><br>
        Vídeo sobre customização de pulseiras que servem de base para nossa confecção artesanal. Especial para você!
      </div><br>
      <div id="rodape">
        <div id="retorno"><br>
          <div class="container2">
            <img src="imagens/venus.png" width="50" style="left: auto">
            <a href="index.php">
              <div class="btncomum">
                &nbsp; &nbsp;
                <button type="button" class="btn btn-outline-light" > Home </button>
              </div>
            </a>
            <a href="produtos.php">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Produtos </button>
              </div>
            </a>
            <a href="desenvolvimento.php">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Sobre nós </button>
              </div>
            </a>
            <a href="cadastro.php">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Cadastro </button>
              </div>
            </a>
          </div>
          <br>
          <h6 >
            Desenvolvedores:
            &nbsp; &nbsp;1 - Amanda
            &nbsp; &nbsp;9 - Gabriel
            &nbsp; &nbsp;28 - Rafael
            &nbsp; &nbsp;30 - Rebeca
            &nbsp; &nbsp;32 - Sophia
          </h6>
          <a href="#top"> <button type="button" class="btn btn-outline-light" > Voltar ao topo </button> </a>
        </div>
      </div>
    </div>
  </center>
  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>


