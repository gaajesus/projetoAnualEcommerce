<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
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
  <link rel="stylesheet" href="Style/edicao.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="Style/login.css">
  <!-- Título -->
  <title>Login Venus</title>
</head>
<body>
  <center>
    <div id="mae">
      <nav class="navbar navbar-expand-lg navbar-light">
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
      <div class="container3">
        <div class="d-flex justify-content-center login">
          <div class="fundolog">
            <div class="card">
              <div class="card-header">
                <h3 >Login</h3>
			        </div>
			        <div class="card-body">
                <form method="post" name="meu-form" action="login.php">
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Usuário" name="email" id="email" required>
                  </div>
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha" required maxlength="15" minlenght="8">
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Entrar" class="btn float-right login_btn">
                  </div>
                </form>
			        </div>
		  	      <div class="card-footer">
                <div class="d-flex justify-content-center links">
                  Não possui cadastro?
                  <a href="cadastro.php" class="esqueci">  Cadastre-se</a>
                </div>
				        <div class="d-flex justify-content-center">
					        <a href="esquecisenha.php" class="esqueci">Esqueceu sua senha?</a>
				        </div>
			        </div>
		        </div>
	        </div>
        </div>
      </div><br>
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
          <h6>
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
  <script>
    $('#email').keypress(function (e) {
      var keyCode = (e.keyCode ? e.keyCode : e
      .which); // Variar a chamada do keyCode de acordo com o ambiente.
      e.key = e.key.replace(/D/g, "");
      if (keyCode >= 65 && keyCode <= 90) {
        return;
      }
      else if (keyCode >= 65 && keyCode <= 90) {
          return;

      } else if (keyCode >= 97 && keyCode <= 122) {
          return;

      } else if (keyCode >= 48 && keyCode <= 57) {
          return;

      } else if (keyCode == 64 || keyCode == 46) {
          return;
      } else {
          e.preventDefault();
      }
      });
      $('#senha').keypress(function (e) {
        var keyCode = (e.keyCode ? e.keyCode : e
        .which); // Variar a chamada do keyCode de acordo com o ambiente.
          e.key = e.key.replace(/D/g, "");
          if (keyCode >= 65 && keyCode <= 90) { //letras maiúsculas
              return;

          } else if (keyCode >= 97 && keyCode <= 122) { //letras minúsculas
              return;
          } else if (keyCode >= 48 && keyCode <= 57) { //números
              return;
          } else if (keyCode >= 35 && keyCode <=38 || keyCode == 33 || keyCode == 64 || keyCode == 40 || keyCode == 41) { 
              return;
          }else{
              e.preventDefault();

          }
      });
  </script>
  </body>
</html>