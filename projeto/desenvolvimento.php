<!DOCTYPE html>
<html lang="pt-br">
  <head>
<link rel="sortcut icon" href="favicon.ico" type="image/x-icon" />
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="Style/edicao.css" />  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      
    <title>Desenvolvimento Venus</title>
  </head> 
  <body>
    <center>
      <div id="mae_desenvolvedor"> 
        <nav class="navbar navbar-expand-lg navbar-light" >
          <div id="imagem">
            <a href="index.php"><img src="imagens/venus.png" width="115"></a>
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
                <button type="button" class="btn btn-dark" > <h5> Sobre nós </h5> </button> 
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
                  { echo $_SESSION["nome"];  }
                  else
                  {echo "User";}
                ?> 
              </button>
              <?php if($_SESSION["logou"]!="s") {?>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="loginpag.php">Login</a>
			     </div>
                    <?php } else if($_SESSION["admin"]=="s") 
                        { ?>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="tabela_venda.php">Administração</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
			         </div>
                        
                 <?php } else
                        { ?>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="logout.php">Logout</a>
			         </div>
                        
                 <?php } ?>
            </div>
             <ul class="navbar-nav ml-auto mr-3 ">   
          <a href="carrinhopg.php"> <button type="button" class="btn btn-outline-dark">
                 <i class="fas fa-shopping-cart"></i> 
                </button>      
            </a>
          </ul>                      
          </div>
        </nav>   
        <div id="fundodes">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Desenvolvedores</h1>
              <p class="lead">Estes são os desenvolvedores do website e da marca VENUS LTDA.</p>
            </div>
          </div>  
          <br> <br> <br> <br> <br> <br> 
          <div class="card-deck">
            <!---- Amanda 01 --->
            <div class="card">
              <div id= img_desenvolvedor>
                <img src="imagens/amanda.png" class="card-img">
              </div> 
              <div class="card-body">
                <h4 class="card-title">01 Amanda Polido</h4>
                <p class="card-text"></p>
              </div>
            </div>
            <!---- Gabriel 09 --->
            <div class="card">
              <div id= img_desenvolvedor>
                <img src="imagens/gabriel.png" class="card-img">
              </div>
              <div class="card-body">
                <h4 class="card-title">09 Gabriel de Jesus</h4>
                <p class="card-text"></p>
              </div>
            </div>
            <!---- Rafael 28 --->
            <div class="card">
              <div id= img_desenvolvedor>
                <img src="imagens/rafael.png" class="card-img">
              </div> 
              <div class="card-body">
                <h4 class="card-title">28 Rafael Leite</h4>
                <p class="card-text"></p>
              </div>
            </div>  
          </div>
          <div class="card-deck"> 
          <!---- Rebeca 30 --->
          <div class="card">
            <div id= img_desenvolvedor_baixo>
              <img src="imagens/rebeca.png" class="card-img">
            </div>
            <div class="card-body">
              <h4 class="card-title">30 Rebeca Vieira</h4>
              <p class="card-text"></p>
            </div>
          </div>
          <!---- Sophia 32 --->
          <div class="card">
            <div id= img_desenvolvedor_baixo>
              <img src="imagens/sophia.png" class="card-img">
            </div>
            <div class="card-body">
              <h4 class="card-title">32 Sophia Catini</h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <!---------------------->
        <div id="fotodes">
          <img src="imagens/fotodes.jpg" width="700" height="330">
        </div>
      </div>   
      <!--------------- Rodapé --------------->
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
          </div><br> 
          <h6 > Desenvolvedores:
            &nbsp; &nbsp;1 - Amanda 
            &nbsp; &nbsp;9 - Gabriel 
            &nbsp; &nbsp;28 - Rafael
            &nbsp; &nbsp;30 - Rebeca 
            &nbsp; &nbsp;32 - Sophia  
          </h6>
          <a href="#top"> <button type="button" class="btn btn-outline-light" > Voltar ao topo </button> </a>
        </div>     
      </div>
    </center>  <!--------------MODAL-------------->  
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>      
  </body>
</html>