
<?php
  session_start();
  if($_SESSION["admin"]!="s")
  {
      echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
  }
?>
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
  <link rel="stylesheet" href="Style/admin.css">
  <script src="cadproduto.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="Style/admin2.css">
  <!-- Título -->
  <title>Admin Venus</title>
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
              <button type="button" class="btn btn-outline-dark" > <h5> Home </h5> </button>
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
              <button type="button" class="btn btn-dark" > <h5> Cadastro </h5> </button>
            </div>
          </a>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="entrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php session_start();
                  if($_SESSION["logou"]=="s")
                  { echo $_SESSION["nome"];  }
                  else
                  {echo "User";}
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
      <div class="fundolog">
        <h1>Administração</h1>
          <nav id="sidebar">
            <ul class="list-unstyled components">
              <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="true" class="ad">Tabelas</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                  <li><a class="ad" href="tabela_clientes.php">Clientes</a></li>
                  <li><a class="ad" href="tabela_produtos.php">Produtos</a></li>
                  <li><a class="ad" href="tabela_venda.php">Vendas</a></li>
                </ul>
              </li>
              <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"class="ad">Cadastros</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a class="ad"  href="cadproduto.php">Produtos</a></li>
                    <li><a class="ad" href="cadastro_categoria.php">Categoria</a></li>
                  </ul>
              </li>
            </ul>
            <ul class="list-unstyled CTAs">
              <li><a href="logout.php" class="submit" class="ad">Sair</a></li>
            </ul>
          </nav>
          <div class="jumbotron jumbotron-fluid">
            <div class="container5">
            <h2> Estoque</h2>
            
                <?php
            include "conexao.php";
            $sql="Select Sum(estoque) as estoque from produto where excluido!='TRUE';";
            $res = pg_query($conecta,$sql);
            $afe = pg_num_rows($res);
            if($afe > 0)
            {
              $linha = pg_fetch_array($res);
              ?><h3><?php echo $linha['estoque'];?> </h3>
              <?php
            }
          ?>
               
          </div>
        </div>
           

          
        </div>
        <div id="rodape">
          <div id="retorno">
            <br>
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