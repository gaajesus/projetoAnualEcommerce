
<!DOCTYPE html>
<html lang="pt-br">
  <head>
<link rel="sortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--------CSS-------->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="Style/edicao.css">
    <link rel="stylesheet" href="Style/cadastro.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Título -->
    <title>Dados</title>
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
              <button type="button" class="btn btn-outline-dark" ><h5> Home </h5></button>
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
          <!--------------------------DROPDOWN-------------------------------->
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="entrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php session_start();
                if($_SESSION["logou"]=="s")
                { echo $_SESSION["nome"]; }
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
              <button type="button" class="btn btn-outline-dark"> <i class="fas fa-shopping-cart"></i></button>
            </a>
          </ul>
        </div>
      </nav>
      <center>
        <?php
          include "conexao.php";
          $cod = $_GET["cod"];
          $sql="SELECT * from cliente WHERE excluido='FALSE' and cod_cli = $cod; ";
          $res = pg_query($conecta, $sql);
          $afe = pg_num_rows($res);
          if($afe>0)
          {
            $linha = pg_fetch_array($res);
        ?>
        <div class="fundolog">
          <form name="cadastro_venus" method="post" action="updatecliente.php?cod=<?php echo $cod; ?>&faz=up">
            <h1>Cadastro</h1>
            <p class="nome">
              <label >Nome*</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <input type="text" id="nome" placeholder="Insira seu nome" required name="nome" value="<?php echo $linha['nome_cli'];?>" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95" maxlength="10"/>
            </p><br>
            <p class="sobrenome">
              <label for="sobrenome">Sobrenome*</label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input type="text" id="sobrenome" placeholder="Insira seu sobrenome" required="required" name="sobrenome" value="<?php echo $linha['sobrenome_cli'];?>"onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95 || event.charCode == 32"/>
            </p><br>
            <p class="fone">
              <label for="data">Data de Nascimento*</label> &nbsp; <input type="date" id="data" name="data" value="<?php echo $linha['data_nasc'];?>"/> 
            </p><br>
            <p>
              <label for="cpf">CPF</label> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp; &nbsp;<input type="text" id="cpf" placeholder="Insira seu CPF" name="cpf" maxlenght="11"  minlenght="11" value="<?php echo $linha['cpf'];?>" onkeypress="return event.charCode>=48 && event.charCode<=57"/>            
            </p><br>
            <p>
              <label for="endereco">Endereço</label> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp; &nbsp;<input type="text" id="endereco" placeholder="Insira seu endereço" name="endereco" value="<?php echo $linha['endereco'];?>"/>
            </p><br>
            <p>
              <label for="email">Email*</label> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;<input type="email" id="email" placeholder="Insira seu e-mail" name="email" value="<?php echo $linha['email_cli'];?>"/>
            </p><br><br>
            <p class="submit">
              &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
              <input type="reset"value="Limpar" />
              &nbsp;&nbsp; &nbsp;&nbsp;
              <input type="submit" id="enviar" value="Enviar" />
            </p>
            <?php
            }
            ?>
            <a href="updatecliente.php?cod=<?php echo $cod; ?>&faz=ex" class="saiba">Excluir</a>
            <br>
            <br>
        </form>
    </div>
    </center>
      <div id="rodape">
        <div id="retorno"><br>
          <div class="container2">
            <img src="imagens/venus.png" width="50" style="left: auto">
            <a href="index.html">
              <div class="btncomum">
                &nbsp; &nbsp;
                <button type="button" class="btn btn-outline-light" > Home </button>
              </div>
            </a>
            <a href="produtos.html">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Produtos </button>
              </div>
            </a>
            <a href="desenvolvimento.html">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Sobre nós </button>
              </div>
            </a>
            <a href="cadastrar.html">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Cadastro </button>
              </div>
            </a>
          </div><br>
          <h6> Desenvolvedores:
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


